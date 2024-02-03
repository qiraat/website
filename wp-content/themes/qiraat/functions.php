<?php
/**
 * Theme functions & definitations
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package qiraat
 */

/**
 * Define Theme Folder Path & URL Constant
 * @package qiraat
 * @since 2.0.1
 */

define('QIRAAT_THEME_ROOT', get_template_directory());
define('QIRAAT_THEME_ROOT_URL', get_template_directory_uri());
define('QIRAAT_INC', QIRAAT_THEME_ROOT . '/inc');
define('QIRAAT_THEME_SETTINGS', QIRAAT_INC . '/theme-settings');
define('QIRAAT_THEME_SETTINGS_IMAGES', QIRAAT_THEME_ROOT_URL . '/inc/theme-settings/images');
define('QIRAAT_TGMA', QIRAAT_INC . '/plugins/tgma');
define('QIRAAT_DYNAMIC_STYLESHEETS', QIRAAT_INC . '/theme-stylesheets');
define('QIRAAT_CSS', QIRAAT_THEME_ROOT_URL . '/assets/css');
define('QIRAAT_JS', QIRAAT_THEME_ROOT_URL . '/assets/js');
define('QIRAAT_ASSETS', QIRAAT_THEME_ROOT_URL . '/assets');
define('QIRAAT_DEV', true);


/**
 * Theme Initial File
 * @package qiraat
 * @since 1.0.0
 */
if (file_exists(QIRAAT_INC . '/theme-init.php')) {
    require_once QIRAAT_INC . '/theme-init.php';
}


/**
 * Codester Framework Functions
 * @package qiraat
 * @since 1.0.0
 */
if (file_exists(QIRAAT_INC . '/theme-cs-function.php')) {
    require_once QIRAAT_INC . '/theme-cs-function.php';
}


/**
 * Theme Helpers Functions
 * @package qiraat
 * @since 1.0.0
 */
if (file_exists(QIRAAT_INC . '/theme-helper-functions.php')) {

    require_once QIRAAT_INC . '/theme-helper-functions.php';
    if (!function_exists('qiraat')) {
        function qiraat()
        {
            return class_exists('Qiraat_Helper_Functions') ? new Qiraat_Helper_Functions() : false;
        }
    }
}
/**
 * Nav menu fallback function
 * @since 1.0.0
 */
if (is_user_logged_in()) {
    function qiraat_theme_fallback_menu()
    {
        get_template_part('template-parts/default', 'menu');
    }
}

