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
 * Theme settings.
 *
 * @package    theme_customtheme
 * @copyright  2025 Your Name
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    $settings = new theme_boost_admin_settingspage_tabs('themesettingcustomtheme', get_string('configtitle', 'theme_customtheme'));
    $page = new admin_settingpage('theme_customtheme_general', get_string('generalsettings', 'theme_customtheme'));

    // Brand colour setting.
    $name = 'theme_customtheme/brandcolor';
    $title = get_string('brandcolor', 'theme_customtheme');
    $description = get_string('brandcolor_desc', 'theme_customtheme');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#0f6cbf');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Preset.
    $name = 'theme_customtheme/preset';
    $title = get_string('preset', 'theme_customtheme');
    $description = get_string('preset_desc', 'theme_customtheme');
    $default = 'default.scss';
    $context = context_system::instance();
    $fs = get_file_storage();
    $files = $fs->get_area_files($context->id, 'theme_customtheme', 'preset', 0, 'itemid, filepath, filename', false);
    $choices = [];
    foreach ($files as $file) {
        $choices[$file->get_filename()] = $file->get_filename();
    }
    $choices['default.scss'] = 'default.scss';
    $choices['plain.scss'] = 'plain.scss';
    $setting = new admin_setting_configthemepreset($name, $title, $description, $default, $choices, 'customtheme');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Raw SCSS to include before the content.
    $setting = new admin_setting_scsscode('theme_customtheme/scsspre',
        get_string('rawscsspre', 'theme_customtheme'), get_string('rawscsspre_desc', 'theme_customtheme'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Raw SCSS to include after the content.
    $setting = new admin_setting_scsscode('theme_customtheme/scss', get_string('rawscss', 'theme_customtheme'),
        get_string('rawscss_desc', 'theme_customtheme'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);
}
