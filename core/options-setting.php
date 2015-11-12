<?php
/**
 * Created by PhpStorm.
 * User: Tat Thien
 * Date: 11/12/2015
 * Time: 1:07 PM
 */
if(!function_exists('tt_add_setting_scripts')) {
    function tt_add_setting_scripts() {
        if(isset($_GET['page']) && $_GET['page'] = 'wp-message-box-setting') {
            wp_enqueue_style('wp-msg-setting', plugin_dir_url(__FILE__) . '/wp-msg-setting.css', array(), '1.0', 'all');
            wp_enqueue_style('wp-color-picker');

            wp_enqueue_script('wp-msg-setting', plugin_dir_url(__FILE__) . '/wp-msg-setting.js', array('jquery'), '1.0', true );
        }
    }
}

add_action('admin_enqueue_scripts', 'tt_add_setting_scripts');

/**
 * Add setting menu
 */
if(!function_exists('tt_add_plugin_setting_menu')) {
    function tt_add_plugin_setting_menu() {
        $page_slug = 'wp-message-box-setting';
        $page_title = 'WP Message Box Setting';
        $page_menu = 'WP Message Box';
        add_submenu_page(
            'options-general.php',
            $page_title,
            $page_menu,
            'manage_options',
            $page_slug,
            'tt_plugin_setting_page'
        );
    }
}

add_action('admin_menu', 'tt_add_plugin_setting_menu');

if(!function_exists('tt_plugin_setting_page')) {
    function tt_plugin_setting_page() {
        ?>
        <div id="wp-msg-setting">
            <div class="wp-msg-setting-header">
                <h1 class="wp-msg-title"><?php _e('Setting', 'harmony'); ?></h1>
                <p class="wp-msg-desc"><?php _e('All settings for the plugin.', 'harmony'); ?></p>
            </div>

            <div class="wp-msg-setting-body">
                <table class="form-table">
                    <tbody>
                        <tr class="section">
                            <th scope="row">Text</th>
                            <td>
                                <input type="text" class="regular-text">
                                <p class="description">Enter your Facebook page slug. e.g http://facebook.com/{page-slug}</p>
                            </td>
                        </tr>

                        <tr class="section">
                            <th scope="row">Checkbox</th>
                            <td>
                                <label for="checkbox">
                                    <input type="checkbox" id="checkbox">
                                    Checkbox label
                                </label>
                                <p class="description">Checkbox description</p>
                            </td>
                        </tr>

                        <tr class="section">
                            <th scope="row">Checkbox</th>
                            <td>
                                <fieldset>
                                    <label for="">
                                        <input type="radio" name="radio">
                                        Option 1
                                    </label>
                                    <br>
                                    <label for="">
                                        <input type="radio" name="radio">
                                        Option 2
                                    </label>
                                    <br>
                                    <label for="">
                                        <input type="radio" name="radio">
                                        Option 3
                                    </label>
                                </fieldset>
                                <p class="description">Radio description</p>
                            </td>
                        </tr>

                        <tr class="section">
                            <th scope="row">Select</th>
                            <td>
                                <select name="" id="">
                                    <option value="">Option 1</option>
                                    <option value="">Option 2</option>
                                </select>
                                <p class="description">Select description</p>
                            </td>
                        </tr>

                        <tr class="section">
                            <th scope="row">Color select</th>
                            <td>
                                <input type="text" class="color-picker" data-default-color="#007acc">
                                <p class="description">Color description</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
    }
}