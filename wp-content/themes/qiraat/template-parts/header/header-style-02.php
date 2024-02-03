<?php
/**
 * Header Style 02
 * @package qiraat
 * @since 1.0.0
 */
$shortcodes_right_content = cs_get_option('header_three_top_right_info_bar_shortcode');

?>
<div class="header-section header-section-two">
    <div class="header">
        <div class="header-bottom-area">
            <div class="container-fluid">
                <div class="header-menu-content">
                    <nav class="navbar navbar-expand-xl p-0">
                        <?php
                        $header_three_logo = cs_get_option('header_three_logo');
                        if (has_custom_logo() && empty($header_three_logo['id'])) {
                            the_custom_logo();
                        } elseif (!empty($header_three_logo['id'])) {
                            printf('<a class="site-logo custom-logo d-block d-xl-none" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $header_three_logo['url'], $header_three_logo['alt']);
                        } else {
                            printf('<a class="site-title d-block d-xl-none" href="%1$s">%2$s</a>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
                        }
                        ?>
                        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fas fa-bars"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'main-menu-02',
                                'menu_class' => 'navbar-nav main-menu',
                                'container' => 'div',
                                'container_id' => 'qiraat_main_menu'
                            ));
                            ?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>