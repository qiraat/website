<?php
/*
Plugin Name: Qiraat Core
Plugin URI: https://themeforest.net/user/themeim/portfolio
Description: Plugin to contain short codes and custom post types of the Qiraat theme.
Author: Themeim
Author URI: https://themeim.com/
Version: 2.0.1
Text Domain: qiraat-core
*/


/**
 * If this file is called directly, abort.
 * @package qiraat
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/**
 * Plugin directory path
 * @package qiraat
 * @since 1.0.0
 */
define( 'QIRAAT_CORE_ROOT_PATH', plugin_dir_path( __FILE__ ) );
define( 'QIRAAT_CORE_ROOT_URL', plugin_dir_url( __FILE__ ) );
define( 'QIRAAT_CORE_SELF_PATH', 'qiraat-core/qiraat-core.php' );
define( 'QIRAAT_CORE_VERSION', '2.0.1' );
define( 'QIRAAT_CORE_INC', QIRAAT_CORE_ROOT_PATH .'/inc');
define( 'QIRAAT_CORE_LIB', QIRAAT_CORE_ROOT_PATH .'/lib');
define( 'QIRAAT_CORE_ELEMENTOR', QIRAAT_CORE_ROOT_PATH .'/elementor');
define( 'QIRAAT_CORE_DEMO_IMPORT', QIRAAT_CORE_ROOT_PATH .'/demo-import');
define( 'QIRAAT_CORE_ADMIN', QIRAAT_CORE_ROOT_PATH .'/admin');
define( 'QIRAAT_CORE_ADMIN_ASSETS', QIRAAT_CORE_ROOT_URL .'admin/assets');
define( 'QIRAAT_CORE_WP_WIDGETS', QIRAAT_CORE_ROOT_PATH .'/wp-widgets');
define( 'QIRAAT_CORE_ASSETS', QIRAAT_CORE_ROOT_URL .'assets/');
define( 'QIRAAT_CORE_CSS', QIRAAT_CORE_ASSETS .'css');
define( 'QIRAAT_CORE_JS', QIRAAT_CORE_ASSETS .'js');
define( 'QIRAAT_CORE_IMG', QIRAAT_CORE_ASSETS .'img');


/**
 * Load additional helpers functions
 * @package qiraat
 * @since 1.0.0
 */
if (!function_exists('qiraat_core')){
	require_once QIRAAT_CORE_INC .'/theme-core-helper-functions.php';
	if (!function_exists('qiraat_core')){
		function qiraat_core(){
			return class_exists('Qiraat_Core_Helper_Functions') ? new Qiraat_Core_Helper_Functions() : false;
		}
	}
}
//ob flash
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );


/**
 * Load Codestar Framework Functions
 * @package qiraat
 * @since 1.0.0
 */
if ( !qiraat_core()->is_qiraat_active()) {
	if ( file_exists( QIRAAT_CORE_ROOT_PATH . '/inc/csf-functions.php' ) ) {
		require_once QIRAAT_CORE_ROOT_PATH . '/inc/csf-functions.php';
	}
}



/**
 * Core Plugin Init
 * @package qiraat
 * @since 1.0.0
 */
if ( file_exists( QIRAAT_CORE_ROOT_PATH . '/inc/theme-core-init.php' ) ) {
	require_once QIRAAT_CORE_ROOT_PATH . '/inc/theme-core-init.php';
}
