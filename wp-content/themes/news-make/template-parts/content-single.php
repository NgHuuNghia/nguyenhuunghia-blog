<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package news_make
 */

?>
<div class="col-md-12">
	<div class="news-section-info clearfix">
		<h3 class="section-title">
			<?php
				the_title();
			?>
		</h3><!-- .section-title -->
	</div><!-- .news-section-info -->
	<div class="single-news-content">
		<?php
			if( has_post_thumbnail() ) :
		?>
			<div class="news-image">
				<?php		
					the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) );
				?>
			</div><!-- .news-image -->
		<?php
			endif;
		?>
		<div class="news-detail clearfix">
			<div class="entry-meta">  
			<?php
				news_make_posted_on();

				news_make_get_categories();

			?>				
			</div><!-- .entry-meta -->
			<div class="news-content">
				<?php
					the_content( sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'news-make' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'news-make' ),
						'after'  => '</div>',
					) );					
				?>
			</div><!-- .news-content -->							        
		</div><!-- .news-detail.clearfix -->
	</div><!-- .single-news-content -->
</div>