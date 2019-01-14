<?php
/**
 * Dynamic Options hook.
 *
 * This file contains option values from customizer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package news_make
 */

if ( ! function_exists( 'news_make_dynamic_options' ) ) :

    function news_make_dynamic_options(){
        $site_title_font = news_make_get_option( 'news_make_site_title_font_size' );
    ?>               
    <style>
        .site-title {
            font-size: <?php echo esc_attr( $site_title_font ); ?>px;
        }
    </style>
<?php }

endif;

add_action( 'wp_head', 'news_make_dynamic_options' );