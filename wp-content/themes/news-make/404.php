<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package news_make
 */

get_header(); ?>

	<main class="main-container">
		<div class="container">
			<div class="row section">
				<div class="col-md-8 col-md-offset-2">
					<div class="row clearfix news-section">
						<div class="col-md-12">
							<div class="error-404 not-found">
	                            <header class="page-header">
	                                <h1 class="title-404"><?php echo esc_html__( '404', 'news-make' ); ?></h1>
	                                <h4 class="subtitle-404"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'news-make' ); ?></h4>
	                            </header><!-- .page-header -->

	                            <div class="page-content">
	                                <p>
	                                	<?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'news-make' ); ?>
	                                </p>

	                                <?php
	                                	get_search_form();
	                                ?>
	                            </div><!-- .page-content -->
	                        </div><!-- .error-404.not-found -->
						</div>
					</div><!-- .row.clearfix.news-section -->
				</div>
			</div><!-- .row.section -->
		</div><!-- .container -->
	</main><!-- .main-container -->

<?php
get_footer();
