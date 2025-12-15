# Custom Theme Installation Guide

## Quick Start

1. **Upload the theme**
   - Place the entire `customtheme` folder in `moodle/theme/`
   - The final path should be: `moodle/theme/customtheme/`

2. **Install via Moodle**
   - Log in as administrator
   - Go to: Site administration → Notifications
   - Click "Upgrade Moodle database now"
   - Complete the installation process

3. **Activate the theme**
   - Navigate to: Site administration → Appearance → Themes → Theme selector
   - Choose "Custom Theme" from the dropdown
   - Save changes

## Detailed Configuration

### Setting Brand Colors

1. Go to: Site administration → Appearance → Themes → Custom Theme
2. Find "Brand colour" setting
3. Enter your hex color code (e.g., #0f6cbf)
4. Save changes
5. Purge all caches: Site administration → Development → Purge all caches

### Adding Custom SCSS

1. Navigate to theme settings
2. Use "Raw initial SCSS" for variables:
   ```scss
   $primary: #ff5722;
   $font-family-base: 'Arial', sans-serif;
   ```
3. Use "Raw SCSS" for custom styles:
   ```scss
   .my-custom-class {
       padding: 20px;
       border-radius: 4px;
   }
   ```

### Theme Presets

The theme supports standard Boost presets:
- **default.scss**: Standard Moodle look
- **plain.scss**: Minimal styling

## Troubleshooting

### Theme not appearing
- Check file permissions (755 for folders, 644 for files)
- Verify the theme is in the correct directory
- Purge all caches

### Styles not updating
- Clear browser cache
- Purge Moodle caches
- Check SCSS syntax for errors

### Custom colors not working
- Ensure color codes are valid hex values
- Purge all caches after changes
- Check browser console for errors

## Advanced Customization

### Creating Custom Layouts

1. Copy layout files from `theme/boost/layout/`
2. Place in `theme/customtheme/layout/`
3. Modify as needed
4. Update `config.php` if adding new layouts

### Adding Custom Templates

1. Create mustache templates in `templates/` directory
2. Follow Moodle template naming conventions
3. Use `{{{ output.render_from_template }}}` to render

### Performance Optimization

- Enable theme designer mode only during development
- Use SCSS efficiently (avoid deep nesting)
- Minimize custom CSS/SCSS
- Test on multiple devices and browsers

## System Requirements

- Moodle 4.1 or higher
- PHP 7.4 or higher
- Modern web browser with CSS3 support
- Write permissions on moodledata directory

## Getting Help

- Moodle Docs: https://docs.moodle.org/
- Moodle Forums: https://moodle.org/forums/
- Theme Development: https://docs.moodle.org/dev/Themes
