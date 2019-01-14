<?php
/**
 * Widget - Function
 *
 * @package news_make
 */

/**
 * Load widgets
 */
require get_template_directory() . '/themes-make/widgets/news-make-highlight.php';
require get_template_directory() . '/themes-make/widgets/news-make-widget-layouts.php';
require get_template_directory() . '/themes-make/widgets/news-make-sidebar-widgets.php';
require get_template_directory() . '/themes-make/widgets/news-make-bottom-widget-layouts.php';

if( !function_exists( 'news_make_register_widgets' ) ) {
	/*
	 * Function to register widgets
	 */
	function news_make_register_widgets() {

		/*
			Bottom Widget One Register
		*/
		register_widget( 'news_make_Bottom_Widget_Layout_One' );

		/*
			Bottom Widget Two Register
		*/
		register_widget( 'news_make_Bottom_Widget_Layout_Two' );

		/*
			Main Highlight Widget Register
		*/
		register_widget( 'news_make_Main_Featured_Posts' );

		/*
			Main Highlight With Slider Widget Register
		*/
		register_widget( 'news_make_Main_Featured_Posts_Two' );

		/*
			Slider Highlight Widget Register
		*/
		register_widget( 'news_make_Slider_Featured_Posts' );

		/**
		 * Register Sidebar Widget One
		 */
		register_widget( 'news_make_Sidebar_Widget_One' );

		/**
		 * Register Sidebar Widget Two
		 */
		register_widget( 'news_make_Sidebar_Widget_Two' );

		/**
		 * Register News Widget One
		 */
		register_widget( 'news_make_Widget_Layout_One' );

		/**
		 * Register News Widget Two
		 */
		register_widget( 'news_make_Widget_Layout_Two' );
	}
}
add_action( 'widgets_init', 'news_make_register_widgets' );