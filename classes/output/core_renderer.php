<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Custom theme output renderers.
 *
 * @package    theme_customtheme
 * @copyright  2025 Custom Theme contributors
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_customtheme\output;

/**
 * Core renderer for custom theme.
 *
 * Extends the boost core renderer to provide custom rendering for the theme.
 *
 * @package    theme_customtheme
 * @copyright  2025 Custom Theme contributors
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class core_renderer extends \theme_boost\output\core_renderer {
    /**
     * Override to add custom footer content.
     *
     * @return string HTML string for the footer.
     */
    public function standard_footer_html() {
        $output = parent::standard_footer_html();

        // Add custom footer content if set in theme settings.
        if (!empty($this->page->theme->settings->footercontent)) {
            $output .= \html_writer::start_div('custom-footer-content container');
            $output .= format_text($this->page->theme->settings->footercontent, FORMAT_HTML);
            $output .= \html_writer::end_div();
        }

        // Add login info if enabled.
        if (!empty($this->page->theme->settings->showfooterlogininfo)) {
            $output .= $this->footer_login_info();
        }

        return $output;
    }

    /**
     * Renders login information for the footer.
     *
     * @return string HTML for login information.
     */
    protected function footer_login_info() {
        global $USER;

        if (!isloggedin() || isguestuser()) {
            return '';
        }

        $output = \html_writer::start_div('footer-login-info text-center mt-3');
        $output .= \html_writer::tag(
            'small',
            get_string('loggedinas', 'core', fullname($USER)),
            ['class' => 'text-muted']
        );
        $output .= \html_writer::end_div();

        return $output;
    }

    /**
     * Returns the custom logo URL if set, otherwise returns parent.
     *
     * @return string|null The logo URL or null.
     */
    public function get_logo_url() {
        // Check if custom logo is set.
        if (!empty($this->page->theme->settings->logo)) {
            return $this->page->theme->setting_file_url('logo', 'logo');
        }

        // Fall back to parent method.
        return parent::get_logo_url();
    }

    /**
     * Returns the favicon link element.
     *
     * @return string The favicon URL.
     */
    public function favicon() {
        if (!empty($this->page->theme->settings->favicon)) {
            $url = $this->page->theme->setting_file_url('favicon', 'favicon');
            if (!empty($url)) {
                return $url;
            }
        }

        return parent::favicon();
    }
}
