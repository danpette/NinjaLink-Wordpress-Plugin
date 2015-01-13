<?php
/**
 * Plugin Name: Ninjalink Affiliate
 * Plugin URI: http://ninjalink.com/plugins
 * Description: Replace all links with affiliate ones.
 * Version: 1.0.2
 * Author: Ninjalink.com
 * Author URI: http://ninjalink.com
 */
defined('ABSPATH') or die("No script kiddies please!");

const VERSION = '1.0.2 - 02.01.2014';

function ninjalink_js() {
    $ln_id = get_option('ninjalink_ln_id');
    $ln_web = get_option('ninjalink_ln_web');
    if(!empty($ln_id) && !empty($ln_web)) {
        echo '<script type="text/javascript">' .
            "var ln_id = '" . str_replace(' ','',get_option('ninjalink_ln_id')) . "';" .
            "var ln_web = '" . str_replace(' ','',get_option('ninjalink_ln_web')) . "';" .
            "function LinkNinjaOnload() {" .
            'var element = document.createElement("script");' .
            'element.src = "//js.ninjalink.com/r.js";' .
            'document.body.appendChild(element);' .
            '}' .
            'if (window.addEventListener) window.addEventListener("load", LinkNinjaOnload, false);' .
            'else if (window.attachEvent) window.attachEvent("onload", LinkNinjaOnload);' .
            'else window.onload = downloadJSAtOnload;' .
            '</script>';
    }
}

function ninjalink_add_menu() {
    add_options_page( 'Ninjalink', 'Ninjalink', 'manage_options', 'ninjalink-wp-plugin', 'ninjalink_admin_display' );
}

function ninjalink_admin_display() {
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }

    $updated = false;

    if($_POST){
        if(isset($_POST['option_page']) && $_POST['option_page'] == "ninjalink-settings" && isset($_POST['action']) && $_POST['action'] = "update"){
            $ln_id = "";
            $ln_web = "";
            if(isset($_POST['ninjalink_ln_id'])){
                $ln_id = preg_replace("/[^A-Za-z0-9 ]/", '', $_POST['ninjalink_ln_id']);
                update_option('ninjalink_ln_id', $ln_id);
            }

            if(isset($_POST['ninjalink_ln_web'])){
                $ln_web = preg_replace("/[^A-Za-z0-9 ]/", '', $_POST['ninjalink_ln_web']);
                update_option('ninjalink_ln_web', $ln_web);
            }

            $updated = true;
        }
    }

    include  plugin_dir_path( __FILE__ ) . 'view/admin.php';
}

add_action('wp_head', 'ninjalink_js');
add_action( 'admin_menu', 'ninjalink_add_menu' );
