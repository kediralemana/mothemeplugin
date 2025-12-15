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
 * Theme settings configuration.
 *
 * This file defines the theme settings page and all configurable options.
 *
 * @package    theme_customtheme
 * @copyright  2025 Your Name <your.email@example.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    $settings = new theme_boost_admin_settingspage_tabs(
        'themesettingcustomtheme',
        get_string('configtitle', 'theme_customtheme')
    );

    // ==========================
    // GENERAL SETTINGS TAB
    // ==========================
    $page = new admin_settingpage(
        'theme_customtheme_general',
        get_string('generalsettings', 'theme_customtheme')
    );

    // Logo file setting.
    $name = 'theme_customtheme/logo';
    $title = get_string('logo', 'theme_customtheme');
    $description = get_string('logo_desc', 'theme_customtheme');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Small logo for navigation.
    $name = 'theme_customtheme/logocompact';
    $title = get_string('logocompact', 'theme_customtheme');
    $description = get_string('logocompact_desc', 'theme_customtheme');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logocompact');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Favicon.
    $name = 'theme_customtheme/favicon';
    $title = get_string('favicon', 'theme_customtheme');
    $description = get_string('favicon_desc', 'theme_customtheme');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'favicon');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Background image setting.
    $name = 'theme_customtheme/backgroundimage';
    $title = get_string('backgroundimage', 'theme_customtheme');
    $description = get_string('backgroundimage_desc', 'theme_customtheme');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'backgroundimage');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Login background image.
    $name = 'theme_customtheme/loginbackgroundimage';
    $title = get_string('loginbackgroundimage', 'theme_customtheme');
    $description = get_string('loginbackgroundimage_desc', 'theme_customtheme');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'loginbackgroundimage');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    // ==========================
    // COLORS TAB
    // ==========================
    $page = new admin_settingpage(
        'theme_customtheme_colors',
        get_string('colors', 'theme_customtheme')
    );

    // Brand colour setting.
    $name = 'theme_customtheme/brandcolor';
    $title = get_string('brandcolor', 'theme_customtheme');
    $description = get_string('brandcolor_desc', 'theme_customtheme');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#0f6cbf');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Secondary color.
    $name = 'theme_customtheme/secondarycolor';
    $title = get_string('secondarycolor', 'theme_customtheme');
    $description = get_string('secondarycolor_desc', 'theme_customtheme');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#6c757d');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Link color.
    $name = 'theme_customtheme/linkcolor';
    $title = get_string('linkcolor', 'theme_customtheme');
    $description = get_string('linkcolor_desc', 'theme_customtheme');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#0f6cbf');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Navbar color.
    $name = 'theme_customtheme/navbarcolor';
    $title = get_string('navbarcolor', 'theme_customtheme');
    $description = get_string('navbarcolor_desc', 'theme_customtheme');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#ffffff');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Footer color.
    $name = 'theme_customtheme/footercolor';
    $title = get_string('footercolor', 'theme_customtheme');
    $description = get_string('footercolor_desc', 'theme_customtheme');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#f8f9fa');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    // ==========================
    // TYPOGRAPHY TAB
    // ==========================
    $page = new admin_settingpage(
        'theme_customtheme_typography',
        get_string('typography', 'theme_customtheme')
    );

    // Google fonts heading.
    $name = 'theme_customtheme/googlefonts';
    $title = get_string('googlefonts', 'theme_customtheme');
    $description = get_string('googlefonts_desc', 'theme_customtheme');
    $setting = new admin_setting_heading($name, $title, $description);
    $page->add($setting);

    // Font name for body.
    $name = 'theme_customtheme/fontname';
    $title = get_string('fontname', 'theme_customtheme');
    $description = get_string('fontname_desc', 'theme_customtheme');
    $default = 'Roboto';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Font name for headings.
    $name = 'theme_customtheme/fontnameheading';
    $title = get_string('fontnameheading', 'theme_customtheme');
    $description = get_string('fontnameheading_desc', 'theme_customtheme');
    $default = 'Roboto';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Font size for body.
    $name = 'theme_customtheme/fontsize';
    $title = get_string('fontsize', 'theme_customtheme');
    $description = get_string('fontsize_desc', 'theme_customtheme');
    $default = '95%';
    $choices = [
        '75%' => '75%',
        '85%' => '85%',
        '95%' => '95%',
        '100%' => '100%',
        '105%' => '105%',
        '115%' => '115%',
        '125%' => '125%',
    ];
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    // ==========================
    // FRONTPAGE TAB
    // ==========================
    $page = new admin_settingpage(
        'theme_customtheme_frontpage',
        get_string('frontpage', 'theme_customtheme')
    );

    // Enable marketing spots.
    $name = 'theme_customtheme/enablemarketingspots';
    $title = get_string('enablemarketingspots', 'theme_customtheme');
    $description = get_string('enablemarketingspots_desc', 'theme_customtheme');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Marketing spot 1.
    $name = 'theme_customtheme/marketing1icon';
    $title = get_string('marketing1icon', 'theme_customtheme');
    $description = get_string('marketing1icon_desc', 'theme_customtheme');
    $default = 'fa-graduation-cap';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_customtheme/marketing1heading';
    $title = get_string('marketing1heading', 'theme_customtheme');
    $description = get_string('marketing1heading_desc', 'theme_customtheme');
    $default = 'Learn Anything';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_customtheme/marketing1content';
    $title = get_string('marketing1content', 'theme_customtheme');
    $description = get_string('marketing1content_desc', 'theme_customtheme');
    $default = 'Access hundreds of courses and learn from expert instructors.';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Marketing spot 2.
    $name = 'theme_customtheme/marketing2icon';
    $title = get_string('marketing2icon', 'theme_customtheme');
    $description = get_string('marketing2icon_desc', 'theme_customtheme');
    $default = 'fa-certificate';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_customtheme/marketing2heading';
    $title = get_string('marketing2heading', 'theme_customtheme');
    $description = get_string('marketing2heading_desc', 'theme_customtheme');
    $default = 'Get Certified';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_customtheme/marketing2content';
    $title = get_string('marketing2content', 'theme_customtheme');
    $description = get_string('marketing2content_desc', 'theme_customtheme');
    $default = 'Earn certificates and advance your career.';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Marketing spot 3.
    $name = 'theme_customtheme/marketing3icon';
    $title = get_string('marketing3icon', 'theme_customtheme');
    $description = get_string('marketing3icon_desc', 'theme_customtheme');
    $default = 'fa-users';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_customtheme/marketing3heading';
    $title = get_string('marketing3heading', 'theme_customtheme');
    $description = get_string('marketing3heading_desc', 'theme_customtheme');
    $default = 'Join Community';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_customtheme/marketing3content';
    $title = get_string('marketing3content', 'theme_customtheme');
    $description = get_string('marketing3content_desc', 'theme_customtheme');
    $default = 'Connect with learners around the world.';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    // ==========================
    // SOCIAL MEDIA TAB
    // ==========================
    $page = new admin_settingpage(
        'theme_customtheme_social',
        get_string('social', 'theme_customtheme')
    );

    // Facebook.
    $name = 'theme_customtheme/facebook';
    $title = get_string('facebook', 'theme_customtheme');
    $description = get_string('facebook_desc', 'theme_customtheme');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Twitter.
    $name = 'theme_customtheme/twitter';
    $title = get_string('twitter', 'theme_customtheme');
    $description = get_string('twitter_desc', 'theme_customtheme');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // LinkedIn.
    $name = 'theme_customtheme/linkedin';
    $title = get_string('linkedin', 'theme_customtheme');
    $description = get_string('linkedin_desc', 'theme_customtheme');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Instagram.
    $name = 'theme_customtheme/instagram';
    $title = get_string('instagram', 'theme_customtheme');
    $description = get_string('instagram_desc', 'theme_customtheme');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // YouTube.
    $name = 'theme_customtheme/youtube';
    $title = get_string('youtube', 'theme_customtheme');
    $description = get_string('youtube_desc', 'theme_customtheme');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    // ==========================
    // PRESETS TAB
    // ==========================
    $page = new admin_settingpage(
        'theme_customtheme_presets',
        get_string('presets', 'theme_customtheme')
    );

    // Preset.
    $name = 'theme_customtheme/preset';
    $title = get_string('preset', 'theme_customtheme');
    $description = get_string('preset_desc', 'theme_customtheme');
    $default = 'default.scss';
    $context = context_system::instance();
    $fs = get_file_storage();
    $files = $fs->get_area_files(
        $context->id,
        'theme_customtheme',
        'preset',
        0,
        'itemid, filepath, filename',
        false
    );
    $choices = [];
    foreach ($files as $file) {
        $choices[$file->get_filename()] = $file->get_filename();
    }
    $choices['default.scss'] = 'default.scss';
    $choices['plain.scss'] = 'plain.scss';
    $setting = new admin_setting_configthemepreset(
        $name,
        $title,
        $description,
        $default,
        $choices,
        'customtheme'
    );
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Preset files upload.
    $name = 'theme_customtheme/presetfiles';
    $title = get_string('presetfiles', 'theme_customtheme');
    $description = get_string('presetfiles_desc', 'theme_customtheme');
    $setting = new admin_setting_configstoredfile(
        $name,
        $title,
        $description,
        'preset',
        0,
        ['maxfiles' => 20, 'accepted_types' => ['.scss']]
    );
    $page->add($setting);

    // Raw SCSS to include before the content.
    $setting = new admin_setting_scsscode(
        'theme_customtheme/scsspre',
        get_string('rawscsspre', 'theme_customtheme'),
        get_string('rawscsspre_desc', 'theme_customtheme'),
        '',
        PARAM_RAW
    );
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Raw SCSS to include after the content.
    $setting = new admin_setting_scsscode(
        'theme_customtheme/scss',
        get_string('rawscss', 'theme_customtheme'),
        get_string('rawscss_desc', 'theme_customtheme'),
        '',
        PARAM_RAW
    );
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    // ==========================
    // HEADER & NAVIGATION TAB
    // ==========================
    $page = new admin_settingpage(
        'theme_customtheme_header',
        get_string('header', 'theme_customtheme')
    );

    // Header style.
    $name = 'theme_customtheme/headerstyle';
    $title = get_string('headerstyle', 'theme_customtheme');
    $description = get_string('headerstyle_desc', 'theme_customtheme');
    $default = 'style1';
    $choices = [
        'style1' => get_string('headerstyle1', 'theme_customtheme'),
        'style2' => get_string('headerstyle2', 'theme_customtheme'),
        'style3' => get_string('headerstyle3', 'theme_customtheme'),
    ];
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Sticky header.
    $name = 'theme_customtheme/stickyheader';
    $title = get_string('stickyheader', 'theme_customtheme');
    $description = get_string('stickyheader_desc', 'theme_customtheme');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Custom menu items heading.
    $name = 'theme_customtheme/custommenu';
    $title = get_string('custommenu', 'theme_customtheme');
    $description = get_string('custommenu_desc', 'theme_customtheme');
    $setting = new admin_setting_heading($name, $title, $description);
    $page->add($setting);

    // Quick link 1.
    $name = 'theme_customtheme/quicklink1text';
    $title = get_string('quicklink1text', 'theme_customtheme');
    $description = get_string('quicklink1text_desc', 'theme_customtheme');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_customtheme/quicklink1url';
    $title = get_string('quicklink1url', 'theme_customtheme');
    $description = get_string('quicklink1url_desc', 'theme_customtheme');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Quick link 2.
    $name = 'theme_customtheme/quicklink2text';
    $title = get_string('quicklink2text', 'theme_customtheme');
    $description = get_string('quicklink2text_desc', 'theme_customtheme');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_customtheme/quicklink2url';
    $title = get_string('quicklink2url', 'theme_customtheme');
    $description = get_string('quicklink2url_desc', 'theme_customtheme');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Quick link 3.
    $name = 'theme_customtheme/quicklink3text';
    $title = get_string('quicklink3text', 'theme_customtheme');
    $description = get_string('quicklink3text_desc', 'theme_customtheme');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_customtheme/quicklink3url';
    $title = get_string('quicklink3url', 'theme_customtheme');
    $description = get_string('quicklink3url_desc', 'theme_customtheme');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    // ==========================
    // ANNOUNCEMENT BANNER TAB
    // ==========================
    $page = new admin_settingpage(
        'theme_customtheme_announcement',
        get_string('announcement', 'theme_customtheme')
    );

    // Enable announcement.
    $name = 'theme_customtheme/enableannouncement';
    $title = get_string('enableannouncement', 'theme_customtheme');
    $description = get_string('enableannouncement_desc', 'theme_customtheme');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Announcement text.
    $name = 'theme_customtheme/announcementtext';
    $title = get_string('announcementtext', 'theme_customtheme');
    $description = get_string('announcementtext_desc', 'theme_customtheme');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Announcement type.
    $name = 'theme_customtheme/announcementtype';
    $title = get_string('announcementtype', 'theme_customtheme');
    $description = get_string('announcementtype_desc', 'theme_customtheme');
    $default = 'info';
    $choices = [
        'info' => get_string('info', 'theme_customtheme'),
        'success' => get_string('success', 'theme_customtheme'),
        'warning' => get_string('warning', 'theme_customtheme'),
        'danger' => get_string('danger', 'theme_customtheme'),
    ];
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Announcement dismissible.
    $name = 'theme_customtheme/announcementdismissible';
    $title = get_string('announcementdismissible', 'theme_customtheme');
    $description = get_string('announcementdismissible_desc', 'theme_customtheme');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    // ==========================
    // FOOTER CUSTOMIZATION TAB
    // ==========================
    $page = new admin_settingpage(
        'theme_customtheme_footercustom',
        get_string('footercustomization', 'theme_customtheme')
    );

    // Footer layout.
    $name = 'theme_customtheme/footerlayout';
    $title = get_string('footerlayout', 'theme_customtheme');
    $description = get_string('footerlayout_desc', 'theme_customtheme');
    $default = '3columns';
    $choices = [
        '1column' => get_string('1column', 'theme_customtheme'),
        '2columns' => get_string('2columns', 'theme_customtheme'),
        '3columns' => get_string('3columns', 'theme_customtheme'),
        '4columns' => get_string('4columns', 'theme_customtheme'),
    ];
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Footer column 1.
    $name = 'theme_customtheme/footercol1heading';
    $title = get_string('footercol1heading', 'theme_customtheme');
    $description = get_string('footercol1heading_desc', 'theme_customtheme');
    $default = 'About Us';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_customtheme/footercol1content';
    $title = get_string('footercol1content', 'theme_customtheme');
    $description = get_string('footercol1content_desc', 'theme_customtheme');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Footer column 2.
    $name = 'theme_customtheme/footercol2heading';
    $title = get_string('footercol2heading', 'theme_customtheme');
    $description = get_string('footercol2heading_desc', 'theme_customtheme');
    $default = 'Quick Links';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_customtheme/footercol2content';
    $title = get_string('footercol2content', 'theme_customtheme');
    $description = get_string('footercol2content_desc', 'theme_customtheme');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Footer column 3.
    $name = 'theme_customtheme/footercol3heading';
    $title = get_string('footercol3heading', 'theme_customtheme');
    $description = get_string('footercol3heading_desc', 'theme_customtheme');
    $default = 'Contact';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_customtheme/footercol3content';
    $title = get_string('footercol3content', 'theme_customtheme');
    $description = get_string('footercol3content_desc', 'theme_customtheme');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Footer column 4.
    $name = 'theme_customtheme/footercol4heading';
    $title = get_string('footercol4heading', 'theme_customtheme');
    $description = get_string('footercol4heading_desc', 'theme_customtheme');
    $default = 'Follow Us';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_customtheme/footercol4content';
    $title = get_string('footercol4content', 'theme_customtheme');
    $description = get_string('footercol4content_desc', 'theme_customtheme');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Copyright text.
    $name = 'theme_customtheme/copyrighttext';
    $title = get_string('copyrighttext', 'theme_customtheme');
    $description = get_string('copyrighttext_desc', 'theme_customtheme');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    // ==========================
    // COURSE DISPLAY TAB
    // ==========================
    $page = new admin_settingpage(
        'theme_customtheme_coursedisplay',
        get_string('coursedisplay', 'theme_customtheme')
    );

    // Course card style.
    $name = 'theme_customtheme/coursecardstyle';
    $title = get_string('coursecardstyle', 'theme_customtheme');
    $description = get_string('coursecardstyle_desc', 'theme_customtheme');
    $default = 'default';
    $choices = [
        'default' => get_string('carddefault', 'theme_customtheme'),
        'modern' => get_string('cardmodern', 'theme_customtheme'),
        'minimal' => get_string('cardminimal', 'theme_customtheme'),
    ];
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Show course summary.
    $name = 'theme_customtheme/showcoursesummary';
    $title = get_string('showcoursesummary', 'theme_customtheme');
    $description = get_string('showcoursesummary_desc', 'theme_customtheme');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Show teacher info.
    $name = 'theme_customtheme/showteacherinfo';
    $title = get_string('showteacherinfo', 'theme_customtheme');
    $description = get_string('showteacherinfo_desc', 'theme_customtheme');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Show course progress.
    $name = 'theme_customtheme/showcourseprogress';
    $title = get_string('showcourseprogress', 'theme_customtheme');
    $description = get_string('showcourseprogress_desc', 'theme_customtheme');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    // ==========================
    // ADVANCED TAB
    // ==========================
    $page = new admin_settingpage(
        'theme_customtheme_advanced',
        get_string('advancedsettings', 'theme_customtheme')
    );

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

    // Custom CSS.
    $name = 'theme_customtheme/customcss';
    $title = get_string('customcss', 'theme_customtheme');
    $description = get_string('customcss_desc', 'theme_customtheme');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);
}
