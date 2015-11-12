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
        // Get options settings
        $options = tt_generate_options();
        ?>
        <form method="post">
            <div id="wp-msg-setting">
                <div class="wp-msg-setting-header">
                    <h1 class="wp-msg-title"><?php _e('Setting', 'harmony'); ?></h1>
                    <p class="wp-msg-desc"><?php _e('All settings for the plugin.', 'harmony'); ?></p>
                </div>

                <div class="wp-msg-setting-body">
                    <table class="form-table">
                        <tbody>
                            <?php foreach ($options as $field) {
                                switch ($field['type']) {
                                    case 'text':
                                        ?>
                                        <tr class="section">
                                            <th scope="row"><?php echo $field['name']; ?></th>
                                            <td>
                                                <input type="text" class="regular-text" id="<?php echo $field['id']; ?>" name="<?php echo $field['id']; ?>" value="<?php echo $field['default']; ?>">
                                                <p class="description"><?php echo $field['desc']; ?></p>
                                            </td>
                                        </tr>
                                        <?php
                                        break;
                                    case 'radio':
                                        ?>
                                        <tr class="section">
                                            <th scope="row"><?php echo $field['name']; ?></th>
                                            <td>
                                                <fieldset>
                                                    <?php
                                                        foreach ($field['value'] as $key => $value) {
                                                            if(!empty($field['default']) && $value == $field['default']) {
                                                                ?>
                                                                <label for="<?php echo $value; ?>">
                                                                    <input type="radio" id="<?php echo $value; ?>" name="<?php echo $field['id'] ?>" value="<?php echo $value; ?>" checked>
                                                                    <?php echo $key; ?>
                                                                </label>
                                                                <br>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <label for="<?php echo $value; ?>">
                                                                    <input type="radio" id="<?php echo $value; ?>" name="<?php echo $field['id'] ?>" value="<?php echo $value; ?>">
                                                                    <?php echo $key; ?>
                                                                </label>
                                                                <br>
                                                                <?php
                                                            }
                                                        }
                                                    ?>
                                                </fieldset>
                                                <p class="description"><?php echo $field['desc']; ?></p>
                                            </td>
                                        </tr>
                                        <?php
                                        break;
                                    case 'color':
                                        ?>
                                        <tr class="section">
                                            <th scope="row"><?php echo $field['name'] ?></th>
                                            <td>
                                                <input type="text" class="color-picker" id="<?php echo $field['id']; ?>" name="<?php echo $field['id']; ?>" data-default-color="<?php echo $field['default']; ?>">
                                                <p class="description"><?php echo $field['desc']; ?></p>
                                            </td>
                                        </tr>
                                        <?php
                                        break;

                                    default:
                                        # code...
                                        break;
                                }
                            }?>
                            <!-- <tr class="section">
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
                                <th scope="row">Select</th>
                                <td>
                                    <select name="" id="">
                                        <option value="">Option 1</option>
                                        <option value="">Option 2</option>
                                    </select>
                                    <p class="description">Select description</p>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                    
                    <div class="wp-msg-action-button">
                        <input type="submit" class="button" name="reset-option" value="Reset">
                        <input type="submit" class="button-primary" name="save-option" value="Save Changes">
                    </div><!-- /.wp-msg-action-button -->
                </div>
            </div>
        </form>
        <?php
    }
}