<?php

/*
Plugin Name: WP Message Box
Plugin URI: http://tatthien.com
Description: Plugin helps you to show the Facebook page message box on your website
Version: 1.0
Author: Tat Thien
Author URI: http://tatthien.com
License: A "Slug" license name e.g. GPL2
*/

/**
 * Include requirement files
 * @param void
 * @author void
 * @since 1.0
 * @author tatthien
 */
if(!function_exists('tt_plugin_setup')) {
    function tt_plugin_setup() {
        require_once dirname( __FILE__ ) . '/core/options.php';
        require_once dirname( __FILE__ ) . '/core/settings.php';
    }
}

add_action('after_setup_theme', 'tt_plugin_setup');

/**
 * Init public styles, scripts
 * @param void
 * @return void
 * @since 1.0
 * @author tatthien
 */
if(!function_exists('tt_add_public_scripts')) {
    function tt_add_public_scripts() {
        wp_enqueue_style('wp-message-box', plugin_dir_url(__FILE__) . '/assets/css/wp-message-box.css', array(), '1.0', 'all');
        wp_enqueue_style('font-awesome', plugin_dir_url(__FILE__) . '/assets/css/font-awesome.css', array(), '1.0', 'all');

        // Enqueue scripts
        wp_enqueue_script('wp-message-box', plugin_dir_url(__FILE__) . '/assets/js/wp-message-box.js', array('jquery'), '1.0', true);
    }
}

add_action('wp_enqueue_scripts', 'tt_add_public_scripts');

/**
 * Render the message box html to main site
 * @param void
 * @return void
 * @since 1.0
 * @author tatthien
 */
if(!function_exists("tt_render_message_box")) {
    function tt_render_message_box() {
        ?>
        <div id="wp-message-box-wrapper">
            <div class="wp-message-box-header">
                <h2><?php echo __("Send us message via Facebook"); ?>
                    <span class="icon"><i class="fa fa-expand"></i></span>
                </h2>
            </div>

            <div class="wp-message-box-body">
                <iframe src="https://www.facebook.com/plugins/page.php?adapt_container_width=true&app_id=307394109435345&container_width=0&height=400&hide_cover=false&href=http://facebook.com/geekboy.in&locale=vi_VN&show_facepile=true&small_header=true&tabs=messages&width=300&hash=AQD1SgNbKhFHqjBs" frameborder="0" scroll="yes" height="400"></iframe>
            </div>
        </div>
        <?php
    }
}

add_action('wp_footer', 'tt_render_message_box');