<?php
/**
 * Theme Excerpt
 * @package qiraat
 * @since 1.0.0
 */

if (!defined('ABSPATH')){
    exit(); //exit if access it directly
}

if (!class_exists('Qiraat_Excerpt')):
class Qiraat_Excerpt {

    public static $length = 55;
    public static $types = array(
      'short' => 25,
      'regular' => 55,
      'long' => 100,
      'promo'=>15
    );

    public static $more = true;

    /**
    * Sets the length for the excerpt,
    * then it adds the WP filter
    * And automatically calls the_excerpt();
    *
    * @param string $new_length
    * @return void
    * @author Baylor Rae'
    */
    public static function length($new_length = 55, $more = true) {
        Qiraat_Excerpt::$length = $new_length;
        Qiraat_Excerpt::$more = $more;

        add_filter( 'excerpt_more', 'Qiraat_Excerpt::auto_excerpt_more' );

        add_filter('excerpt_length', 'Qiraat_Excerpt::new_length');

        Qiraat_Excerpt::output();
    }

    public static function new_length() {
        if( isset(Qiraat_Excerpt::$types[Qiraat_Excerpt::$length]) )
            return Qiraat_Excerpt::$types[Qiraat_Excerpt::$length];
        else
            return Qiraat_Excerpt::$length;
    }

    public static function output() {
        the_excerpt();
    }

    public static function continue_reading_link() {

        return '<span class="readmore"><a href="'.esc_url(get_permalink()).'">'.esc_html__('Read More','qiraat').'</a></span>';
    }

    public static function auto_excerpt_more( ) {
        if (Qiraat_Excerpt::$more) :
            return ' ';
        else :
            return ' ';
        endif;
    }

} //end class
endif;

if (!function_exists('Qiraat_Excerpt')){

	function Qiraat_Excerpt($length = 55, $more=true) {
		Qiraat_Excerpt::length($length, $more);
	}

}


?>