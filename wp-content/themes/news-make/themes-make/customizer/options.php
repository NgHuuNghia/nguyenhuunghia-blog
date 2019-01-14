<?php

$default = news_make_get_default_theme_options();

$categories = get_terms( 'category' );
$cat = array();

foreach( $categories as $category ) {
	$cat[$category->term_id] = $category->name;
}

$wp_customize->add_panel( 'news_make_options', array(
	'title'			=> esc_html__( 'Theme Options', 'news-make' ),
	'description'	=> esc_html__( ' News Make Customization Options', 'news-make' ),
	'priority'		=> 10	
) );

// Site Title Font Size
$wp_customize->add_setting('news_make_site_title_font_size',array(
	'sanitize_callback' => 'news_make_sanitize_number_absint',
	'default' => $default['news_make_site_title_font_size'],
) );

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'news_make_site_title_font_size',array(
	'label' => esc_html__('Site Title Font Size','news-make'),
	'section' => 'title_tagline',
	'settings' => 'news_make_site_title_font_size',
	'type'=> 'number',
)));



/*------------------------------------------------
		Top Header Options
------------------------------------------------*/

// Ticker News Options
$wp_customize->add_section( 'news_make_ticker_news_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Ticker News Options', 'news-make' ),
	'description'	=> esc_html__( 'Configure Ticker News', 'news-make' ),
	'panel'			=> 'news_make_options'	
) );

$wp_customize->add_setting( 'news_make_ticker_news_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> $default['news_make_ticker_news_title'],
) );
$wp_customize->add_control( 'news_make_ticker_news_title', array(
	'label'				=> esc_html__( 'Ticker News Title', 'news-make' ),
	'section'			=> 'news_make_ticker_news_options',
	'settings'			=> 'news_make_ticker_news_title',
	'type'				=> 'text' 
) );

$wp_customize->add_setting( 'news_make_ticker_news_category', array(
	'sanitize_callback' => 'news_make_sanitize_choices'
) );

$wp_customize->add_control( new news_make_Dropdown_Multiple_Chooser( $wp_customize, 'news_make_ticker_news_category', array(
	'label' => esc_html__('Choose Category','news-make'),
	'section' => 'news_make_ticker_news_options',
	'settings' => 'news_make_ticker_news_category',
	'choices'		=> $cat,
) ) );

$wp_customize->add_setting('news_make_ticker_news_no',array(
	'sanitize_callback' => 'news_make_sanitize_number_absint',
	'default' =>  $default['news_make_ticker_news_no'],
) );

$wp_customize->add_control( 'news_make_ticker_news_no', array(
	'label' => esc_html__('No of Posts','news-make'),
	'section' => 'news_make_ticker_news_options',
	'settings' => 'news_make_ticker_news_no',
	'type'=> 'number',
) );


// Current Date Options
$wp_customize->add_section( 'news_make_current_date_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Current Date Option', 'news-make' ),
	'description'	=> esc_html__( 'Configure Current Date', 'news-make' ),
	'panel'			=> 'news_make_options'	
) );

$wp_customize->add_setting('news_make_enable_current_date',array(
	'sanitize_callback' => 'news_make_sanitize_checkbox',
	'default' => $default['news_make_enable_current_date'],
) );

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'news_make_enable_current_date',array(
	'label' => esc_html__('Show Current Date','news-make'),
	'section' => 'news_make_current_date_options',
	'settings' => 'news_make_enable_current_date',
	'type'=> 'checkbox',
)));

// Search Button Options
$wp_customize->add_section( 'news_make_search_btn_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Search Button Option', 'news-make' ),
	'description'	=> esc_html__( 'Configure Search Button', 'news-make' ),
	'panel'			=> 'news_make_options'	
) );

$wp_customize->add_setting('news_make_enable_search_btn',array(
	'sanitize_callback' => 'news_make_sanitize_checkbox',
	'default' => $default['news_make_enable_search_btn'],
) );

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'news_make_enable_search_btn',array(
	'label' => esc_html__('Show Search Button','news-make'),
	'section' => 'news_make_search_btn_options',
	'settings' => 'news_make_enable_search_btn',
	'type'=> 'checkbox',
)));



/*
		Footer Settings
*/
$wp_customize->add_section( 'news_make_copyright_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Copyright Text Option', 'news-make' ),
	'description'	=> esc_html__( 'Configure Copyright Text', 'news-make' ),
	'panel'			=> 'news_make_options'	
) );

// Copyright Text
$wp_customize->add_setting( 'news_make_copyright_text', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> $default['news_make_copyright_text'],
) );
$wp_customize->add_control( 'news_make_copyright_text', array(
	'label'				=> esc_html__( 'Copyright Text', 'news-make' ),
	'description'		=> esc_html__( 'Insert copyright text', 'news-make' ), 
	'section'			=> 'news_make_copyright_options',
	'settings'			=> 'news_make_copyright_text',
	'type'				=> 'text' 
) );

// Scroll Top Options
$wp_customize->add_section( 'news_make_scroll_top_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Scroll Top Button Option', 'news-make' ),
	'description'	=> esc_html__( 'Configure Scroll Top Button', 'news-make' ),
	'panel'			=> 'news_make_options'	
) );

