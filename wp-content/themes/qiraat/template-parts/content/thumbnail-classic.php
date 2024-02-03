<?php
/**
 * Post Thumbnail Functions
 * @package qiraat
 * @since 1.0.0
 */

$qiraat = qiraat();
if (has_post_thumbnail()): ?>
    <div class="thumbnail">
        <?php $qiraat->post_thumbnail('post-thumbnail'); ?>
    </div>
<?php endif; ?>