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
 * @copyright  2025 Your Name <your.email@example.com>
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
$string['colors'] = 'Colors';
$string['typography'] = 'Typography';
$string['frontpage'] = 'Frontpage';
$string['social'] = 'Social media';
$string['presets'] = 'Presets';
$string['advancedsettings'] = 'Advanced settings';

// General settings.
$string['logo'] = 'Logo';
$string['logo_desc'] = 'Upload a custom logo for your site. This will be displayed in the header.';
$string['logocompact'] = 'Compact logo';
$string['logocompact_desc'] = 'Upload a compact logo for use in the navigation bar when space is limited.';
$string['favicon'] = 'Favicon';
$string['favicon_desc'] = 'Upload a favicon for your site (16x16 or 32x32 pixels, .ico format recommended).';
$string['backgroundimage'] = 'Background image';
$string['backgroundimage_desc'] = 'The background image for the site. This will be displayed behind the content.';
$string['loginbackgroundimage'] = 'Login page background image';
$string['loginbackgroundimage_desc'] = 'Background image for the login page. This creates a more engaging login experience.';

// Colors.
$string['brandcolor'] = 'Brand colour';
$string['brandcolor_desc'] = 'The primary brand colour for the theme. This is used for buttons, links, and key UI elements.';
$string['secondarycolor'] = 'Secondary colour';
$string['secondarycolor_desc'] = 'The secondary colour for the theme. Used for secondary buttons and UI elements.';
$string['linkcolor'] = 'Link colour';
$string['linkcolor_desc'] = 'The colour for links throughout the site.';
$string['navbarcolor'] = 'Navigation bar colour';
$string['navbarcolor_desc'] = 'Background colour for the navigation bar.';
$string['footercolor'] = 'Footer colour';
$string['footercolor_desc'] = 'Background colour for the footer.';

// Typography.
$string['googlefonts'] = 'Google Fonts';
$string['googlefonts_desc'] = 'Configure Google Fonts for your theme. Enter font names exactly as they appear on Google Fonts.';
$string['fontname'] = 'Body font';
$string['fontname_desc'] = 'Enter the name of the Google Font to use for body text (e.g., Roboto, Open Sans).';
$string['fontnameheading'] = 'Heading font';
$string['fontnameheading_desc'] = 'Enter the name of the Google Font to use for headings (e.g., Roboto, Montserrat).';
$string['fontsize'] = 'Base font size';
$string['fontsize_desc'] = 'Select the base font size for the theme.';

// Frontpage.
$string['enablemarketingspots'] = 'Enable marketing spots';
$string['enablemarketingspots_desc'] = 'Display three marketing spots on the frontpage to highlight key features.';
$string['marketing1icon'] = 'Marketing spot 1 icon';
$string['marketing1icon_desc'] = 'FontAwesome icon class (e.g., fa-graduation-cap).';
$string['marketing1heading'] = 'Marketing spot 1 heading';
$string['marketing1heading_desc'] = 'Heading for the first marketing spot.';
$string['marketing1content'] = 'Marketing spot 1 content';
$string['marketing1content_desc'] = 'Content for the first marketing spot.';
$string['marketing2icon'] = 'Marketing spot 2 icon';
$string['marketing2icon_desc'] = 'FontAwesome icon class (e.g., fa-certificate).';
$string['marketing2heading'] = 'Marketing spot 2 heading';
$string['marketing2heading_desc'] = 'Heading for the second marketing spot.';
$string['marketing2content'] = 'Marketing spot 2 content';
$string['marketing2content_desc'] = 'Content for the second marketing spot.';
$string['marketing3icon'] = 'Marketing spot 3 icon';
$string['marketing3icon_desc'] = 'FontAwesome icon class (e.g., fa-users).';
$string['marketing3heading'] = 'Marketing spot 3 heading';
$string['marketing3heading_desc'] = 'Heading for the third marketing spot.';
$string['marketing3content'] = 'Marketing spot 3 content';
$string['marketing3content_desc'] = 'Content for the third marketing spot.';

// Social media.
$string['facebook'] = 'Facebook URL';
$string['facebook_desc'] = 'Enter the URL of your Facebook page (e.g., https://www.facebook.com/yourpage).';
$string['twitter'] = 'Twitter URL';
$string['twitter_desc'] = 'Enter the URL of your Twitter profile (e.g., https://twitter.com/yourprofile).';
$string['linkedin'] = 'LinkedIn URL';
$string['linkedin_desc'] = 'Enter the URL of your LinkedIn page (e.g., https://www.linkedin.com/company/yourcompany).';
$string['instagram'] = 'Instagram URL';
$string['instagram_desc'] = 'Enter the URL of your Instagram profile (e.g., https://www.instagram.com/yourprofile).';
$string['youtube'] = 'YouTube URL';
$string['youtube_desc'] = 'Enter the URL of your YouTube channel (e.g., https://www.youtube.com/yourchannel).';

// Presets.
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
$string['footercontent_desc'] = 'Custom HTML content to display in the footer.';
$string['showfooterlogininfo'] = 'Show login information in footer';
$string['showfooterlogininfo_desc'] = 'If enabled, login information will be displayed in the footer.';
$string['customcss'] = 'Custom CSS';
$string['customcss_desc'] = 'Add custom CSS rules to further customize your theme appearance.';

// Privacy.
$string['privacy:metadata'] = 'The Custom Theme theme does not store any personal data about any user.';
