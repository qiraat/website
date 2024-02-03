
<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package qiraat
 */

$qiraat = qiraat();
$post_meta = get_post_meta(get_the_ID(), 'qiraat_post_gallery_options', true);
$post_meta_gallery = isset($post_meta['gallery_images']) && !empty($post_meta['gallery_images']) ? $post_meta['gallery_images'] : '';
$post_single_meta = Qiraat_Group_Fields_Value::post_meta('blog_single_post');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-single-content-wrap'); ?>>
    <?php
    if (has_post_thumbnail() || !empty($post_meta_gallery)):
        $get_post_format = get_post_format();
        if ('video' == $get_post_format || 'gallery' == $get_post_format) {
            get_template_part('template-parts/content/thumbnail', $get_post_format);
        } else {
            get_template_part('template-parts/content/thumbnail');
        }
    endif;
    ?>
    <div class="entry-content">
        <?php if ('post' == get_post_type()): ?>
            <?php if ($post_single_meta['posted_category']): ?>
                <div class="cats"><?php the_category(' ') ?></div>
            <?php endif; ?>
            <ul class="post-meta">
                <?php if ($post_single_meta['posted_by']): ?>
                    <li><?php $qiraat->posted_by(); ?></li>
                <?php endif; ?>
                <li>
                    <?php
                    $qiraat->posted_on();
                    ?>
                </li>
                <li>
                    <?php
                    $qiraat->comment_count();
                    ?>
                </li>
            </ul>
        <?php endif;
        the_content();
        $qiraat->link_pages();
        ?>
    </div>
    <?php if ('post' == get_post_type() && ((has_tag() && $post_single_meta['posted_tag']) || (shortcode_exists('qiraat_post_share') && $post_single_meta['posted_share']))): ?>
        <div class="blog-details-footer">
            <?php if (has_tag() && $post_single_meta['posted_tag']): ?>
                <div class="left">
                    <h3 class="title"><?php echo esc_html__('Tags:', 'qiraat') ?></h3>
                    <?php $qiraat->posted_tag(); ?>
                </div>
            <?php endif; ?>
            <?php if (shortcode_exists('qiraat_post_share') && $post_single_meta['posted_share']) : ?>
                <div class="right">
                    <h3 class="title"><?php echo esc_html__('Social Share:', 'qiraat') ?></h3>
                    <?php
                    if (shortcode_exists('qiraat_post_share') && $post_single_meta['posted_share']) {
                        echo do_shortcode('[qiraat_post_share]');
                    }
                    ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif;
    if ($post_single_meta['next_post_nav_btn'] && $qiraat->is_qiraat_core_active()) {
        echo wp_kses($qiraat->post_navigation(), $qiraat->kses_allowed_html('all'));
    }
    if ($qiraat->is_qiraat_core_active()) {
        if ($post_single_meta['get_related_post']) {
            $qiraat->get_related_post([
                'post_type' => 'post',
                'taxonomy' => 'category',
                'exclude_id' => get_the_ID(),
                'posts_per_page' => 2
            ]);
        }
    }
    ?>

</article><!-- #post-<?php the_ID(); ?> -->