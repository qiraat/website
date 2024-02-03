<?php
/**
 * Theme Default Header
 * @package qiraat
 * @since 1.0.0
 */
?>

<nav class="navbar navbar-area navbar-expand-lg navigation-style-01 nav-absolute">
    <div class="container custom-container">
        <div class="responsive-mobile-menu">
            <div class="logo-wrapper">
                <?php
                $header_one_logo = cs_get_option('header_one_logo');
                if (has_custom_logo() && empty($header_one_logo['id'])) {
                    the_custom_logo();
                } elseif (!empty($header_one_logo['id'])) {
                    printf('<a class="site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $header_one_logo['url'], $header_one_logo['alt']);
                } else {
                    printf('<a class="site-title" href="%1$s">%2$s</a>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
                }
                ?>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#qiraat_main_menu"
                    aria-expanded="false" aria-label="<?php esc_attr__('Toggle navigation', 'qiraat') ?>">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div id="qiraat_main_menu" class="collapse navbar-collapse">


        <?php
        wp_nav_menu(array(
            'theme_location' => 'main-menu',
            'menu_class' => 'navbar-nav',
            'container' => 'div',
//            'container_class' => 'collapse navbar-collapse',
//            'container_id' => 'qiraat_main_menu',
        ));
        ?>

        <?php if (qiraat()->is_qiraat_core_active()) : ?>
            <div class="nav-right-content">
                <div class="btn-wrap">
                    <a href="<?php echo esc_url(cs_get_option('header_navbar_url')) ?>"
                       class="boxed-btn"><?php echo esc_html(cs_get_option('header_navbar_title')); ?></a>
                </div>
            </div>
        <?php endif; ?>
        </div>    </div>
</nav>
