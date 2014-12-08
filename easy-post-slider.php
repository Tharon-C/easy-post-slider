<?php
/**
 * Plugin Name: Easy Post Slider
 * Plugin URI: http://tharoncarlson.com/easy-post-slider
 * Description: Short Code: [post-slider], Horozantally scroll through a list of posts, reveling details when selected
 * Version: 0.0.1
 * Author: Tharon Carlson
 * Author URI: http://tharoncarlson.com
 * Text Domain:
 * Domain Path: 
 * Network:
 * License:GPL2
 */

/*  Copyright YEAR  Tharon Carlson  (email : design@tharoncarlson.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Load Scripts
add_action('wp_enqueue_scripts','scripts');
add_action('wp_enqueue_scripts', 'styles'); // Add Theme Stylesheet

function scripts() {
    wp_enqueue_script( 'main-js', plugins_url( '/js/main.js', __FILE__ ), array('jquery'), '1.0', true);
}

function styles() {
    wp_register_style('main-css', plugins_url('/css/main.css', __FILE__ ), array(), '1.0', 'all');
    wp_enqueue_style('main-css'); // Enqueue it!
}

function easy_post_slider( $atts ){
        ob_start();
        require 'team.php';
        return ob_get_clean();
}

add_shortcode( 'post_slider', 'easy_post_slider' );

function create_post_type_html5()
{
    register_taxonomy_for_object_type('category', 'team'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'team');
    register_post_type('team', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Team Profile', 'team'), // Rename these to suit
            'singular_name' => __('Team Profile', 'team'),
            'add_new' => __('Add New', 'team'),
            'add_new_item' => __('Add New HTML5 Blank Custom Post', 'team'),
            'edit' => __('Edit', 'team'),
            'edit_item' => __('Edit Team Profile', 'team'),
            'new_item' => __('New Team Profile', 'team'),
            'view' => __('View Team Profile', 'team'),
            'view_item' => __('View Team Profile', 'team'),
            'search_items' => __('Search Team Profile', 'team'),
            'not_found' => __('No Team Profile found', 'team'),
            'not_found_in_trash' => __('No Team Profile found in Trash', 'team')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ));
}
?>