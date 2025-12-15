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
 * @copyright  2025 Your Name
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_customtheme\output;

defined('MOODLE_INTERNAL') || die();

use moodle_url;

/**
 * Core renderer for custom theme.
 *
 * @package    theme_customtheme
 * @copyright  2025 Your Name
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class core_renderer extends \theme_boost\output\core_renderer {

    /**
     * Renders the custom footer.
     *
     * @return string HTML to output.
     */
    public function custom_footer() {
        $output = '';
        $output .= html_writer::start_div('custom-footer');
        $output .= html_writer::tag('p', '© ' . date('Y') . ' Custom Theme for Moodle');
        $output .= html_writer::end_div();
        return $output;
    }
}
