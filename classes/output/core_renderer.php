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
 * @copyright  2025 Your Name <your.email@example.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_customtheme\output;

defined('MOODLE_INTERNAL') || die();

/**
 * Core renderer for custom theme.
 *
 * Extends the boost core renderer to provide custom rendering for the theme.
 *
 * @package    theme_customtheme
 * @copyright  2025 Your Name <your.email@example.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class core_renderer extends \theme_boost\output\core_renderer {

    /**
     * Override to add custom footer content.
     *
     * @return string HTML string for the footer.
     */
    public function standard_footer_html() {
        global $CFG;

        $output = parent::standard_footer_html();

        // Add social media links.
        $output .= $this->social_media_links();

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
     * Renders social media links.
     *
     * @return string HTML for social media links.
     */
    protected function social_media_links() {
        $output = '';
        $hassocial = false;

        $socialmedia = [
            'facebook' => ['icon' => 'fa-facebook', 'name' => 'Facebook'],
            'twitter' => ['icon' => 'fa-twitter', 'name' => 'Twitter'],
            'linkedin' => ['icon' => 'fa-linkedin', 'name' => 'LinkedIn'],
            'instagram' => ['icon' => 'fa-instagram', 'name' => 'Instagram'],
            'youtube' => ['icon' => 'fa-youtube', 'name' => 'YouTube'],
        ];

        // Check if any social media is set.
        foreach ($socialmedia as $key => $data) {
            if (!empty($this->page->theme->settings->$key)) {
                $hassocial = true;
                break;
            }
        }

        if ($hassocial) {
            $output .= \html_writer::start_div('social-media-links text-center py-3');
            $output .= \html_writer::start_tag('ul', ['class' => 'list-inline mb-0']);

            foreach ($socialmedia as $key => $data) {
                if (!empty($this->page->theme->settings->$key)) {
                    $url = $this->page->theme->settings->$key;
                    $output .= \html_writer::start_tag('li', ['class' => 'list-inline-item mx-2']);
                    $output .= \html_writer::link(
                        $url,
                        \html_writer::tag('i', '', ['class' => 'fa ' . $data['icon'] . ' fa-2x']),
                        [
                            'target' => '_blank',
                            'rel' => 'noopener noreferrer',
                            'title' => $data['name'],
                            'class' => 'social-link',
                        ]
                    );
                    $output .= \html_writer::end_tag('li');
                }
            }

            $output .= \html_writer::end_tag('ul');
            $output .= \html_writer::end_div();
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
        $output .= \html_writer::tag('small',
            get_string('loggedinasuser', 'core', fullname($USER)),
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
}
