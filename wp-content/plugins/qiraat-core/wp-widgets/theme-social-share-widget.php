<?php
/**
 * Theme Social Share Widget
 * @package Qiraat
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {


    // Create a About Widget
    CSF::createWidget('qiraat_social_share_widget', array(
        'title' => esc_html__('Qiraat: Social Share', 'qiraat-core'),
        'classname' => 'qiraat-social-share-about',
        'description' => esc_html__('Display Social Share widget', 'qiraat-core'),
        'fields' => array(
            array(
                'id' => 'heading',
                'type' => 'text',
                'title' => esc_html__('Enter Your Header Title', 'qiraat-core'),
                'default' => esc_html__('Never Miss News', 'qiraat-core')
            ),
            array(
                'id' => 'qiraat-social-icon-repeater',
                'type' => 'repeater',
                'title' => esc_html__('Social Icon', 'qiraat-core'),
                'fields' => array(
                    array(
                        'id' => 'qiraat-social-icon',
                        'type' => 'icon',
                        'title' => esc_html__('Icon', 'qiraat-core'),
                        'default' => 'fab fa-facebook'
                    ),
                    array(
                        'id' => 'qiraat-social-text',
                        'type' => 'text',
                        'title' => esc_html__('Enter Your Ulr', 'qiraat-core'),
                        'default' => '#'
                    ),
                ),
            ),
        )
    ));


    if (!function_exists('qiraat_social_share_widget')) {
        function qiraat_social_share_widget($args, $instance)
        {

            echo $args['before_widget'];
            

            $heading_title = $instance['heading'] ?? '';
            $socialIcon = is_array($instance['qiraat-social-icon-repeater']) && !empty($instance['qiraat-social-icon-repeater']) ? $instance['qiraat-social-icon-repeater'] : [];


            ?>
            <div class="social-share-widget">
                <h4 class="widget-headline"><?php echo esc_html($heading_title); ?></h4>
                <ul class="social-icon style-03">
                    <?php
                    foreach ($socialIcon as $icon) {
                        printf('<li><a href="%2$s"><i class="%1$s"></i></a></li>', esc_html($icon['qiraat-social-icon']), esc_url($icon['qiraat-social-text']));
                    };
                    ?>
                </ul>
            </div>

            <?php

            echo $args['after_widget'];

        }
    }

}

?>