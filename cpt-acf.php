<?php
/*
Plugin Name: Advanced Custom Fields : CPT Options Pages
Plugin URI: https://wordpress.org/plugins/acf-cpt-options-pages/
Description: Enables ACF options pages for a post type archive.
Author: Tusko Trush
Author URI: https://frontend.im/
Version: 1.1.0
License: GPL v3

CPT ACF Options Pages
Copyright (C) 2016, Tusko Trush - tusko@photoinside.me

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function ctpacf_admin_error_notice() {
    echo '<div class="update-nag"><p>The plugin <strong>Advanced Custom Fields : CPT Options Pages</strong> is not standalone plugin.<br />Please buy <a href="http://www.advancedcustomfields.com/add-ons/options-page/">ACF Options Page Addon</a> or <a href="http://www.advancedcustomfields.com/pro/">ACF PRO</a> and install it.</p></div>';
}

function ctpacf_options_pages() {

    if( function_exists('acf_add_options_page') ) { //Check if installed acf

        $ctpacf_post_types = get_post_types( array(
            '_builtin' => false,
            'has_archive' => true
        ) ); //get post types

        foreach ( $ctpacf_post_types as $cpt ) {

            if( post_type_exists( $cpt ) ) {

                $cptname = get_post_type_object( $cpt )->labels->name;
                $cpt_post_id = 'cpt_' . $cpt;

                if( defined('ICL_LANGUAGE_CODE') ) {
                    $cpt_post_id = $cpt_post_id . '_' . ICL_LANGUAGE_CODE;
                }

                $cpt_acf_page = array(
                    'page_title' => ucfirst( $cptname ) . ' Archive',
                    'menu_title' => ucfirst( $cptname ) . ' Archive',
                    'parent_slug' => 'edit.php?post_type=' . $cpt,
                    'menu_slug' => $cpt . '-archive',
                    'capability' => 'edit_posts',
                    'post_id' => $cpt_post_id,
                    'position' => false,
                    'icon_url' => false,
                    'redirect' => false
                );

                acf_add_options_page( $cpt_acf_page );

            } // end if

        }

    } else { //activation warning

        add_action( 'admin_notices', 'ctpacf_admin_error_notice' );

    }

}

add_action( 'init', 'ctpacf_options_pages', 99 );


function ctpacf_action_links( $ctpacf_links ) {
    $ctpacf_links[] = '<a href="https://github.com/Tusko/ACF-CPT-Options-Pages#usage" target="_blank">Documentation</a>';
    return $ctpacf_links;
}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'ctpacf_action_links' );

?>
