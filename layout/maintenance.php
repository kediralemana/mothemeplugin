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
    @template theme_customtheme/maintenance

    Custom theme maintenance layout template.

    This layout is used during upgrade, install, and maintenance mode.

    Context variables required for this template:
    * sitename - The name of the site
    * output - The core renderer for the page
    * bodyattributes - attributes for the body tag as a string of html attributes
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

    {{{ output.standard_top_of_body_html }}}

    <div id="page-wrapper">
        <div id="page" class="container-fluid">
            <div id="page-content" class="row">
                <section id="region-main" class="col-12">
                    {{{ output.main_content }}}
                </section>
            </div>
        </div>
    </div>

    {{{ output.standard_end_of_body_html }}}

</body>
</html>
