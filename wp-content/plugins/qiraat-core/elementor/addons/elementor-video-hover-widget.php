<?php
/**
 * Elementor Widget
 * @package Qiraat
 * @since 1.0.0
 */

namespace Elementor;

class Video_Hover extends Widget_Base
{


    /**
     * Get widget name.
     *
     * Retrieve Elementor widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *

     */

    public function get_name()
    {

        return 'qiraat-video-hover-widget';

    }


    /**
     * Get widget title.
     *
     * Retrieve Elementor widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *

     */

    public function get_title()
    {

        return esc_html__('Video Player', 'qiraat-core');

    }


    public function get_keywords()
    {

        return ['Animation', 'Circle', 'Effect', "ThemeIM", 'Qiraat'];

    }


    /**
     * Get widget icon.
     *
     * Retrieve Elementor widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *

     */

    public function get_icon()
    {

        return 'eicon-circle-o';

    }


    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Elementor widget belongs to.
     *
     * @return array Widget categories.
     * @since 1.0.0
     * @access public
     *

     */

    public function get_categories()
    {

        return ['qiraat_widgets'];

    }


    /**
     * Register Elementor widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */

    protected function register_controls()
    {


        $this->start_controls_section(
            'video_settings_section',
            [
                'label' => esc_html__('General Settings', 'qiraat-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(

            'link',
            [
                'label' => esc_html__('Link', 'qiraat-core'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter url.', 'qiraat-core'),
                'default' => [
                    'url' => ''
                ]
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'qiraat-core'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select Icon.', 'qiraat-core'),
                'default' => [
                    'value' => 'fas fa-play',
                    'library' => 'solid',
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(

            'settings_section',

            [

                'label' => esc_html__('General Settings', 'qiraat-core'),

                'tab' => Controls_Manager::TAB_CONTENT,

            ]

        );


        $this->add_control('shape_bg_color', [

            'label' => esc_html__('Circle Color', 'qiraat-core'),

            'type' => Controls_Manager::COLOR,

            'selectors' => [

                '{{WRAPPER}} .video-play-btn-02' => "background-color:{{VALUE}}"

            ]

        ]);

        $this->add_control('icon_bg_color', [

            'label' => esc_html__('Icon Color', 'qiraat-core'),

            'type' => Controls_Manager::COLOR,

            'selectors' => [

                '{{WRAPPER}} .video-play-btn-02' => "color:{{VALUE}}"

            ]

        ]);

        $this->add_control('border_bg_color', [

            'label' => esc_html__('Icon Border Color', 'qiraat-core'),

            'type' => Controls_Manager::COLOR,

            'selectors' => [

                '{{WRAPPER}} .video-play-btn-02:before' => "border-color:{{VALUE}}"

            ]

        ]);

        $this->add_control(

            'shape-radius',

            [

                'label' => esc_html__('Shape Radius', 'qiraat-core'),

                'type' => Controls_Manager::DIMENSIONS,

                'size_units' => ['px', '%', 'em'],

                'selectors' => [

                    '{{WRAPPER}} .video-play-btn-02' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],

            ]

        );

        $this->add_group_control(

            Group_Control_Border::get_type(),

            [

                'name' => 'shape_border',

                'label' => esc_html__('Shape Border', 'qiraat-core'),

                'selector' => '{{WRAPPER}} .video-play-btn-02:before',

            ]

        );

        $this->add_control(

            'shape_height',

            [

                'label' => esc_html__('Shape Height', 'qiraat-core'),

                'type' => Controls_Manager::SLIDER,

                'size_units' => ['px', '%'],

                'range' => [

                    'px' => [

                        'min' => 0,

                        'max' => 5000,

                        'step' => 5,

                    ],

                    '%' => [

                        'min' => 0,

                        'max' => 100,

                    ],

                ],

                'default' => [

                    'px' => 'px',

                    'size' => 120,

                ],

                'selectors' => [

                    '{{WRAPPER}} .video-play-btn-02' => 'height: {{SIZE}}{{UNIT}};',

                ],

            ]

        );

        $this->add_control(

            'shape_width',

            [

                'label' => esc_html__('Shape Width', 'qiraat-core'),

                'type' => Controls_Manager::SLIDER,

                'size_units' => ['px', '%'],

                'range' => [

                    'px' => [

                        'min' => 0,

                        'max' => 5000,

                        'step' => 5,

                    ],

                    '%' => [

                        'min' => 0,

                        'max' => 100,

                    ],

                ],

                'default' => [

                    'px' => 'px',

                    'size' => 120,

                ],
                'selectors' => [
                    '{{WRAPPER}}  .video-play-btn-02' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();



    }


    /**
     * Render Elementor widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */

    protected function render()
    {

        $settings = $this->get_settings_for_display();

        ?>

        <div class="hover">
            <a <?php echo qiraat_core()->render_elementor_link_attributes($settings['link']) ?> class="video-play-btn-02 mfp-iframe"><?php echo qiraat_core()->render_elementor_icons($settings['icon']) ?></a>
        </div>

        <?php

    }

}


Plugin::instance()->widgets_manager->register_widget_type(new Video_Hover());