<?php
/**
 * Post Meta Functions
 * @package qiraat
 * @since 1.0.0
 */

$qiraat = qiraat();
$post_meta = Qiraat_Group_Fields_Value::post_meta('blog_post');
?>
<div class="post-meta-wrap">
    <ul class="post-meta">
        <?php if ($post_meta['posted_by']): ?>
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
    <?php

    if (shortcode_exists('qiraat_post_share') && $post_meta['posted_share']) {
        echo do_shortcode('[qiraat_post_share]');
    }
    ?>
</div>