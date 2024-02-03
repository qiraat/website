<?php
/**
 * Header Style 01
 * @package qiraat
 * @since 1.0.0
 */

?>
<div class="header-section">
    <div class="header">
        <div class="header-bottom-area">
            <div class="container-fluid">
                <div class="header-menu-content">
                    <nav class="navbar navbar-expand-xl p-0">
                        <?php
                        $header_two_logo = cs_get_option('header_two_logo');
                        if (has_custom_logo() && empty($header_two_logo['id'])) {
                            the_custom_logo();
                        } elseif (!empty($header_two_logo['id'])) {
                            printf('<a class="site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $header_two_logo['url'], $header_two_logo['alt']);
                        } else {
                            printf('<a class="site-title" href="%1$s">%2$s</a>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
                        }
                        ?>
                        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fas fa-bars"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                            <ul class="navbar-nav main-menu mr-auto">
                                <li class="menu_has_children">
                                    <a href="#0">
                                        <div class="toggle-menu">
                                            <div class="toggle-wrapper">
                                                <div class="toggle-bar">
                                                    <div class="toggle">
                                                        <div class="element section--bg"></div>
                                                    </div>
                                                    <div class="toggle">
                                                        <div class="element"></div>
                                                    </div>
                                                </div>
                                                <div class="toggle-bar">
                                                    <div class="toggle">
                                                        <div class="element"></div>
                                                    </div>
                                                    <div class="toggle">
                                                        <div class="element"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php esc_html_e('MENU', 'qiraat'); ?>
                                        </div>
                                    </a>
                                    <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'main-menu',
                                        'menu_class' => 'qiraat-navbar-nav sub-menu',
                                        'container' => 'div',
                                        'container_class' => 'menu-nav navbar-collapse'
                                    ));
                                    ?>
                                </li>
                                <li><a href="<?php echo esc_url(cs_get_option('header_two_training_url')) ?>"><?php echo esc_html(cs_get_option('header_two_training_title')); ?></a></li>
                            </ul>
                            <div class="header-right">
                                <div class="header-links-area">
                                    <?php if (!empty(cs_get_option('header_two_info_item'))) : ?>
                                        <ul class="header-links">
                                            <?php
                                            $header_two_info_item_repeater = !empty(cs_get_option('header_two_info_item_repeater')) ? cs_get_option('header_two_info_item_repeater') : array();
                                            foreach ($header_two_info_item_repeater as $item) :
                                                ?>
                                                <li>
                                                    <h5 class="title"><?php echo esc_html($item['header_two_info_item_title']); ?></h5>
                                                    <div class="content">
                                                        <span class="sub-title"><a href="<?php echo esc_url($item['header_two_info_item_url']); ?>"><?php echo esc_html($item['header_two_info_item_number']); ?></a></span>
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                                <div class="header-action-area">
                                    <div class="header-action">
                                        <a href="<?php echo esc_url(cs_get_option('header_two_navbar_url')) ?>"
                                           class="btn--base"><?php echo esc_html(cs_get_option('header_two_navbar_title')); ?>
                                            <i class="fas fa-arrow-right ml-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>