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
 * Language strings for theme_customtheme.
 *
 * @package    theme_customtheme
 * @copyright  2025 Custom Theme contributors
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Plugin information.
$string['pluginname'] = 'Custom Theme';
$string['choosereadme'] = 'Custom theme is a modern and customizable theme for Moodle.';
$string['configtitle'] = 'Custom Theme';

// Regions.
$string['region-side-pre'] = 'Right';

// Settings tabs.
$string['generalsettings'] = 'General settings';
$string['advancedsettings'] = 'Advanced settings';

// General settings.
$string['logo'] = 'Logo';
$string['logo_desc'] = 'Upload a custom logo for your site. This will be displayed in the header.';
$string['favicon'] = 'Favicon';
$string['favicon_desc'] = 'Upload a favicon for your site (.ico, .png, .jpg, .svg).';
$string['backgroundimage'] = 'Background image';
$string['backgroundimage_desc'] = 'The background image for the site. This will be displayed behind the content.';
$string['brandcolor'] = 'Brand colour';
$string['brandcolor_desc'] = 'The accent colour for the theme.';
$string['preset'] = 'Theme preset';
$string['preset_desc'] = 'Pick a preset to broadly change the look of the theme.';
$string['presetfiles'] = 'Additional theme preset files';
$string['presetfiles_desc'] = 'Preset files can be used to dramatically alter the appearance of the theme. See <a href="https://docs.moodle.org/en/Boost_theme">Boost theme documentation</a> for information on creating and sharing your own preset files.';
$string['rawscss'] = 'Raw SCSS';
$string['rawscss_desc'] = 'Use this field to provide SCSS or CSS code which will be injected at the end of the style sheet.';
$string['rawscsspre'] = 'Raw initial SCSS';
$string['rawscsspre_desc'] = 'In this field you can provide initialising SCSS code, it will be injected before everything else. Most of the time you will use this setting to define variables.';

// Advanced settings.
$string['footercontent'] = 'Footer content';
$string['footercontent_desc'] = 'Custom content to display in the footer.';
$string['showfooterlogininfo'] = 'Show login information in footer';
$string['showfooterlogininfo_desc'] = 'If enabled, login information will be displayed in the footer.';

// Privacy.
$string['privacy:metadata'] = 'The Custom Theme theme does not store any personal data about any user.';
