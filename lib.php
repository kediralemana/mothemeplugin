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
 * Theme lib file.
 *
 * @package    theme_customtheme
 * @copyright  2025 Your Name
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Returns the main SCSS content.
 *
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_customtheme_get_main_scss_content($theme) {
    global $CFG;

    $scss = '';
    $filename = !empty($theme->settings->preset) ? $theme->settings->preset : null;
    $fs = get_file_storage();

    $context = context_system::instance();

    // Load the preset from boost.
    if ($filename === 'default.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    } else if ($filename === 'plain.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/plain.scss');
    } else if ($filename) {
        $presetfile = $fs->get_file($context->id, 'theme_customtheme', 'preset', 0, '/', $filename);
        if ($presetfile) {
            $scss .= $presetfile->get_content();
        } else {
            // File not found, use default preset.
            $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
        }
    } else {
        // Use default preset.
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    }

    // Load boost SCSS.
    $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/boost.scss');

    // Load custom theme SCSS.
    $scss .= file_get_contents($CFG->dirroot . '/theme/customtheme/scss/customtheme.scss');

    return $scss;
}

/**
 * Get SCSS to prepend.
 *
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_customtheme_get_pre_scss($theme) {
    $scss = '';

    // Color configuration.
    $configurable = [
        'brandcolor' => ['primary'],
        'secondarycolor' => ['secondary'],
        'linkcolor' => ['link-color'],
        'navbarcolor' => ['navbar-bg'],
        'footercolor' => ['footer-bg'],
    ];

    // Prepend color variables.
    foreach ($configurable as $configkey => $targets) {
        $value = isset($theme->settings->{$configkey}) ? $theme->settings->{$configkey} : null;
        if (empty($value)) {
            continue;
        }
        array_map(function($target) use (&$scss, $value) {
            $scss .= '$' . $target . ': ' . $value . ";\n";
        }, (array) $targets);
    }

    // Google Fonts.
    $fontname = isset($theme->settings->fontname) ? $theme->settings->fontname : 'Roboto';
    $fontnameheading = isset($theme->settings->fontnameheading) ? $theme->settings->fontnameheading : 'Roboto';
    $fontsize = isset($theme->settings->fontsize) ? $theme->settings->fontsize : '95%';

    if (!empty($fontname) || !empty($fontnameheading)) {
        $scss .= "// Google Fonts\n";
        if (!empty($fontname)) {
            $scss .= '$font-family-sans-serif: "' . $fontname . '", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif !default;' . "\n";
        }
        if (!empty($fontnameheading)) {
            $scss .= '$headings-font-family: "' . $fontnameheading . '", $font-family-sans-serif !default;' . "\n";
        }
        if (!empty($fontsize)) {
            $scss .= '$font-size-base: ' . $fontsize . ' !default;' . "\n";
        }
    }

    // Prepend pre-scss.
    if (!empty($theme->settings->scsspre)) {
        $scss .= $theme->settings->scsspre;
    }

    return $scss;
}

/**
 * Inject additional SCSS.
 *
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_customtheme_get_extra_scss($theme) {
    $content = '';

    // Custom SCSS from settings.
    if (!empty($theme->settings->scss)) {
        $content .= $theme->settings->scss;
    }

    // Custom CSS from settings.
    if (!empty($theme->settings->customcss)) {
        $content .= $theme->settings->customcss;
    }

    return $content;
}

/**
 * Inject Google Fonts into the page head.
 *
 * @return string HTML to inject Google Fonts.
 */
function theme_customtheme_before_standard_html_head() {
    global $PAGE;

    $theme = $PAGE->theme;
    $fontname = isset($theme->settings->fontname) ? $theme->settings->fontname : '';
    $fontnameheading = isset($theme->settings->fontnameheading) ? $theme->settings->fontnameheading : '';

    $fonts = [];
    if (!empty($fontname)) {
        $fonts[] = str_replace(' ', '+', $fontname) . ':300,400,500,700';
    }
    if (!empty($fontnameheading) && $fontnameheading !== $fontname) {
        $fonts[] = str_replace(' ', '+', $fontnameheading) . ':300,400,500,700';
    }

    if (!empty($fonts)) {
        $fontsstr = implode('|', array_unique($fonts));
        return '<link href="https://fonts.googleapis.com/css?family=' . $fontsstr . '&display=swap" rel="stylesheet">';
    }

    return '';
}

/**
 * Serves any files associated with the theme settings.
 *
 * @param stdClass $course The course object.
 * @param stdClass $cm The course module object.
 * @param context $context The context object.
 * @param string $filearea The file area.
 * @param array $args Extra arguments.
 * @param bool $forcedownload Whether to force download.
 * @param array $options Additional options.
 * @return bool Returns true if successful, false otherwise.
 */
function theme_customtheme_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = []) {
    static $theme;

    if (empty($theme)) {
        $theme = theme_config::load('customtheme');
    }

    if ($context->contextlevel == CONTEXT_SYSTEM) {
        // Serve files from the supported file areas.
        $allowedareas = [
            'logo',
            'logocompact',
            'favicon',
            'backgroundimage',
            'loginbackgroundimage',
            'preset',
        ];
        if (in_array($filearea, $allowedareas)) {
            return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
        }
    }

    send_file_not_found();
}
