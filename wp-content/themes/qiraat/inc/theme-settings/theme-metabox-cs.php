<?php
/**
 * Theme Metabox Options
 * @package qiraat
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}

if (class_exists('CSF')) {

    $allowed_html = qiraat()->kses_allowed_html(array('mark'));

    $prefix = 'qiraat';

    /*-------------------------------------
        Post Format Options
    -------------------------------------*/
    CSF::createMetabox($prefix . '_post_video_options', array(
        'title' => esc_html__('Video Post Format Options', 'qiraat'),
        'post_type' => 'post',
        'post_formats' => 'video'
    ));
    CSF::createSection($prefix . '_post_video_options', array(
        'fields' => array(
            array(
                'id' => 'video_url',
                'type' => 'text',
                'title' => esc_html__('Enter Video URL', 'qiraat'),
                'desc' => wp_kses(__('enter <mark>video url</mark> to show in frontend', 'qiraat'), $allowed_html)
            )
        )
    ));
    CSF::createMetabox($prefix . '_post_gallery_options', array(
        'title' => esc_html__('Gallery Post Format Options', 'qiraat'),
        'post_type' => 'post',
        'post_formats' => 'gallery'
    ));
    CSF::createSection($prefix . '_post_gallery_options', array(
        'fields' => array(
            array(
                'id' => 'gallery_images',
                'type' => 'gallery',
                'title' => esc_html__('Select Gallery Photos', 'qiraat'),
                'desc' => wp_kses(__('select <mark>gallery photos</mark> to show in frontend', 'qiraat'), $allowed_html)
            )
        )
    ));

    /*-------------------------------------
      Page Container Options
    -------------------------------------*/
    CSF::createMetabox($prefix . '_page_container_options', array(
        'title' => esc_html__('Page Options', 'qiraat'),
        'post_type' => array('page'),
    ));
    CSF::createSection($prefix . '_page_container_options', array(
        'title' => esc_html__('Layout & Colors', 'qiraat'),
        'icon' => 'fa fa-columns',
        'fields' => Qiraat_Group_Fields::page_layout()
    ));
    CSF::createSection($prefix . '_page_container_options', array(
        'title' => esc_html__('Header Footer & Breadcrumb', 'qiraat'),
        'icon' => 'fa fa-header',
        'fields' => Qiraat_Group_Fields::Page_Container_Options('header_options')
    ));
    CSF::createSection($prefix . '_page_container_options', array(
        'title' => esc_html__('Width & Padding', 'qiraat'),
        'icon' => 'fa fa-file-o',
        'fields' => Qiraat_Group_Fields::Page_Container_Options('container_options')
    ));
    //	Service Meta Box
    CSF::createMetabox($prefix . '_service_options', array(
        'title' => esc_html__('Service Options', 'qiraat'),
        'post_type' => 'service',
    ));
    CSF::createSection($prefix . '_service_options', array(
        'fields' => array(
            array(
                'id' => 'service_icon',
                'type' => 'icon',
                'title' => esc_html__('Icon', 'qiraat'),
                'desc' => wp_kses(__('Select Your Icon', 'qiraat'), $allowed_html)
            )
        )
    ));

    /*-------------------------------------
     Team Options
    -------------------------------------*/
    CSF::createMetabox($prefix . '_team_options', array(
        'title' => esc_html__('Team Options', 'qiraat'),
        'post_type' => array('team'),
        'priority' => 'high'
    ));
    CSF::createSection($prefix . '_team_options', array(
        'title' => esc_html__('Team Icon', 'qiraat'),
        'id' => 'qiraat-team-icon',
        'fields' => array(
            array(
                'id' => 'team_icon',
                'type' => 'icon',
                'desc' => wp_kses(__('Select Your Icon', 'qiraat'), $allowed_html)
            )
        )
    ));
    CSF::createSection($prefix . '_team_options', array(
        'title' => esc_html__('Team Info', 'qiraat'),
        'id' => 'qiraat-info',
        'fields' => array(
            array(
                'id' => 'designation',
                'type' => 'text',
                'title' => esc_html__('Designation', 'qiraat'),
            ),
            array(
                'id' => 'description',
                'type' => 'text',
                'title' => esc_html__('Description', 'qiraat'),
            ),
            array(
                'id' => 'team-info',
                'type' => 'repeater',
                'title' => esc_html__('Team Info', 'qiraat'),
                'fields' => array(

                    array(
                        'id' => 'title',
                        'type' => 'text',
                        'title' => esc_html__('Title', 'qiraat')
                    ),
                    array(
                        'id' => 'icon',
                        'type' => 'icon',
                        'title' => esc_html__('Icon', 'qiraat')
                    ),

                ),
            ),
        )
    ));
    CSF::createSection($prefix . '_team_options', array(
        'title' => esc_html__('Social Info', 'qiraat'),
        'id' => 'social-info',
        'fields' => array(
            array(
                'id' => 'social-icons',
                'type' => 'repeater',
                'title' => esc_html__('Social Info', 'qiraat'),
                'fields' => array(

                    array(
                        'id' => 'title',
                        'type' => 'text',
                        'title' => esc_html__('Title', 'qiraat')
                    ),
                    array(
                        'id' => 'icon',
                        'type' => 'icon',
                        'title' => esc_html__('Icon', 'qiraat')
                    ),
                    array(
                        'id' => 'url',
                        'type' => 'text',
                        'title' => esc_html__('URL', 'qiraat')
                    ),

                ),
            ),
        )
    ));

    //	Training Meta Box
    CSF::createMetabox($prefix . '_training_options', array(
        'title' => esc_html__('Training Options', 'qiraat'),
        'post_type' => 'training',
    ));

    CSF::createSection($prefix . '_training_options', array(
        'fields' => array(
            array(
                'id' => 'training_icon',
                'default' => 'flaticon-protection',
                'type' => 'icon',
                'title' => esc_html__('Icon', 'qiraat'),
                'desc' => wp_kses(__('Select Your Icon', 'qiraat'), $allowed_html)
            ),
            array(
                'id'      => 'training_icon_color',
                'type'    => 'color',
                'title'   => esc_html__('Color', 'qiraat'),
                'default' => '#FFBE01',
                'desc'   => esc_html__('Set your icon color', 'qiraat'),

            ),
            array(
                'id' => 'training_subtitle',
                'type' => 'text',
                'title' => esc_html__('Training Subtitle', 'qiraat'),
                'default' => esc_html__('Embraer P-300E Specification ', 'qiraat'),
            ),
            array(
                'id' => 'training_price_option',
                'type' => 'text',
                'title' => esc_html__('Training Price', 'qiraat'),
                'default' => esc_html__('$50.00 ', 'qiraat'),
            )
        )
    ));

    //	Event Meta Box
    CSF::createMetabox($prefix . '_event_options', array(
        'title' => esc_html__('Event Options', 'qiraat'),
        'post_type' => 'event',
    ));
    CSF::createSection($prefix . '_event_options', array(
        'fields' => array(
            array(
                'id' => 'event_icon',
                'default' => 'flaticon-protection',
                'type' => 'icon',
                'title' => esc_html__('Icon', 'qiraat'),
                'desc' => wp_kses(__('Select Your Icon', 'qiraat'), $allowed_html)
            ),
            array(
                'id' => 'event_date_option',
                'type' => 'text',
                'title' => esc_html__('Event Date', 'qiraat'),
                'default' => esc_html__('21', 'qiraat'),
            ),
            array(
                'id' => 'event_month_option',
                'type' => 'text',
                'title' => esc_html__('Event Month', 'qiraat'),
                'default' => esc_html__('Feb', 'qiraat'),
            ),
            array(
                'id' => 'event_year_option',
                'type' => 'text',
                'title' => esc_html__('Event Year', 'qiraat'),
                'default' => esc_html__('2023', 'qiraat'),
            ),
            array(
                'id' => 'event_time_option',
                'type' => 'text',
                'title' => esc_html__('Event Time', 'qiraat'),
                'default' => esc_html__('10:00am', 'qiraat'),
            ),
            array(
                'id' => 'event_location_option',
                'type' => 'text',
                'title' => esc_html__('Event Location', 'qiraat'),
                'default' => esc_html__('684 Ann St. FL 34608', 'qiraat'),
            )
        )
    ));

    //	Courses Meta Box
    CSF::createMetabox($prefix . '_courses_options', array(
        'title' => esc_html__('Courses Options', 'qiraat'),
        'post_type' => 'courses',
    ));

    CSF::createSection($prefix . '_courses_options', array(
        'title' => esc_html__('Social Info', 'qiraat'),
        'id' => 'social-info',
        'fields' => array(
            array(
                'id' => 'course_start_date_option',
                'type' => 'text',
                'title' => esc_html__('Start From', 'qiraat'),
                'default' => esc_html__('Thursday, Nov 4, 2022', 'qiraat'),
            ),
            array(
                'id' => 'study-option',
                'type' => 'repeater',
                'title' => esc_html__('Study Options', 'qiraat'),
                'fields' => array(

                    array(
                        'id' => 'qualification',
                        'type' => 'text',
                        'title' => esc_html__('Qualification', 'qiraat'),
                        'default' => esc_html__('Bachelor of Aviation (Hons)', 'qiraat'),
                    ),
                    array(
                        'id' => 'length',
                        'type' => 'text',
                        'title' => esc_html__('Length', 'qiraat'),
                        'default' => esc_html__('9 months full time', 'qiraat'),
                    ),
                    array(
                        'id' => 'code',
                        'type' => 'text',
                        'title' => esc_html__('Code', 'qiraat'),
                        'default' => esc_html__('ba1x', 'qiraat'),
                    ),
                ),
            ),
            array(
                'id' => 'course_module_option',
                'type' => 'text',
                'title' => esc_html__('Course Module Title', 'qiraat'),
                'default' => esc_html__('Download full course Module', 'qiraat'),
            ),
            array(
                'id' => 'course_module_button_title',
                'type' => 'text',
                'title' => esc_html__('Course Module Button Title', 'qiraat'),
                'default' => esc_html__('Download', 'qiraat'),
            ),
            array(
                'id' => 'course_module_button_url',
                'type' => 'text',
                'title' => esc_html__('Course Module Button URL', 'qiraat'),
                'default' => esc_html__('#', 'qiraat'),
            ),
        )
    ));
}//endif