$wp_customize->add_setting('news_make_enable_scroll_top',array(
	'sanitize_callback' => 'news_make_sanitize_checkbox',
	'default' => $default['news_make_enable_scroll_top'],
) );

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'news_make_enable_scroll_top',array(
	'label' => esc_html__('Show Scroll Top Button','news-make'),
	'section' => 'news_make_scroll_top_options',
	'settings' => 'news_make_enable_scroll_top',
	'type'=> 'checkbox',
)));

/*-----------------------------------------
  	BreadCrumb Option
-----------------------------------------*/
$wp_customize->add_section( 'news_make_breadcrumb_option', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Breadcrumb Option', 'news-make' ),
	'description'	=> esc_html__( 'Configure Breadcrumb', 'news-make' ),
	'panel'			=> 'news_make_options'
) );

$wp_customize->add_setting('news_make_enable_breadcrumb',array(
	'sanitize_callback' => 'news_make_sanitize_checkbox',
	'default' => $default['news_make_enable_breadcrumb'],
) );

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'news_make_enable_breadcrumb',array(
	'label' => esc_html__('Show Breadcrumb','news-make'),
	'section' => 'news_make_breadcrumb_option',
	'settings' => 'news_make_enable_breadcrumb',
	'type'=> 'checkbox',
)));

/*-----------------------------------------
  	Blog Page Option
-----------------------------------------*/
$wp_customize->add_section( 'news_make_blogpage_option', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Blog Page Option', 'news-make' ),
	'description'	=> esc_html__( 'Configure Blog page', 'news-make' ),
	'panel'			=> 'news_make_options'
) );

$wp_customize->add_setting('news_make_enable_featured_post',array(
	'sanitize_callback' => 'news_make_sanitize_checkbox',
	'default' => $default['news_make_enable_featured_post'],
) );

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'news_make_enable_featured_post',array(
	'label' => esc_html__('Show Featured Posts','news-make'),
	'section' => 'news_make_blogpage_option',
	'settings' => 'news_make_enable_featured_post',
	'type'=> 'checkbox',
)));

/*-----------------------------------------
  	Theme Sidebar Option
-----------------------------------------*/
$wp_customize->add_section( 'news_make_sidebar_section', array(
	'priority'			=> 20,
	'title'				=> esc_html__( 'Sidebar Option', 'news-make' ),
	'description'		=> esc_html__( 'Configure Sidebar Position', 'news-make' ),
	'panel'				=> 'news_make_options'	
) );

$wp_customize->add_setting('news_make_sidebar_position', array(
	'sanitize_callback'	=> 'news_make_sanitize_select',
	'default'			=> $default['news_make_sidebar_position'],
));

$wp_customize->add_control('news_make_sidebar_position', array(
	'label'      		=> esc_html__('Sidebar Position', 'news-make'),
	'description'		=> esc_html__( 'Select Sidebar Postion. Select none to hide sidebar.', 'news-make' ),
	'section'    		=> 'news_make_sidebar_section',
	'settings'   		=> 'news_make_sidebar_position',
	'type'       		=> 'radio',
	'choices'    		=> array(
		'left'   		=> esc_html__('Left','news-make'),
		'right'  		=> esc_html__('Right','news-make'),
		'none'	 		=> esc_html__('None','news-make'),
	),
) );

/*-----------------------------------------
  	Theme Meta Option
-----------------------------------------*/
$wp_customize->add_section( 'news_make_meta_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Post Meta Options', 'news-make' ),
	'panel'			=> 'news_make_options'	
) );

// Enable Post Date
$wp_customize->add_setting( 'news_make_show_date', array(
	'sanitize_callback'	=> 'news_make_sanitize_checkbox',
	'default'			=> $default['news_make_show_date'],
) );

$wp_customize->add_control( 'news_make_show_date', array(
	'label'				=> esc_html__( 'Enable Post Date', 'news-make' ),
	'section'			=> 'news_make_meta_options',
	'type'				=> 'checkbox' 
) );

// Enable Author Name
$wp_customize->add_setting( 'news_make_show_author', array(
	'sanitize_callback'	=> 'news_make_sanitize_checkbox',
	'default'			=> $default['news_make_show_author'],
) );

$wp_customize->add_control( 'news_make_show_author', array(
	'label'				=> esc_html__( 'Enable Author Name', 'news-make' ),
	'section'			=> 'news_make_meta_options',
	'type'				=> 'checkbox' 
) );

// Enable Comments No
$wp_customize->add_setting( 'news_make_show_comments_no', array(
	'sanitize_callback'	=> 'news_make_sanitize_checkbox',
	'default'			=> $default['news_make_show_comments_no'],
) );

$wp_customize->add_control( 'news_make_show_comments_no', array(
	'label'				=> esc_html__( 'Enable Comments Number', 'news-make' ),
	'section'			=> 'news_make_meta_options',
	'type'				=> 'checkbox' 
) );

// Enable Categories
$wp_customize->add_setting( 'news_make_show_categories', array(
	'sanitize_callback'	=> 'news_make_sanitize_checkbox',
	'default'			=> $default['news_make_show_categories'],
) );

$wp_customize->add_control( 'news_make_show_categories', array(
	'label'				=> esc_html__( 'Enable Categories', 'news-make' ),
	'section'			=> 'news_make_meta_options',
	'type'				=> 'checkbox' 
) );