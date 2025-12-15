# Custom Theme for Moodle

A modern, customizable Moodle theme based on Boost.

## Description

Custom Theme is a clean and flexible theme for Moodle that extends the Boost theme with additional customization options and modern design elements.

## Features

- Based on Moodle's Boost theme
- Customizable brand colors
- SCSS support for advanced customization
- Responsive design
- Modern card-based layouts
- Clean navigation

## Installation

1. Copy the `customtheme` folder to your Moodle installation's `theme` directory:
   ```
   moodle/theme/customtheme/
   ```

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
   - **Theme preset**: Choose a preset style
   - **Raw initial SCSS**: Add SCSS variables
   - **Raw SCSS**: Add custom SCSS/CSS code

## Requirements

- Moodle 4.1 or later
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
├── layout/
│   └── columns2.php        # Layout template
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
- Copyright 2025 Your Name

## Changelog

### Version 2025121500
- Initial release
- Basic theme structure
- Color customization options
- SCSS support
