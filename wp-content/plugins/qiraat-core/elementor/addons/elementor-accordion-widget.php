<?php
/**
 * Elementor Widget
 * @package Qiraat
 * @since 1.0.0
 */

namespace Elementor;
class Qiraat_Accordion_One extends Widget_Base
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
        return 'qiraat-accordion-one-widget';
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
        return esc_html__('Accordion 01', 'qiraat-core');
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
        return 'eicon-editor-list-ul';
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
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'active_package',
            [
                'label' => esc_html__('Active Faq', 'qiraat-core'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    'active' => esc_html__('Active Faq', 'qiraat-core'),
                    '' => esc_html__('Default Charge', 'qiraat-core'),
                ],
            ]
        );
        $repeater->add_control(
            'title', [
                'label' => esc_html__('Title', 'qiraat-core'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter title.', 'qiraat-core'),
                'default' => esc_html__('1. Is qiraat Luxury and comfort?', 'qiraat-core')
            ]
        );
        $repeater->add_control(
            'content_title', [
                'label' => esc_html__('Content Title', 'qiraat-core'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter title.', 'qiraat-core'),
                'default' => esc_html__('great for:', 'qiraat-core')
            ]
        );
        $repeater->add_control(
            'image', [
                'label' => esc_html__('Image', 'qiraat-core'),
                'type' => Controls_Manager::GALLERY,
                'show_label' => false,
                'condition' => ['accordion_style' => 'with-image']
            ]
        );
        $repeater->add_control(
            'accordion-list-item',
            [
                'default' => esc_html__('Specialized bilingual guide', 'qiraat-core'),
                'label' => esc_html__('Accordion List', 'qiraat-core'),
                'type' => Controls_Manager::TEXTAREA,
                'condition' => ['accordion_style' => 'with-image'],
                'description' => esc_html__('Press Enter For New Item', 'qiraat-core')
            ]
        );
        $repeater->add_control(
            'description', [
                'label' => esc_html__('Description', 'qiraat-core'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter text.', 'qiraat-core'),
                'default' => esc_html__('Duis aute irure dolor reprehenderit in voluptate velit essle cillum dolore eu fugiat nulla pariatur. Excepteur sint ocaec at cupdatat proident suntin culpa qui officia deserunt mol anim id esa laborum perspiciat.', 'qiraat-core')
            ]
        );
        $this->add_control('accordion_items', [
            'label' => esc_html__('Accordion Item', 'qiraat-core'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'title' => esc_html__('1. Is qiraat Luxury and comfort?', 'qiraat-core'),
                    'description' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco lab oris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.', 'qiraat-core'),
                ]
            ],

        ]);
        $this->end_controls_section();


        /*  tab styling tabs start */
        $this->start_controls_section(
            'tab_settings_section',
            [
                'label' => esc_html__('Tab Settings', 'qiraat-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'tab_style_tabs'
        );

        $this->start_controls_tab(
            'tab_style_normal_tab',
            [
                'label' => __('Expanded Style', 'qiraat-core'),
            ]
        );

        $this->add_control('tab_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Title Color', 'qiraat-core'),
            'selectors' => [
                "{{WRAPPER}} .faq-item .faq-title .title" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('tab_paragraph_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Paragraph Color', 'qiraat-core'),
            'selectors' => [
                "{{WRAPPER}} .faq-item.active .faq-content" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('tab_icon_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Icon Color', 'qiraat-core'),
            'selectors' => [
                "{{WRAPPER}} .faq-item .right-icon::after" => "border-right-color: {{VALUE}}",
                "{{WRAPPER}} .faq-item .right-icon::before" => "border-bottom-color: {{VALUE}}",
            ]
        ]);
        $this->add_control('tab_icon_bg_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Icon Background Color', 'qiraat-core'),
            'selectors' => [
                "{{WRAPPER}} .faq-item .right-icon" => "background-color: {{VALUE}}",
            ]
        ]);
        $this->add_control('tab_background', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Background', 'qiraat-core'),
            'selectors' => [
                "{{WRAPPER}} .faq-item.active" => "background-color: {{VALUE}}",
            ]
        ]);

        $this->add_control('inner_content_background', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Inner Content Background', 'qiraat-core'),
            'selectors' => [
                "{{WRAPPER}} .faq-item .faq-content .faq-list-area" => "background-color: {{VALUE}}",
            ]
        ]);
        $this->add_control('inner_content_title_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Inner Content List Title Color', 'qiraat-core'),
            'selectors' => [
                "{{WRAPPER}} .faq-item .faq-content .faq-list li" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('inner_content_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Inner Content List Color', 'qiraat-core'),
            'selectors' => [
                "{{WRAPPER}} .faq-item .faq-content .faq-list-area .title" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('inner_content_bullet_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Inner Content List Bullet Color', 'qiraat-core'),
            'selectors' => [
                "{{WRAPPER}} .faq-item .faq-content .faq-list li::before" => "background-color: {{VALUE}}",
            ]
        ]);
        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_style_hover_tab',
            [
                'label' => esc_html__('Normal', 'qiraat-core'),
            ]
        );

        $this->add_control('tab_hover_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Title Color', 'qiraat-core'),
            'selectors' => [
                "{{WRAPPER}} .faq-item .faq-title .title" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('tab_hover_background', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Background', 'qiraat-core'),
            'selectors' => [
                "{{WRAPPER}} .faq-item" => "background-color: {{VALUE}}",
            ]
        ]);


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
        /*  tab styling tabs end */

        $this->start_controls_section(
            'typography_settings_section',
            [
                'label' => esc_html__('Typography Settings', 'qiraat-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('Title Typography', 'qiraat-core'),
            'name' => 'title_typography',
            'description' => esc_html__('select title typography', 'qiraat-core'),
            'selector' => "{{WRAPPER}} .faq-item .faq-title .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('Paragraph Typography', 'qiraat-core'),
            'name' => 'paragraph_typography',
            'description' => esc_html__('select Paragraph typography', 'qiraat-core'),
            'selector' => "{{WRAPPER}} .faq-item.active .faq-content"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('Feature Typography', 'qiraat-core'),
            'name' => 'feature_list_title_typography',
            'description' => esc_html__('select feature title typography', 'qiraat-core'),
            'selector' => "{{WRAPPER}} .faq-item .faq-content .faq-list-area .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('Feature Typography', 'qiraat-core'),
            'name' => 'feature_list_typography',
            'description' => esc_html__('select feature list typography', 'qiraat-core'),
            'selector' => "{{WRAPPER}} .faq-item .faq-content .faq-list li"
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
        $accordion_items = $settings['accordion_items'];
        $random_number = rand(999, 999999);
        ?>
        <div class="faq-wrapper">
            <div id="accordion-<?php echo esc_attr($random_number); ?>">
                <?php
                foreach ($accordion_items as $item):

                    ?>
                    <div class="faq-item <?php  if ($item['active_package'] === 'active') echo 'active'?>">
                        <h3 class="faq-title"><span class="title">  <?php echo esc_html($item['title']); ?></span><span
                                    class="right-icon"></span></h3>
                        <div class="faq-content">
                            <?php echo esc_html($item['description']); ?>
                            <div class="faq-list-area">
                                <h4 class="title"><?php echo esc_html($item['content_title']); ?></h4>
                                <?php
                                $all_list_items = strlen($item['accordion-list-item']) > 1 ? explode("\n", $item['accordion-list-item']) : [];
                                if (!empty($all_list_items)):
                                    ?>
                                    <ul class="faq-list">
                                        <?php
                                        foreach ($all_list_items as $nested_item) {
                                            printf('<li>%s</li>', $nested_item);
                                        }
                                        ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <div class="faq-inner-thumb-area">
                                <div class="row justify-content-center mb-30-none">
                                    <?php
                                    $all_image = $item['image'];
                                    foreach ($all_image as $image):
                                        ?>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30">
                                            <div class="faq-inner-thumb">
                                                <img src="<?php echo esc_url($image['url']); ?>"
                                                     alt="<?php echo esc_attr('faq-image'); ?>">
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Qiraat_Accordion_One());