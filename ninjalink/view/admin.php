<?php
defined('ABSPATH') or die("No script kiddies please!");
/**
 * User: Ninjalink.com
 */

?>
<div class="wrap">
    <a href="http://www.ninjalink.com" target="_blank" name="Go to Ninjalink.com"><img src="<?php echo plugins_url() .'/ninjalink/images/ninjalink.png'; ?>"></a>
    <hr>
    <p>To register a ninjalink.com account, please <a href="https://www.ninjalink.com/account">click here</a></p>

    <?php if($updated): ?>
        <div class="updated">
            <p><?php _e( 'Settings updated successfully' ); ?></p>
        </div>
    <?php endif; ?>

    <?php if($failed !== false): ?>
        <div class="failed">
            <p><?php echo $failed; ?></p>
        </div>
    <?php endif; ?>

    <form method="post" action="options-general.php?page=ninjalink-wp-plugin">
        <?php settings_fields( 'ninjalink-settings' ); ?>
        <?php do_settings_sections( 'ninjalink-settings' ); ?>
        <table class="form-table">

            <tr valign="top">
                <th scope="row">Blacklist domains that you don't want the ninjalink plugin to convert. (one domain per line, no http or https or use of www infront of the domain)</th>
                <td><textarea name="blacklist"><?php echo esc_attr( get_option('ninjalink_ln_blacklist') ); ?></textarea></td>
            </tr>

            <tr valign="top">
                <th scope="row">Website ID</th>
                <td><input type="text" name="ninjalink_ln_web" value="<?php echo esc_attr( get_option('ninjalink_ln_web') ); ?>" /></td>
            </tr>

            <tr valign="top">
                <th scope="row">Token (Key)</th>
                <td><input type="text" name="ninjalink_ln_id" value="<?php echo esc_attr( get_option('ninjalink_ln_id') ); ?>" /></td>
            </tr>

        </table>

        <?php submit_button(); ?>

    </form>
    <style>
        .failed {
            background-color: white;
            color: black;
            padding: 1px 12px;
            border-left: 3px solid #F00;
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            margin: 5px 0 15px;
        }

        .failed p {
            line-height: 10px;
        }
    </style>