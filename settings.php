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
 * @copyright  2025 Custom Theme contributors
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    $settings = new theme_boost_admin_settingspage_tabs('themesettingcustomtheme', get_string('configtitle', 'theme_customtheme'));

    // General settings page.
    $page = new admin_settingpage('theme_customtheme_general', get_string('generalsettings', 'theme_customtheme'));

    // Logo file setting.
    $name = 'theme_customtheme/logo';
    $title = get_string('logo', 'theme_customtheme');
    $description = get_string('logo_desc', 'theme_customtheme');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Favicon setting.
    $name = 'theme_customtheme/favicon';
    $title = get_string('favicon', 'theme_customtheme');
    $description = get_string('favicon_desc', 'theme_customtheme');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'favicon', 0,
        ['accepted_types' => ['.ico', '.png', '.jpg', '.jpeg', '.svg']]);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Background image setting.
    $name = 'theme_customtheme/backgroundimage';
    $title = get_string('backgroundimage', 'theme_customtheme');
    $description = get_string('backgroundimage_desc', 'theme_customtheme');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'backgroundimage');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

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

    // Preset files upload.
    $name = 'theme_customtheme/presetfiles';
    $title = get_string('presetfiles', 'theme_customtheme');
    $description = get_string('presetfiles_desc', 'theme_customtheme');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'preset', 0,
        ['maxfiles' => 20, 'accepted_types' => ['.scss']]);
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

    // Advanced settings page.
    $page = new admin_settingpage('theme_customtheme_advanced', get_string('advancedsettings', 'theme_customtheme'));

    // Footer content.
    $name = 'theme_customtheme/footercontent';
    $title = get_string('footercontent', 'theme_customtheme');
    $description = get_string('footercontent_desc', 'theme_customtheme');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Show footer login info.
    $name = 'theme_customtheme/showfooterlogininfo';
    $title = get_string('showfooterlogininfo', 'theme_customtheme');
    $description = get_string('showfooterlogininfo_desc', 'theme_customtheme');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);
}
