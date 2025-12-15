{{!
    This file is part of Moodle - http://moodle.org/

    Moodle is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Moodle is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
}}
{{!
    @template theme_customtheme/secure

    Custom theme secure layout template.

    This layout is used for safebrowser and securewindow modes.

    Context variables required for this template:
    * sitename - The name of the site
    * output - The core renderer for the page
    * bodyattributes - attributes for the body tag as a string of html attributes
    * sidepreblocks - HTML for the blocks
    * hasblocks - true if there are blocks on this page
}}
{{{ output.doctype }}}
<html {{{ output.htmlattributes }}}>
<head>
    <title>{{{ output.page_title }}}</title>
    <link rel="shortcut icon" href="{{{ output.favicon }}}" />
    {{{ output.standard_head_html }}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body {{{ bodyattributes }}}>
{{> core/local/toast/wrapper}}
<div id="page-wrapper" class="d-print-block">

    {{{ output.standard_top_of_body_html }}}

    <div id="page" class="container-fluid d-print-block">

        <div id="page-content" class="row pb-3 d-print-block">
            <div id="region-main-box" class="col-12">
                <section id="region-main" aria-label="{{#str}}content{{/str}}">
                    {{{ output.course_content_header }}}
                    {{{ output.main_content }}}
                    {{{ output.activity_navigation }}}
                    {{{ output.course_content_footer }}}
                </section>
                {{#hasblocks}}
                <section data-region="blocks-column" class="d-print-none">
                    {{{ sidepreblocks }}}
                </section>
                {{/hasblocks}}
            </div>
        </div>
    </div>

    {{{ output.standard_after_main_region_html }}}

</div>

{{{ output.standard_end_of_body_html }}}

</body>
</html>
{{#js}}
M.util.js_pending('theme_boost/loader');
require(['theme_boost/loader'], function() {
    M.util.js_complete('theme_boost/loader');
});
{{/js}}
