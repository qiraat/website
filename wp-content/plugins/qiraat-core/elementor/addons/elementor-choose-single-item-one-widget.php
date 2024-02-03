<?php
/**
 * Elementor Widget
 * @package Qiraat
 * @since 1.0.0
 */

namespace Elementor;
class Qiraat_Choose_Single_Item_Widget extends Widget_Base
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
        return 'qiraat-choose-single-item-widget';
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
        return esc_html__('Choose Single Item', 'qiraat-core');
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
        return 'eicon-image';
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
            'settings_section',
            [
                'label' => esc_html__('General Settings', 'qiraat-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'qiraat-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'description' => esc_html__('enter title.', 'qiraat-core'),
                'default' => esc_html__('FREE CONSULTATION', 'qiraat-core')
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'qiraat-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'description' => esc_html__('enter description.', 'qiraat-core'),
                'default' => esc_html__("Fight School has specialized in martial arts since 1986 and has one of the most", 'qiraat-core')
            ]
        );
        $this->add_control(
            'apple-image', [
                'label' => esc_html__('Image', 'qiraat-core'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
            ]
        );
        $this->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'qiraat-core'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter link', 'qiraat-core'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'background_hover_settings_section',
            [
                'label' => esc_html__('Background Hover Image Settings', 'qiraat-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'hover_background',
                'label' => esc_html__('Background Image', 'qiraat-core'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .choose-single-item.bg-image',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'content_styling_section',
            [
                'label' => esc_html__('Content Styling', 'qiraat-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'style_tabs'
        );

        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__('Normal', 'qiraat-core'),
            ]
        );
        $this->add_control(
            'item_padding',
            [
                'label' => esc_html__('Padding', 'qiraat-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .feature-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => esc_html__('Border', 'qiraat-core'),
                'selector' => '{{WRAPPER}} .feature-item',
            ]
        );
        $this->add_control(
            'background_border_radius',
            [
                'label' => esc_html__('Box Border Radius', 'qiraat-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .feature-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background_color',
                'label' => esc_html__('Background Image', 'qiraat-core'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .feature-item',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => esc_html__('Box Shadow', 'qiraat-core'),
                'selector' => '{{WRAPPER}} .feature-item',
            ]
        );
        $this->add_control('normal_number_color', [
            'label' => esc_html__('Number Color', 'qiraat-core'),
            'type' => Controls_Manager::COLOR,
            'condition' => array('number_switch' => 'yes'),
            'selectors' => [
                "{{WRAPPER}} .feature-number span" => "color: {{VALUE}};"
            ]
        ]);
        $this->add_control('normal_icon_color', [
            'label' => esc_html__('Icon Color', 'qiraat-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .feature-icon" => "color: {{VALUE}};"
            ]
        ]);
        $this->add_control('normal_icon_border_color', [
            'label' => esc_html__('Icon Border Bottom Color', 'qiraat-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .feature-content::before" => "background-color: {{VALUE}};"
            ]
        ]);
        $this->add_control('normal_title_color', [
            'label' => esc_html__('Title Color', 'qiraat-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .feature-content .title" => "color: {{VALUE}};"
            ]
        ]);
        $this->add_control('normal_description_color', [
            'label' => esc_html__('Description Color', 'qiraat-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .feature-content p" => "color: {{VALUE}};"
            ]
        ]);

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__('Hover', 'qiraat-core'),
            ]
        );
        $this->add_control('hover_title_color', [
            'label' => esc_html__('Title Color', 'qiraat-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .feature-content:hover .title" => "color: {{VALUE}};"
            ]
        ]);
        $this->add_control('hover_icon_color', [
            'label' => esc_html__('Icon Color', 'qiraat-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .feature-item:hover .feature-icon" => "color: {{VALUE}};"
            ]
        ]);
        $this->add_control('hover_normal_number_color', [
            'label' => esc_html__('Number Color', 'qiraat-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .feature-item:hover .feature-number span" => "color: {{VALUE}};"
            ]
        ]);
        $this->add_control('hover_description_color', [
            'label' => esc_html__('Description Color', 'qiraat-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .feature-content:hover p" => "color: {{VALUE}};"
            ]
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'typography_settings_section',
            [
                'label' => esc_html__('Typography Settings', 'qiraat-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'title_typography',
            'label' => esc_html__('Title Typography', 'qiraat-core'),
            'selector' => "{{WRAPPER}} .feature-content .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'sub_title_typography',
            'label' => esc_html__('Number Typography', 'qiraat-core'),
            'selector' => "{{WRAPPER}} .feature-number span"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'description_typography',
            'label' => esc_html__('Description Typography', 'qiraat-core'),
            'selector' => "{{WRAPPER}} .feature-content p"
        ]);

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
        $this->add_render_attribute('image_box_link', 'class', '');
        $apple_img_id = $settings['apple-image']['id'] ?? '';
        $apple_image_url = !empty($apple_img_id) ? wp_get_attachment_image_src($apple_img_id, 'full', false)[0] : '';
        $apple_image_alt = get_post_meta($apple_img_id, '_wp_attachment_image_alt', true);

        $google_img_id = $settings['google-image']['id'] ?? '';
        $google_image_url = !empty($google_img_id) ? wp_get_attachment_image_src($google_img_id, 'full', false)[0] : '';
        $google_image_alt = get_post_meta($google_img_id, '_wp_attachment_image_alt', true);
        if (!empty($settings['link']['url'])) {
            $this->add_link_attributes('image_box_link', $settings['link']);
        }
        ?>
        <div class="feature-item">
            <div class="feature-content">
                <a <?php echo $this->get_render_attribute_string('image_box_link'); ?>><h4
                            class="title"><?php echo esc_html($settings['title']) ?></h4>
                </a>
                <?php
                printf('<img src="%1$s" alt="%2$s">', esc_url($apple_image_url), esc_attr($apple_image_alt));
                printf('<img class="style-01" src="%1$s" alt="%2$s">', esc_url($google_image_url), esc_attr($google_image_alt));

                ?>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Qiraat_Choose_Single_Item_Widget());