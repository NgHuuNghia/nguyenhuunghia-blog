<?php
/**
 * Load Filters.
 *
 * @package news_make
 */

if( !function_exists( 'news_make_search_form' ) ) :
	/**
     * Search form of the theme.
     *
     * @since 1.0.0
     */
	function news_make_search_form() {
		$form = '<form role="search" method="get" id="search-form" class="search-form" action="' . esc_url( home_url( '/' ) ) . '" >
			    	<div class="input-group stylish-input-group">
			    		<label class="screen-reader-text" for="s">' . esc_html__( 'Search for:', 'news-make' ) . '</label>
			    		<input type="text" value="' . get_search_query() . '" name="s" id="s" class="form-control" />
			    		<span class="input-group-addon">
			    			<button type="submit" id="searchsubmit" value="'. esc_attr__( 'Search', 'news-make' ).'">
			    				<i class="fa fa-search"></i>
			    			</button>
			    		</span>
			    	</div>
			    </form>';

		return $form;
	}
endif;
add_filter( 'get_search_form', 'news_make_search_form', 20 );

/**
 * Filters For Excerpt 
 *
 */
if( !function_exists( 'news_make_excerpt_more' ) ) :
	/*
	 * Excerpt More
	 */
	function news_make_excerpt_more( $more ) {
		return '';
	}
endif;
add_filter( 'excerpt_more', 'news_make_excerpt_more' );

if( !function_exists( 'news_make_excerpt_length' ) ) :
	/*
	 * Excerpt More
	 */
	function news_make_excerpt_length( $length ) {
			return 30;
	}
endif;
add_filter( 'excerpt_length', 'news_make_excerpt_length' );



if( !function_exists( 'news_make_comment_form_fields' ) ) :
	/**
	 * Add custom style of form field
	 */
	function news_make_comment_form_fileds( $fields ) {
		$commenter = wp_get_current_commenter();
		$req      = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;

		$fields   =  array(
			'author'=>  '<div class="form-group">
							<label for="author">'.esc_html__("Full Name *", "news-make").'</label>
							<input class="form-input" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' />
						</div>'. ( $req ? '<span class="required"></span>' : '' ),

			'email'=>   '<div class="form-group">
							<label for="email">'.esc_html__("Email Address *", "news-make").'</label>
							<input class="form-input" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) .	'" ' . $aria_req . ' />
						</div>' . ( $req ? '<span class="required"></span>' : '' ),

			'url'=>     '<div class="form-group">
							<label for="url">'.esc_html__('Website', 'news-make').'</label>
							<input class="form-input" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" />
						</div>',
		);

		return $fields;
	}
endif;
add_filter( 'comment_form_default_fields', 'news_make_comment_form_fileds' );



if( !function_exists( 'news_make_comment_form' ) ) :
	/**
	 * Add custom default values of form.
	 */
	function news_make_comment_form( $args ) {
		$args['class_form'] = esc_attr__('comment_news comment-form', 'news-make');
		$args['title_reply'] = esc_html__('Leave comment','news-make');
		$args['title_reply_before'] = '<h3 class="reply-title">';
		$args['title_reply_after'] = '</h3>';
		$args['comment_notes_before'] = '<p>'. esc_html__( 'Your email address will not be published. Required fields are marked with *.','news-make' ).'</p>';
		$args['comment_field'] = '<div class="form-group">
									<label for="comment">'.esc_html__('Comment','news-make').'</label>
								  	<textarea id="comment" name="comment" rows="5" placeholder="'.''.'" aria-required="true"></textarea>
								  	</div>';
		$args['class_submit'] = esc_attr__('btn btn-default submit-btn', 'news-make'); 
		$args['label_submit'] = esc_attr__('Post A Comment', 'news-make');

		return $args;
	}
endif;
add_filter( 'comment_form_defaults', 'news_make_comment_form' );
