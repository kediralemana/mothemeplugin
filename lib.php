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
 * @copyright  2025 Custom Theme contributors
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
    } elseif ($filename === 'plain.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/plain.scss');
    } elseif ($filename && ($presetfile = $fs->get_file($context->id, 'theme_customtheme', 'preset', 0, '/', $filename))) {
        $scss .= $presetfile->get_content();
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
    $configurable = [
        // Config key => [variableName, ...].
        'brandcolor' => ['primary', 'custom-primary-color'],
    ];

    // Prepend variables first.
    foreach ($configurable as $configkey => $targets) {
        $value = isset($theme->settings->{$configkey}) ? $theme->settings->{$configkey} : null;
        if (empty($value)) {
            continue;
        }
        foreach ((array) $targets as $target) {
            $scss .= '$' . $target . ': ' . $value . ";\n";
        }

        // Also expose as CSS custom properties for easier downstream use.
        $scss .= ":root {\n";
        $scss .= "    --customtheme-brand: {$value};\n";
        $scss .= "    --customtheme-brand-rgb: #{red({$value})}, #{green({$value})}, #{blue({$value})};\n";
        $scss .= "}\n";
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

    // Background image support.
    if (!empty($theme->settings->backgroundimage)) {
        $url = $theme->setting_file_url('backgroundimage', 'backgroundimage');
        if (!empty($url)) {
            $content .= "\nbody.has-background-image {\n";
            $content .= "    background-image: url('{$url}');\n";
            $content .= "    background-size: cover;\n";
            $content .= "    background-position: center;\n";
            $content .= "    background-repeat: no-repeat;\n";
            $content .= "}\n";
        }
    }

    return $content;
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
        if (in_array($filearea, ['logo', 'backgroundimage', 'preset', 'favicon'], true)) {
            return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
        }
    }

    send_file_not_found();
}
