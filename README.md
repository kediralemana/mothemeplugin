# Custom Theme for Moodle

A modern, customizable Moodle theme based on Boost.

## Description

Custom Theme is a clean and flexible theme for Moodle that extends the Boost theme with additional customization options and modern design elements.

## Features

- Based on Moodle's Boost theme
- Customizable brand colors
- Favicon upload and custom logo
- SCSS support for advanced customization
- Responsive design
- Modern card-based layouts
- Clean navigation

## Installation

1. Install the theme into your Moodle `theme` directory so the final path is:
   ```
   moodle/theme/customtheme/
   ```
   The `customtheme` folder must contain `config.php`, `version.php`, and the other plugin files.

2. Log in to your Moodle site as an administrator

3. Navigate to: Site administration → Notifications

4. Follow the on-screen instructions to complete the installation

5. Navigate to: Site administration → Appearance → Themes → Theme selector

6. Select "Custom Theme" as your theme

## Configuration

After installation, you can configure the theme:

1. Go to: Site administration → Appearance → Themes → Custom Theme

2. Configure the following settings:
   - **Brand colour**: Set your primary brand color
   - **Favicon**: Upload a favicon (ico/png/jpg/svg)
   - **Theme preset**: Choose a preset style
   - **Raw initial SCSS**: Add SCSS variables
   - **Raw SCSS**: Add custom SCSS/CSS code

## Requirements

- Moodle 4.4–5.1
- Boost theme (included with Moodle)

## File Structure

```
customtheme/
├── config.php              # Theme configuration
├── version.php             # Version information
├── lib.php                 # Theme functions
├── settings.php            # Theme settings
├── lang/
│   └── en/
│       └── theme_customtheme.php  # Language strings
├── templates/
│   ├── columns2.mustache          # Columns layout template
│   ├── embedded.mustache          # Embedded layout template
│   ├── maintenance.mustache       # Maintenance layout template
│   └── secure.mustache            # Secure layout template
├── layout/
│   ├── columns2.php        # Standard layout
│   ├── embedded.php        # Embedded layout
│   ├── maintenance.php     # Maintenance layout
│   └── secure.php          # Secure/safe browser layout
├── scss/
│   └── customtheme.scss    # Custom SCSS styles
└── style/
    └── moodle.css          # Fallback CSS
```

## Customization

### Changing Colors

You can change the theme colors through the settings page or by adding SCSS variables:

```scss
$primary: #0f6cbf;
$secondary: #6c757d;
```

### Adding Custom Styles

Add custom CSS/SCSS in the "Raw SCSS" field in theme settings:

```scss
.custom-class {
    background-color: #f5f5f5;
    padding: 20px;
}
```

## Support

For issues and questions:
- Check Moodle documentation: https://docs.moodle.org/
- Moodle forums: https://moodle.org/forums/

## License

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

## Credits

- Based on the Boost theme by Moodle HQ
- Maintained by Custom Theme contributors

## Changelog

### Version 2025121900 (v1.0.1)
- Convert layouts to Moodle PHP layout wrappers plus Mustache templates for 4.4–5.1 compatibility
- Brand colour now also drives custom SCSS accents
- Background image setting now applies automatically to the body
- Added favicon upload setting and favicon rendering override
- Enabled course index drawer support (Moodle 4.4+)
- Exposed brand colour as CSS custom properties for downstream styling

### Version 2025121500
- Initial release
- Basic theme structure
- Color customization options
- SCSS support
