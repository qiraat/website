<?php
/**
 * Theme Footer Widget Template
 * @package qiraat
 * @since 1.0.0
 */

if (!is_active_sidebar('footer-widget')){
	return;
}
?>
<div class="footer--top padding-top-80 padding-bottom-65">
	<div class="custom-container container">
		<div class="row">
			<?php dynamic_sidebar('footer-widget');?>
		</div>
	</div>
</div>