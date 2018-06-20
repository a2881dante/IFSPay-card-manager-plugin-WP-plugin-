<?php
/*
Plugin Name: IFSPay Card Plagin
Description: The plug-in adds a page for registering the card and processing the received data using ifspay`s API. Also adds a page for viewing the status of registering a card.
Version: 0.5
Author: Europe Smart Solutions LTD
Author URI: https://www.europe-smart-solutions.co.uk
*/

    ob_clean(); ob_start();

    require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );
    require_once("includes/setting.php");

    register_activation_hook( __FILE__ , 'crmp_on_activate');
    register_deactivation_hook( __FILE__, 'crmp_on_deactivate');
    register_uninstall_hook( __FILE__ , 'crmp_on_uninstall');

    add_action( 'the_content', 'crmp_action_add_page' );
    add_action( 'wp_enqueue_scripts', 'crmp_script_style_init' );
    add_action( 'init', 'crmp_setcookie' );
    add_action( 'wp_head', 'crmp_getcookie' );