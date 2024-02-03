<?php
/**
 * Theme Options
 * @package qiraat
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {

    $allowed_html = qiraat()->kses_allowed_html(array('mark'));
    $prefix = 'qiraat';
    // Create options
    CSF::createOptions($prefix . '_theme_options', array(
        'menu_title' => esc_html__('Theme Options', 'qiraat'),
        'menu_slug' => 'qiraat_theme_options',
        'menu_parent' => 'qiraat_theme_options',
        'menu_type' => 'submenu',
        'footer_credit' => ' ',
        'menu_icon' => 'fa fa-filter',
        'show_footer' => false,
        'enqueue_webfont' => false,
        'show_search' => true,
        'show_reset_all' => true,
        'show_reset_section' => true,
        'show_all_options' => false,
        'theme' => 'dark',
        'framework_title' => qiraat()->get_theme_info('name')
    ));

    /*-------------------------------------------------------
        ** General  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('General', 'qiraat'),
        'id' => 'general_options',
        'icon' => 'fas fa-cogs',
    ));
    /* Preloader */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Preloader & SVG Enable', 'qiraat'),
        'id' => 'theme_general_preloader_options',
        'icon' => 'fa fa-spinner',
        'parent' => 'general_options',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => esc_html__( 'Preloader ON / OFF', 'qiraat' ),
            ),
            array(
                'id'      => 'enable_preloader',
                'type'    => 'switcher',
                'title'   => esc_html__( 'Enable Preloader', 'qiraat' ),
                'desc'    => esc_html__( 'If you want to enable or disable preloader you can set ( YES / NO )', 'qiraat' ),
                'default' => true,
            ),
            array(
                'id'         => 'enable_custom_preloader',
                'type'       => 'switcher',
                'title'      => esc_html__( 'Add Custom Preloader ?', 'qiraat' ),
                'desc'       => esc_html__( 'If you want to add custom image for preloader you can set ( YES / NO )', 'qiraat' ),
                'default'    => false,
                'dependency' => array( 'enable_preloader', '==', 'true' ),
            ),
            array(
                'id'         => 'add_preloader_image',
                'type'       => 'media',
                'title'      => esc_html__( 'Add Custom Image', 'qiraat' ),
                'desc'       => esc_html__( 'Add the custom image for preloader.', 'qiraat' ),
                'library'    => 'image',
                'dependency' => array( 'enable_preloader|enable_custom_preloader', '==|', 'true|true' ),
            ),
            array(
                'id'      => 'preloader_style',
                'type'    => 'image_select',
                'class'   => 'preloader_section',
                'title'   => esc_html__( 'Select Preloader Style', 'qiraat' ),
                'desc'    => esc_html__( 'You can set specific preloader style in every page form here.', 'qiraat' ),
                'options' => array(
                    'style_3'  => QIRAAT_THEME_SETTINGS_IMAGES .'/loader/loader_3.png',
                    'style_4'  => QIRAAT_THEME_SETTINGS_IMAGES .'/loader/loader_horizontal.gif',
                    'style_5'  => QIRAAT_THEME_SETTINGS_IMAGES .'/loader/loader_spinner.gif',
                    'style_6'  => QIRAAT_THEME_SETTINGS_IMAGES .'/loader/loader_spinner.svg',
                    'style_7'  => QIRAAT_THEME_SETTINGS_IMAGES .'/loader/loader_square_circle.gif',
                    'style_8'  => QIRAAT_THEME_SETTINGS_IMAGES .'/loader/loader_wave.gif',
                    'style_9'  => QIRAAT_THEME_SETTINGS_IMAGES .'/loader/loeader_square.gif',
                    'style_10' => QIRAAT_THEME_SETTINGS_IMAGES .'/loader/wave_preloader.svg',
                    'style_11' => QIRAAT_THEME_SETTINGS_IMAGES .'/loader/ajax_loader.svg',
                    'style_12' => QIRAAT_THEME_SETTINGS_IMAGES .'/loader/audio.svg',
                    'style_13' => QIRAAT_THEME_SETTINGS_IMAGES .'/loader/ball_triangle.svg',
                    'style_14' => QIRAAT_THEME_SETTINGS_IMAGES .'/loader/bars.svg',
                    'style_15' => QIRAAT_THEME_SETTINGS_IMAGES .'/loader/circle_pulse_rings.svg',
                    'style_16' => QIRAAT_THEME_SETTINGS_IMAGES .'/loader/circle_tail_spin.svg',
                    'style_17' => QIRAAT_THEME_SETTINGS_IMAGES .'/loader/circles.svg',
                    'style_18' => QIRAAT_THEME_SETTINGS_IMAGES .'/loader/flip_circle.svg',
                    'style_19' => QIRAAT_THEME_SETTINGS_IMAGES .'/loader/grid.svg',
                    'style_20' => QIRAAT_THEME_SETTINGS_IMAGES .'/loader/heart.svg',
                    'style_21' => QIRAAT_THEME_SETTINGS_IMAGES .'/loader/hearts_group.svg',
                    'style_22' => QIRAAT_THEME_SETTINGS_IMAGES .'/loader/qiraat.svg',
                    'style_23' => QIRAAT_THEME_SETTINGS_IMAGES .'/loader/road_cross.svg',
                    'style_24' => QIRAAT_THEME_SETTINGS_IMAGES .'/loader/round_circle.svg',
                    'style_25' => QIRAAT_THEME_SETTINGS_IMAGES .'/loader/round_pulse.svg',
                    'style_26' => QIRAAT_THEME_SETTINGS_IMAGES .'/loader/simple_spainer.svg',
                    'style_27' => QIRAAT_THEME_SETTINGS_IMAGES .'/loader/spinner.svg',
                    'style_28' => QIRAAT_THEME_SETTINGS_IMAGES .'/loader/spinning_circles.svg',
                    'style_29' => QIRAAT_THEME_SETTINGS_IMAGES .'/loader/three_dots.svg',
                ),
                'default'    => 'style_22',
                'dependency' => array( 'enable_preloader|enable_custom_preloader', '==|==', 'true|false' ),
            ),
            array(
                'type'       => 'subheading',
                'content'    => esc_html__( 'Preloader Background & Color', 'qiraat' ),
                'dependency' => array( 'enable_preloader', '==', 'true' ),
            ),
            array(
                'id'                    => 'preloader_bg',
                'type'                  => 'background',
                'title'                 => esc_html__( 'Preloader Background', 'qiraat' ),
                'subtitle'              => esc_html__( 'Set the preloader background.', 'qiraat' ),
                'desc'                  => esc_html__( 'Set the preloader background color, image, transparent image and gradient color. If you set only first color field it will be a simple solid color for background and if set 2nd color field too it will be set a gradient color and if you set a image it will be set a background image.', 'qiraat' ),
                'background_image'      => true,
                'background_position'   => true,
                'background_repeat'     => true,
                'background_attachment' => true,
                'background_size'       => true,
                'background_gradient'   => true,
                'background_origin'     => true,
                'background_clip'       => true,
                'background_blend_mode' => true,
                'output'                => '.preloader',
                'default'               => array(
                    'background-color'              => '#ffffff',
                    'background-size'               => 'cover',
                    'background-position'           => 'center center',
                    'background-repeat'             => 'repeat',
                ),
                'dependency' => array( 'enable_preloader', '==', 'true' ),
            ),
            array(
                'id'         => 'preloader_text_color',
                'type'       => 'color',
                'title'      => esc_html__( 'Preloader Text Color', 'qiraat' ),
                'desc'       => esc_html__( 'Set the preloader text color', 'qiraat' ),
                'default'    => '#438FF9',
                'output'     => array( '.qiraat-preeloader','.preloader-spinner' ),
                'dependency' => array( 'enable_preloader', '==', 'true' ),
            ),
            array(
                'id' => 'enable_svg_upload',
                'type' => 'switcher',
                'title' => esc_html__('Enable Svg Upload ?', 'qiraat'),
                'desc' => esc_html__('If you want to enable or disable svg upload you can set ( YES / NO )', 'qiraat'),
                'default' => false,
            ),
        )
    ));

    /*-------------------------------------------------------
           ** Typography  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'typography',
        'title' => esc_html__('Typography', 'qiraat'),
        'icon' => 'fas fa-text-height',
        'parent' => 'general_options',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Body Font Options', 'qiraat') . '</h3>',
            ),
            array(
                'type' => 'typography',
                'title' => esc_html__('Typography', 'qiraat'),
                'id' => '_body_font',
                'default' => array(
                    'font-family' => 'Poppins',
                    'font-size' => '16',
                    'line-height' => '26',
                    'unit' => 'px',
                    'type' => 'google',
                ),
                'color' => false,
                'subset' => false,
                'text_align' => false,
                'text_transform' => false,
                'letter_spacing' => false,
                'line_height' => false,
                'desc' => wp_kses(__('you can set <mark>font</mark> for all html tags (if not use different heading font)', 'qiraat'), $allowed_html),
            ),
            array(
                'id' => 'body_font_variant',
                'type' => 'select',
                'title' => esc_html__('Load Font Variant', 'qiraat'),
                'multiple' => true,
                'chosen' => true,
                'options' => array(
                    '300' => esc_html__('Light 300', 'qiraat'),
                    '400' => esc_html__('Regular 400', 'qiraat'),
                    '500' => esc_html__('Medium 500', 'qiraat'),
                    '600' => esc_html__('Semi Bold 600', 'qiraat'),
                    '700' => esc_html__('Bold 700', 'qiraat'),
                    '800' => esc_html__('Extra Bold 800', 'qiraat'),
                ),
                'default' => array('400', '500', '700')
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Heading Font Options', 'qiraat') . '</h3>',
            ),
            array(
                'type' => 'switcher',
                'id' => 'heading_font_enable',
                'title' => esc_html__('Heading Font', 'qiraat'),
                'desc' => wp_kses(__('you can set <mark>yes</mark> to select different heading font', 'qiraat'), $allowed_html),
                'default' => true
            ),
            array(
                'type' => 'typography',
                'title' => esc_html__('Typography', 'qiraat'),
                'id' => 'heading_font',
                'default' => array(
                    'font-family' => 'Paytone One',
                    'type' => 'google',
                ),
                'color' => false,
                'subset' => false,
                'text_align' => false,
                'text_transform' => false,
                'letter_spacing' => false,
                'font_size' => false,
                'line_height' => false,
                'desc' => wp_kses(__('you can set <mark>font</mark> for  for heading tag .eg: h1,h2mh3,h4,h5,h6', 'qiraat'), $allowed_html),
                'dependency' => array('heading_font_enable', '==', 'true')
            ),
            array(
                'id' => 'heading_font_variant',
                'type' => 'select',
                'title' => esc_html__('Load Font Variant', 'qiraat'),
                'multiple' => true,
                'chosen' => true,
                'options' => array(
                    '300' => esc_html__('Light 300', 'qiraat'),
                    '400' => esc_html__('Regular 400', 'qiraat'),
                    '500' => esc_html__('Medium 500', 'qiraat'),
                    '600' => esc_html__('Semi Bold 600', 'qiraat'),
                    '700' => esc_html__('Bold 700', 'qiraat'),
                    '800' => esc_html__('Extra Bold 800', 'qiraat'),
                ),
                'default' => array('400', '500', '600', '700', '800'),
                'dependency' => array('heading_font_enable', '==', 'true')
            ),
        )
    ));

    /* Preloader */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Back To Top', 'qiraat'),
        'id' => 'theme_general_back_top_options',
        'icon' => 'fa fa-arrow-up',
        'parent' => 'general_options',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Back Top Options', 'qiraat') . '</h3>'
            ),
            array(
                'id' => 'back_top_enable',
                'title' => esc_html__('Back Top', 'qiraat'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide back to top', 'qiraat'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'back_top_icon',
                'title' => esc_html__('Back Top Icon', 'qiraat'),
                'type' => 'icon',
                'default' => 'fa fa-angle-up',
                'desc' => wp_kses(__('you can set <mark>icon</mark> for back to top.', 'qiraat'), $allowed_html),
                'dependency' => array('back_top_enable', '==', 'true')
            ),
        )
    ));

    /*----------------------------------
        Header & Footer Style
    -----------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Set Header & Footer Type', 'qiraat'),
        'id' => 'header_footer_style_options',
        'icon' => 'eicon-banner',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => esc_html__('Global Header Style', 'qiraat'),
            ),
            array(
                'id' => 'navbar_type',
                'title' => esc_html__('Navbar Type', 'qiraat'),
                'type' => 'image_select',
                'options' => array(
                    '' => QIRAAT_THEME_SETTINGS_IMAGES . '/header/01.png'
                ),
                'default' => '',
                'desc' => wp_kses(__('you can set <mark>navbar type</mark> it will show in every page except you select specific navbar type form page settings.', 'qiraat'), $allowed_html),
            ),
            array(
                'type' => 'subheading',
                'content' => esc_html__('Global Footer Style', 'qiraat'),
            ),
            array(
                'id' => 'footer_type',
                'title' => esc_html__('Footer Type', 'qiraat'),
                'type' => 'image_select',
                'options' => array(
                    '' => QIRAAT_THEME_SETTINGS_IMAGES . '/footer/01.png'
                ),
                'default' => '',
                'desc' => wp_kses(__('you can set <mark>footer type</mark> it will show in every page except you select specific navbar type form page settings.', 'qiraat'), $allowed_html),
            ),
        )
    ));

    /*-------------------------------------------------------
       ** Entire Site Header  Options
   --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'headers_settings',
        'title' => esc_html__('Headers', 'qiraat'),
        'icon' => 'fa fa-home'
    ));
    /* Header Style 01 */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Header One', 'qiraat'),
        'id' => 'theme_header_one_options',
        'icon' => 'fa fa-image',
        'parent' => 'headers_settings',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Logo Options', 'qiraat') . '</h3>'
            ),
            array(
                'id' => 'header_one_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'qiraat'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'qiraat'), $allowed_html),
            ),
            array(
                'id' => 'header_navbar_button',
                'type' => 'switcher',
                'title' => esc_html__('Info Button', 'qiraat'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar button of header two', 'qiraat'), $allowed_html),
            ),
            array(
                'id' => 'header_navbar_title',
                'type' => 'text',
                'title' => esc_html__('Button Title', 'qiraat'),
                'default' => esc_html__('Book Now', 'qiraat'),
                'dependency' => array('header_navbar_button', '==', 'true')
            ),
            array(
                'id' => 'header_navbar_url',
                'type' => 'text',
                'title' => esc_html__('Button URL', 'qiraat'),
                'default' => '#',
                'dependency' => array('header_navbar_button', '==', 'true')
            ),
        )
    ));
    /* Breadcrumb */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Breadcrumb', 'qiraat'),
        'id' => 'breadcrumb_options',
        'icon' => ' eicon-product-breadcrumbs',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Breadcrumb Stock Title Options', 'qiraat') . '</h3>'
            ),
            array(
                'id' => 'breadcrumb_stock_title',
                'type' => 'text',
                'title' => esc_html__('Chang Breadcrumb Stock Title', 'qiraat'),
                'default' => esc_html__('QIRAAT', 'qiraat'),
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Breadcrumb Options', 'qiraat') . '</h3>'
            ),
            array(
                'id' => 'breadcrumb_enable',
                'title' => esc_html__('Breadcrumb', 'qiraat'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide breadcrumb', 'qiraat'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'breadcrumb_bg',
                'title' => esc_html__('Background Image', 'qiraat'),
                'type' => 'background',
                'desc' => wp_kses(__('you can set <mark>background</mark> for breadcrumb', 'qiraat'), $allowed_html),
                'default' => array(
                    'background-size' => 'cover',
                    'background-position' => 'center bottom',
                    'background-repeat' => 'no-repeat',
                ),
                'background_color' => false,
                'dependency' => array('breadcrumb_enable', '==', 'true')
            ),
            array(
                'id' => 'breadcrumb_bg_color',
                'title' => esc_html__('Breadcrumb Background Color', 'qiraat'),
                'type' => 'color',
                'default' => 'rgba(232,0,0, 0.6);',
                'desc' => wp_kses(__('you can set <mark>overlay color</mark> for Breadcrumb background image', 'qiraat'), $allowed_html),
                'dependency' => array('breadcrumb_enable', '==', 'true')
            ),
        )
    ));


    /*-------------------------------------------------------
           ** Footer  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Footer', 'qiraat'),
        'id' => 'footer_options',
        'icon' => ' eicon-footer',

    ));
    CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'footer_options',
        'id' => 'footer_general_options',
        'title' => esc_html__('Footer One', 'qiraat'),
        'icon' => 'fa fa-list-ul',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Settings One', 'qiraat') . '</h3>'
            ),
            array(
                'id' => 'footer_spacing',
                'title' => esc_html__('Footer Spacing', 'qiraat'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to set footer spacing', 'qiraat'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'footer_top_spacing',
                'title' => esc_html__('Footer Top Spacing', 'qiraat'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>padding</mark> for footer top', 'qiraat'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 100,
                'dependency' => array('footer_spacing', '==', 'true')
            ),
            array(
                'id' => 'footer_bottom_spacing',
                'title' => esc_html__('Footer Bottom Spacing', 'qiraat'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>padding</mark> for footer bottom', 'qiraat'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 65,
                'dependency' => array('footer_spacing', '==', 'true')
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Copyright Area Options', 'qiraat') . '</h3>'
            ),
            array(
                'id' => 'copyright_area_spacing',
                'title' => esc_html__('Copyright Area Spacing', 'qiraat'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to set copyright area spacing', 'qiraat'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'copyright_text',
                'title' => esc_html__('Copyright Area Text', 'qiraat'),
                'type' => 'textarea',
                'desc' => wp_kses(__('use  <mark>{copy}</mark> for copyright symbol, use <mark>{year}</mark> for current year, ', 'qiraat'), $allowed_html)
            ),
            array(
                'id' => 'copyright_area_top_spacing',
                'title' => esc_html__('Copyright Area Top Spacing', 'qiraat'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>padding</mark> for copyright area top', 'qiraat'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 20,
                'dependency' => array('copyright_area_spacing', '==', 'true')
            ),
            array(
                'id' => 'copyright_area_bottom_spacing',
                'title' => esc_html__('Copyright Area Bottom Spacing', 'qiraat'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>padding</mark> for copyright area bottom', 'qiraat'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 20,
                'dependency' => array('copyright_area_spacing', '==', 'true')
            )
        )
    ));

    /*-------------------------------------------------------
          ** Blog  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'blog_settings',
        'title' => esc_html__('Blog Settings', 'qiraat'),
        'icon' => 'fa fa-book'
    ));
    CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'blog_settings',
        'id' => 'blog_post_options',
        'title' => esc_html__('Blog Post', 'qiraat'),
        'icon' => 'fa fa-list-ul',
        'fields' => Qiraat_Group_Fields::post_meta('blog_post', esc_html__('Blog Page', 'qiraat'))
    ));
    CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'blog_settings',
        'id' => 'blog_single_post_options',
        'title' => esc_html__('Single Post', 'qiraat'),
        'icon' => 'fa fa-list-alt',
        'fields' => Qiraat_Group_Fields::post_meta('blog_single_post', esc_html__('Blog Single Page', 'qiraat'))
    ));



    /*-------------------------------------------------------
          ** Pages & templates Options
   --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'pages_and_template',
        'title' => esc_html__('Pages Settings', 'qiraat'),
        'icon' => 'fa fa-files-o'
    ));
    /*  404 page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => '404_page',
        'title' => esc_html__('404 Page', 'qiraat'),
        'parent' => 'pages_and_template',
        'icon' => 'fa fa-exclamation-triangle',
        'fields' => array(
            array(
                'id' => 'error_bg_switch',
                'title' => esc_html__('404 Image Enable', 'qiraat'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide breadcrumb', 'qiraat'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'error_bg',
                'title' => esc_html__('404 Image', 'qiraat'),
                'type' => 'media',
                'desc' => wp_kses(__('you can set <mark>background</mark> for breadcrumb', 'qiraat'), $allowed_html),
                'dependency' => array('error_bg_switch', '==', 'true')
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('404 Page Options', 'qiraat') . '</h3>',
            ),
            array(
                'id' => '404_bg_color',
                'type' => 'color',
                'title' => esc_html__('Page Background Color', 'qiraat'),
                'default' => '#ffffff'
            ),
            array(
                'id' => '404_title',
                'title' => esc_html__('Title', 'qiraat'),
                'type' => 'text',
                'info' => wp_kses(__('you can change <mark>title</mark> of 404 page', 'qiraat'), $allowed_html),
                'attributes' => array('placeholder' => esc_html__('Sorry! The Page Not Found', 'qiraat'))
            ),
            array(
                'id' => '404_paragraph',
                'title' => esc_html__('Paragraph', 'qiraat'),
                'type' => 'textarea',
                'info' => wp_kses(__('you can change <mark>paragraph</mark> of 404 page', 'qiraat'), $allowed_html),
                'attributes' => array('placeholder' => esc_html__('Oops! The page you are looking for does not exit. it might been moved or deleted.', 'qiraat'))
            ),
            array(
                'id' => '404_button_text',
                'title' => esc_html__('Button Text', 'qiraat'),
                'type' => 'text',
                'info' => wp_kses(__('you can change <mark>button text</mark> of 404 page', 'qiraat'), $allowed_html),
                'attributes' => array('placeholder' => esc_html__('back to home', 'qiraat'))
            ),
            array(
                'id' => '404_spacing_top',
                'title' => esc_html__('Page Spacing Top', 'qiraat'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>Padding Top</mark> for page content area.', 'qiraat'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 120,
            ),
            array(
                'id' => '404_spacing_bottom',
                'title' => esc_html__('Page Spacing Bottom', 'qiraat'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>Padding Bottom</mark> for page content area.', 'qiraat'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 120,
            ),
        )
    ));

    /*  blog page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'blog_page',
        'title' => esc_html__('Blog Page', 'qiraat'),
        'parent' => 'pages_and_template',
        'icon' => 'fa fa-indent',
        'fields' => Qiraat_Group_Fields::page_layout_options(esc_html__('Blog', 'qiraat'), 'blog')
    ));
    /*  blog single page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'blog_single_page',
        'title' => esc_html__('Blog Single Page', 'qiraat'),
        'parent' => 'pages_and_template',
        'icon' => 'fa fa-indent',
        'fields' => Qiraat_Group_Fields::page_layout_options(esc_html__('Blog Single', 'qiraat'), 'blog_single')
    ));
    /*  archive page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'archive_page',
        'title' => esc_html__('Archive Page', 'qiraat'),
        'parent' => 'pages_and_template',
        'icon' => 'fa fa-archive',
        'fields' => Qiraat_Group_Fields::page_layout_options(esc_html__('Archive', 'qiraat'), 'archive')
    ));
    /*  search page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'search_page',
        'title' => esc_html__('Search Page', 'qiraat'),
        'parent' => 'pages_and_template',
        'icon' => 'fa fa-search',
        'fields' => Qiraat_Group_Fields::page_layout_options(esc_html__('Search', 'qiraat'), 'search')
    ));

    /*-------------------------------------------------------
           ** Backup  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'backup',
        'title' => esc_html__('Import / Export', 'qiraat'),
        'icon' => 'eicon-export-kit',
        'fields' => array(
            array(
                'type' => 'notice',
                'style' => 'warning',
                'content' => esc_html__('You can save your current options. Download a Backup and Import.', 'qiraat'),
            ),
            array(
                'type' => 'backup',
                'title' => esc_html__('Backup & Import', 'qiraat')
            )
        )
    ));
}
