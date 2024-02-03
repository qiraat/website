<?php
/**
 * Theme Core Init
 * @package qiraat
 * @since 1.0.0
 */

if (!defined("ABSPATH")) {
	exit(); //exit if access directly
}

if (!class_exists('Qiraat_Core_Init')) {

	class Qiraat_Core_Init
	{
	   /**
        * $instance
        * @since 1.0.0
        */
		protected static $instance;

		public function __construct()
		{
			//Load plugin assets
			add_action('wp_enqueue_scripts', array($this, 'plugin_assets'));
			//Load plugin admin assets
			add_action('admin_enqueue_scripts', array($this, 'admin_assets'));
			//load plugin text domain
			add_action('init', array($this, 'load_textdomain'));
			//load plugin dependency files()
            add_action('plugin_loaded', array($this, 'load_plugin_dependency_files'));
		}

	   /**
        * getInstance()
        * @since 1.0.0
        */
		public static function getInstance()
		{
			if (null == self::$instance) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Load Plugin Text domain
		 * @since 1.0.0
		 */
		public function load_textdomain()
		{
			load_plugin_textdomain('qiraat-core', false, QIRAAT_CORE_ROOT_PATH . '/languages');
		}

		/**
		 * Load plugin dependency files()
		 * @since 1.0.0
		 */
		public function load_plugin_dependency_files()
		{
			$includes_files = array(
				array(
					'file-name' => 'codestar-framework',
					'folder-name' => QIRAAT_CORE_LIB . '/codestar-framework'
				),
				array(
					'file-name' => 'theme-menu-page',
					'folder-name' => QIRAAT_CORE_ADMIN
				),
				array(
					'file-name' => 'theme-qiraat-core-excerpt',
					'folder-name' => QIRAAT_CORE_INC
				),
				array(
					'file-name' => 'csf-taxonomy',
					'folder-name' => QIRAAT_CORE_INC
				),
				array(
					'file-name' => 'theme-core-shortcodes',
					'folder-name' => QIRAAT_CORE_INC
				),
				array(
					'file-name' => 'elementor-widget-init',
					'folder-name' => QIRAAT_CORE_ELEMENTOR
				),
                array(
                    'file-name' => 'theme-social-share-widget',
                    'folder-name' => QIRAAT_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-about-me-widget',
                    'folder-name' => QIRAAT_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-about-us-widget',
                    'folder-name' => QIRAAT_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-post-search-widget',
                    'folder-name' => QIRAAT_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-post-tags-menu',
                    'folder-name' => QIRAAT_CORE_WP_WIDGETS
                ),
				array(
					'file-name' => 'theme-recent-post-widget',
					'folder-name' => QIRAAT_CORE_WP_WIDGETS
				),
				array(
					'file-name' => 'theme-contact-info-widget',
					'folder-name' => QIRAAT_CORE_WP_WIDGETS
				),
                array(
                    'file-name' => 'theme-service-category-widget',
                    'folder-name' => QIRAAT_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-request-form-widget',
                    'folder-name' => QIRAAT_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-post-category-widget',
                    'folder-name' => QIRAAT_CORE_WP_WIDGETS
                ),
				array(
					'file-name' => 'theme-demo-data-import',
					'folder-name' => QIRAAT_CORE_DEMO_IMPORT
				),
			);

            if (defined('ELEMENTOR_VERSION')) {
                $includes_files[] = array(
                    'file-name' => 'theme-elementor-icon-manager',
                    'folder-name' => QIRAAT_CORE_INC
                );
            }
			if (is_array($includes_files) && !empty($includes_files)) {
				foreach ($includes_files as $file) {
					if (file_exists($file['folder-name'] . '/' . $file['file-name'] . '.php')) {
						require_once $file['folder-name'] . '/' . $file['file-name'] . '.php';
					}
				}
			}
		}

		/**
		 * Admin assets
		 * @since 1.0.0
		 */
		public function plugin_assets()
		{
			self::load_plugin_css_files();
			self::load_plugin_js_files();
		}

		/**
		 * Load plugin css files()
		 * @since 1.0.0
		 */
		public function load_plugin_css_files()
		{
			$plugin_version = QIRAAT_CORE_VERSION;
			$all_css_files = array(
				array(
					'handle' => 'flaticon',
					'src' => QIRAAT_CORE_CSS . '/flaticon.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				),
                array(
                    'handle' => 'nice-select',
                    'src' => QIRAAT_CORE_CSS . '/nice-select.css',
                    'deps' => array(),
                    'ver' => $plugin_version,
                    'media' => 'all'
                ),
                array(
                    'handle' => 'slick',
                    'src' => QIRAAT_CORE_CSS . '/slick.css',
                    'deps' => array(),
                    'ver' => $plugin_version,
                    'media' => 'all'
                ),
				array(
					'handle' => 'fontawesome',
					'src' => QIRAAT_CORE_CSS . '/font-awesome.min.css',
					'deps' => array(),
					'ver' => '5.12.0',
					'media' => 'all'
				),
				array(
					'handle' => 'qiraat-core-main-style',
					'src' => QIRAAT_CORE_CSS . '/main-style.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				)
			);
			
			if (!qiraat_core()->is_qiraat_active()) {
				$all_css_files[] = array(
					'handle' => 'animate',
					'src' => QIRAAT_CORE_CSS . '/animate.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				);
				$all_css_files[] = array(
					'handle' => 'bootstrap',
					'src' => QIRAAT_CORE_CSS . '/bootstrap.min.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				);
				$all_css_files[] = array(
					'handle' => 'magnific-popup',
					'src' => QIRAAT_CORE_CSS . '/magnific-popup.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				);
				$all_css_files[] = array(
					'handle' => 'qiraat-main-style',
					'src' => QIRAAT_CORE_CSS . '/theme-style.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				);
				$all_css_files[] = array(
					'handle' => 'qiraat-responsive',
					'src' => QIRAAT_CORE_CSS . '/theme-responsive.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				);
			}
			$all_css_files = apply_filters('qiraat_core_css', $all_css_files);

			if (is_array($all_css_files) && !empty($all_css_files)) {
				foreach ($all_css_files as $css) {
					call_user_func_array('wp_enqueue_style', $css);
				}
			}
		}

		/**
		 * Load plugin js
		 * @since 1.0.0
		 */
		public function load_plugin_js_files()
		{
			$plugin_version = QIRAAT_CORE_VERSION;
			$all_js_files = array(
                array(
                    'handle' => 'wow',
                    'src' => QIRAAT_CORE_JS . '/wow.min.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
                array(
                    'handle' => 'nice-select',
                    'src' => QIRAAT_CORE_JS . '/jquery.nice-select.min.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
				array(
					'handle' => 'waypoints',
					'src' => QIRAAT_CORE_JS . '/waypoints.min.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				),
                array(
                    'handle' => 'jquery-easychart',
                    'src' => QIRAAT_CORE_JS . '/jquery.easypiechart.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
                array(
                    'handle' => 'isotope.pkgd',
                    'src' => QIRAAT_CORE_JS . '/isotope.pkgd.min.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
                array(
                    'handle' => 'imagesloaded-pkgd',
                    'src' => QIRAAT_CORE_JS . '/imagesloaded.pkgd.min.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
                array(
                    'handle' => 'countdown',
                    'src' => QIRAAT_CORE_JS . '/jquery.countdown.min.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
				array(
					'handle' => 'counterup',
					'src' => QIRAAT_CORE_JS . '/jquery.counterup.min.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				),
                array(
                    'handle' => 'slick',
                    'src' => QIRAAT_CORE_JS . '/slick.min.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
				array(
					'handle' => 'qiraat-core-main-script',
					'src' => QIRAAT_CORE_JS . '/main.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				),
			);

			if (!qiraat_core()->is_qiraat_active()) {
				$all_js_files[] = array(
					'handle' => 'popper',
					'src' => QIRAAT_CORE_JS . '/popper.min.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				);
				$all_js_files[] = array(
					'handle' => 'bootstrap',
					'src' => QIRAAT_CORE_JS . '/bootstrap.min.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				);
				$all_js_files[] = array(
					'handle' => 'magnific-popup',
					'src' => QIRAAT_CORE_JS . '/jquery.magnific-popup.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				);
			}

			$all_js_files = apply_filters('qiraat_core_frontend_script_enqueue', $all_js_files);
			if (is_array($all_js_files) && !empty($all_js_files)) {
				foreach ($all_js_files as $js) {
					call_user_func_array('wp_enqueue_script', $js);
				}
			}
		}

		/**
		 * Admin assets
		 * @since 1.0.0
		 */
		public function admin_assets()
		{
			self::load_admin_css_files();
			self::load_admin_js_files();
		}

		/**
		 * Load plugin admin css files()
		 * @since 1.0.0
		 */
		public function load_admin_css_files()
		{
			$plugin_version = QIRAAT_CORE_VERSION;
			$all_css_files = array(
				array(
					'handle' => 'qiraat-core-admin-style',
					'src' => QIRAAT_CORE_ADMIN_ASSETS . '/css/admin.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				),
				array(
					'handle' => 'flaticon',
					'src' => QIRAAT_CORE_CSS . '/flaticon.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				),
			);

			$all_css_files = apply_filters('qiraat_admin_css', $all_css_files);
			if (is_array($all_css_files) && !empty($all_css_files)) {
				foreach ($all_css_files as $css) {
					call_user_func_array('wp_enqueue_style', $css);
				}
			}
		}

		/**
		 * Load plugin admin js
		 * @since 1.0.0
		 */
		public function load_admin_js_files()
		{
			$plugin_version = QIRAAT_CORE_VERSION;
			$all_js_files = array(
				array(
					'handle' => 'qiraat-core-widget',
					'src' => QIRAAT_CORE_ADMIN_ASSETS . '/js/widget.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				),
			);

			$all_js_files = apply_filters('qiraat_admin_js', $all_js_files);
			if (is_array($all_js_files) && !empty($all_js_files)) {
				foreach ($all_js_files as $js) {
					call_user_func_array('wp_enqueue_script', $js);
				}
			}
		}

	} //end class
	if (class_exists('Qiraat_Core_Init')) {
		Qiraat_Core_Init::getInstance();
	}
}
