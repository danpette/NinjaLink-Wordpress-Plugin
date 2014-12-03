<?php
defined('ABSPATH') or die("No script kiddies please!");
/**
 * User: Ninjalink.com
 */

?>
<div class="wrap">
    <a href="http://www.ninjalink.com" target="_blank" name="Go to Ninjalink.com"><img src="<?php echo plugins_url() .'/ninjalink/images/ninjalink.png'; ?>"></a>
    <hr>
    <p>To register a ninjalink.com account, please <a href="http://www.ninjalink.com/account">click here</a></p>

    <?php if($updated): ?>
        <div class="updated">
            <p><?php _e( 'Settings updated successfully' ); ?></p>
        </div>
    <?php endif; ?>

    <form method="post" action="options-general.php?page=ninjalink-wp-plugin">
        <?php settings_fields( 'ninjalink-settings' ); ?>
        <?php do_settings_sections( 'ninjalink-settings' ); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">User ID</th>
                <td><input type="text" name="ninjalink_ln_id" value="<?php echo esc_attr( get_option('ninjalink_ln_id') ); ?>" /></td>
            </tr>

            <tr valign="top">
                <th scope="row">Website ID</th>
                <td><input type="text" name="ninjalink_ln_web" value="<?php echo esc_attr( get_option('ninjalink_ln_web') ); ?>" /></td>
            </tr>

        </table>

        <?php submit_button(); ?>

    </form>