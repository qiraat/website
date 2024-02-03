<?php 
/**
 * Searchform Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package qiraat
 */
 ?>

<form action="<?php echo esc_url(home_url('/'))?>" class="search-form">
    <div class="form-group">
        <input type="text" name="s" class="form-control" placeholder="<?php echo esc_attr__('Search','qiraat');?>">
    </div>
    <button class="submit-btn" type="submit"><i class="fa fa-search"></i></button>
</form>