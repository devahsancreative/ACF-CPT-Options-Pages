=== Plugin Name ===

Contributors: tusko-trush
Donate link: https://arsmoon.com/
Tags: Advanced Custom Fields, ACF Options, Custom Post Type, Archive
Requires at least: 3.0
Tested up to: 4.6.1
Stable tag: 1.1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Small addon for ACF Options. Adds ACF location for each custom post type archive

== Description ==

= Usage =

The default functions of [ACF plugin](http://www.advancedcustomfields.com/ "Advanced Custom Fields") (`get_field, the_field, etc.`) can be used to load values from a CPT Options Pages, but second parameter is required to target the CPT options.

This is similar to passing through a `$post_id` parameter to target a specific post object.

The $post_id parameter needed is a string containing the `cpt_` and CPT name in the following format: `"cpt_{CPT_NAME}"`

= Examples =

>In examples Custom Post Type name is `projects`.

So, let's go!

**Display a field**

    <p><?php the_field('field_name', 'cpt_projects'); ?></p>

**Retrieve a field**

    <?php
        $field = get_field('field_name', 'cpt_projects');
        // do something with $field
    ?>

**Display a sub field**

`
    <?php if( have_rows('repeater_name', 'cpt_projects') ): ?>
        <ul>
            <?php while( have_rows('repeater_name', 'cpt_projects') ): the_row(); ?>
                <li><?php the_sub_field('the_title'); ?></li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>
`

**Display with shortcode**

    [acf field="field_name" post_id="cpt_projects"]

> Please read documentation about [shortcodes with ACF](http://www.advancedcustomfields.com/resources/shortcode/ "ACF Shortcode")


= License =

Copyright (c) 2016, [Tusko Trush](https://frontend.im/?github "Front-End Developer")

= Requirements =

You must buy ACF PRO or ACF Options Page Addon.

= Translation =

**qTanslate-X**

If you are using Qtranslate-X, you must install [ACF Qtranslate](https://uk.wordpress.org/plugins/acf-qtranslate/ "ACF Qtranslate").

**WPML/Polylang**

If you are using WPML or Polylang, you must add constant `ICL_LANGUAGE_CODE` to `post_id`,
for example: `get_field('archive_title', 'cpt_projects_' . ICL_LANGUAGE_CODE)`.


== Installation ==

1. Upload 'acf-cpt-options-pages' to the '/wp-content/plugins/' directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Create your Custom Field Group, set location rule 'Options Page' and choose your 'Custom Post Type'
4. Read the documentation to display your data.

== Frequently Asked Questions ==

If you have any questions on this please post an issue/question at [Github Issues](https://github.com/Tusko/ACF-CPT-Options-Pages/issues)

== Screenshots ==

1. assets/screenshot-1.png

== Changelog ==

= 1.1.0 =
* WPML and Polylang compatibility added.

= 1.0.2 =
* Update documentation.
* Change labels and slugs.

= 1.0.1 =
* Plugin created.

== Upgrade Notice ==

= 1.0.2 =
* Update documentation.
* Change labels and slugs.