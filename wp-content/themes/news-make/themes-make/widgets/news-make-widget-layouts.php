<?php

if ( ! class_exists( 'News_Make_Widget_Layout_One' ) ) :
	/**
	* News Layout Class One
	*/
	class News_Make_Widget_Layout_One extends WP_Widget
	{
		
		function __construct()
		{
			$opts = array(
				'classname' => 'news-section-one',
				'description'	=> esc_html__( 'News Layout One. Place it within "FrontPage Widget Area"', 'news-make' )
			);

			parent::__construct( 'news-make-news-layout-widget-one', esc_html__( 'NM: News Layout One', 'news-make' ), $opts );
		}

		function widget( $args, $instance ) {
			$title = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );
			$cat = ! empty( $instance[ 'cat' ] ) ? $instance[ 'cat' ] : absint( 0 );
			$post_no = ! empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : absint( 6 );

			echo $args[ 'before_widget' ];
			?>
			<div class="news-section-info clearfix">
			<?php
				if( !empty( $title ) ) :
					echo $args[ 'before_title' ];
					echo esc_html( $title );
					echo $args[ 'after_title' ];
				endif;

				if( absint( $cat ) > 0 ) {
					$cat_link = get_category_link( $cat );
				} else {
					$cat_link = '';
				}
				if( $cat_link ) :
				?>
					<a href="<?php echo esc_url( $cat_link ); ?>" class="news-cat-link"><?php echo esc_html__( 'View More', 'news-make' ); ?> <i class="fa fa-long-arrow-right"></i></a>
				<?php
				endif;
				?>
			</div>
			<?php
				$arguments = array(
					'cat'	=> absint( $cat ),
					'posts_per_page' => absint( $post_no ),
				);
				$query = new WP_Query( $arguments );
				?>
				<div class="news-section-content">
					<div class="row clearfix">
					<?php
						if( $query->have_posts() ) :
							$i = 0;
							while( $query->have_posts() ) :
								$query->the_post();
								if( $i < 2 ) :
					?>
									<div class="col-sm-6">
										<div class="big-news-content">
											<div class="news-image">
												<a href="<?php the_permalink(); ?>">
											<?php
												if( has_post_thumbnail() ) :
													the_post_thumbnail( 'news-make-thumbnail-3', array( 'class' => 'img-responsive' ) );
												else :
											?>
													<img src="<?php echo esc_url( get_template_directory_uri() . '/themes-make/assets/images/image-1.jpg' ); ?>" class="img-responsive">
											<?php
												endif;
											?>
												<div class="mask"></div><!-- .mask -->
												</a>
												<?php
													news_make_get_categories();
												?>
											</div><!-- .news-image -->
											<div class="news-detail">
												<h4 class="news-title">
													<a href="<?php the_permalink(); ?>">
														<?php
															the_title();
														?>
													</a>
												</h4><!-- .news-title -->
												<div class="entry-meta">
									                <?php
									                	news_make_posted_on();
									                ?>
									            </div><!-- .entry-meta -->
											</div><!-- .news-detail -->
										</div><!-- .big-news-content -->
									</div>
					<?php
								endif;
								$i = $i + 1;
							endwhile;
							wp_reset_postdata();
						endif;
					?>
					</div><!-- .row.clearfix -->
					<div class="row clearfix">
					<?php
						if( $query->have_posts() ) :
							$i = 0;
							while( $query->have_posts() ) :
								$query->the_post();

								if( $i >= 2 ) :
										if( $i%2 == 0 ) :
									?>
										<div class="clearfix visible-xs visible-sm visible-md visible-lg"></div>
									<?php
										endif;
									?>
									<div class="col-xs-12 col-sm-6">
										<div class="clearfix small-news-content">
											<div class="small-thumbnail">
												<a href="<?php the_permalink(); ?>">
												<?php
													if( has_post_thumbnail() ) :
														the_post_thumbnail( 'news-make-thumbnail-1', array( 'class' => 'img-responsive' ) );
													else :
												?>
														<img src="<?php echo esc_url( get_template_directory_uri() . '/themes-make/assets/images/image-3.jpg' ); ?>" class="img-responsive">
												<?php
													endif;
												?>
												<div class="mask"></div><!-- .mask -->
												</a>
											</div><!-- .small-thumbnail -->
											<div class="news-detail">
												<h5 class="news-title">
													<a href="<?php the_permalink(); ?>">
														<?php
															the_title();
														?>
													</a>
												</h5><!-- .news-title -->
												<div class="entry-meta">
										            <?php
														news_make_get_date();
													?>
										        </div><!-- .entry-meta -->
											</div><!-- news-detail -->
										</div><!-- .clearfix.small-news-content -->
									</div>

					<?php
								endif;
								$i = $i + 1;
							endwhile;
							wp_reset_postdata();
						endif;
					?>
					</div><!-- .row.clearfix -->
				</div><!-- .news-section-content -->
				<?php
			echo $args[ 'after_widget' ];
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance[ 'title' ] = sanitize_text_field( $new_instance[ 'title' ] );
			$instance[ 'cat' ] = absint( $new_instance[ 'cat' ] );
			$instance[ 'post_no' ] = absint( $new_instance[ 'post_no' ] );

			return $instance;
		}

		function form( $instance ) {

			$title = ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
			$cat = ! empty( $instance[ 'cat' ] ) ? $instance[ 'cat' ] : absint( 0 );
			$post_no = ! empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : absint( 6 );
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php echo esc_html__( 'Title: ', 'news-make' ); ?></strong></label>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'cat' ) )?>"><strong><?php echo esc_html__( 'Select Category: ', 'news-make' ); ?></strong></label>
				<?php
					$cat_args = array(
						'orderby'	=> 'name',
						'hide_empty'	=> 0,
						'id'	=> $this->get_field_id( 'cat' ),
						'name'	=> $this->get_field_name( 'cat' ),
						'class'	=> 'widefat',
						'taxonomy'	=> 'category',
						'selected'	=> absint( $cat ),
						'show_option_all'	=> esc_html__( 'Show Recent Posts', 'news-make' )
					);
					wp_dropdown_categories( $cat_args );
				?>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'post_no' ) )?>"><strong><?php echo esc_html__( 'Post No: ', 'news-make' )?></strong></label>
				<input type="number" id="<?php echo esc_attr( $this->get_field_id( 'post_no' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_no' ) ); ?>" value="<?php echo esc_attr( $post_no ); ?>" class="widefat">
			</p>
			<?php
		}
	}
endif;

if ( ! class_exists( 'news_make_Widget_Layout_Two' ) ) :
	/**
	* News Layout Class Two
	*/
	class news_make_Widget_Layout_Two extends WP_Widget
	{

		function __construct()
		{
			$opts = array(
				'classname' => 'news-section-two',
				'description'	=> esc_html__( 'News Layout Two. Place it within "FrontPage Widget Area"', 'news-make' )
			);

			parent::__construct( 'news-make-news-layout-widget-two', esc_html__( 'NM: News Layout Two', 'news-make' ), $opts );
		}

		function widget( $args, $instance ) {
			$title = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );
			$cat = ! empty( $instance[ 'cat' ] ) ? $instance[ 'cat' ] : absint( 0 );
			$post_no = ! empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : absint( 6 );

			echo $args[ 'before_widget' ];
			?>
			<div class="news-section-info clearfix">
			<?php
				if( !empty( $title ) ) :
					echo $args[ 'before_title' ];
					echo esc_html( $title );
					echo $args[ 'after_title' ];
				endif;

				if( absint( $cat ) > 0 ) {
					$cat_link = get_category_link( $cat );
				} else {
					$cat_link = '';
				}

				if( $cat_link ) :
				?>
					<a href="<?php echo esc_url( $cat_link ); ?>" class="news-cat-link"><?php echo esc_html__( 'View More', 'news-make' ); ?> <i class="fa fa-long-arrow-right"></i></a>
				<?php
				endif;
				?>
			</div>
			<?php
				$arguments = array(
					'cat'	=> absint( $cat ),
					'posts_per_page' => absint( $post_no ),
				);
				$query = new WP_Query( $arguments );
				?>
				<div class="news-section-content">
					<div class="row clearfix">
					<?php
						if( $query->have_posts() ) :
							$i = 1;
							while( $query->have_posts() ) :
								$query->the_post();
								if( $i%3 == 0 ) :
									?>
									<div class="clearfix"></div>
									<?php
								endif;
								if( $i == 1 ) :
					?>
									<div class="col-sm-6">
										<div class="big-news-content">
											<div class="news-image">
												<a href="<?php the_permalink(); ?>">
												<?php
													if( has_post_thumbnail() ) :
														the_post_thumbnail( 'news-make-thumbnail-3', array( 'class' => 'img-responsive' ) );
													else :
												?>
														<img src="<?php echo esc_url( get_template_directory_uri() . '/themes-make/assets/images/image-1.jpg' ); ?>" class="img-responsive">
												<?php
													endif;
												?>
												<div class="mask"></div><!-- .mask -->
												</a>
												<?php
													news_make_get_categories();
												?>
											</div><!-- .news-image -->
											<div class="news-detail">
												<h4 class="news-title">
													<a href="<?php the_permalink(); ?>">
														<?php
															the_title();
														?>
													</a>
												</h4><!-- .news-title -->
												<div class="entry-meta">
													<?php
														news_make_posted_on();
													?>
										        </div><!-- .entry-meta -->
							                    <div class="news-content">
							                    	<?php
							                    		the_excerpt();
							                    	?>
							                    </div><!-- .news-content -->
											</div><!-- .news-detail -->
										</div><!-- .big-news-content -->
									</div>

					<?php
								endif;
								$i = $i + 1;
							endwhile;
							wp_reset_postdata();
						endif;
					?>
						<div class="col-sm-6 right">
							<div class="row clearfix">
							<?php
								if( $query->have_posts() ) :
									$i = 1;
									while( $query->have_posts() ) :
										$query->the_post();
										if( $i > 1 ) :
											if( $i%2 == 0 ) :
							?>
											<div class="clearfix"></div>
							<?php
											endif;
							?>
											<div class="col-xs-12 col-sm-12 small-news-container">
												<div class="clearfix small-news-content">
													<div class="small-thumbnail">
														<a href="<?php the_permalink(); ?>">
														<?php
															if( has_post_thumbnail() ) :
																the_post_thumbnail( 'news-make-thumbnail-1', array( 'class' => 'img-responsive' ) );
															else :
														?>
																<img src="<?php echo esc_url( get_template_directory_uri() . '/themes-make/assets/images/image-3.jpg' ); ?>" class="img-responsive">
														<?php
															endif;
														?>
														<div class="mask"></div><!-- .mask -->
														</a>
													</div><!-- .small-thumbnail -->
													<div class="news-detail">
														<h5 class="news-title">
															<a href="<?php the_permalink(); ?>">
																<?php
																	the_title();
																?>
															</a>
														</h5><!-- .news-title -->
														<div class="entry-meta">
												            <?php
																news_make_get_date();
															?>
												        </div><!-- .entry-meta -->
													</div><!-- .news-detail -->
												</div><!-- .clearfix.small-news-content -->
											</div><!-- .small-news-container -->
							<?php
										endif;
										$i = $i + 1;
									endwhile;
									wp_reset_postdata();
								endif;
							?>
							</div><!-- .row.clearfix -->
						</div>
					</div><!-- .row.clearfix -->
				</div><!-- .news-section-content -->
				<?php
			echo $args[ 'after_widget' ];
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance[ 'title' ] = sanitize_text_field( $new_instance[ 'title' ] );
			$instance[ 'cat' ] = absint( $new_instance[ 'cat' ] );
			$instance[ 'post_no' ] = absint( $new_instance[ 'post_no' ] );

			return $instance;
		}

		function form( $instance ) {

			$title = ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
			$cat = ! empty( $instance[ 'cat' ] ) ? $instance[ 'cat' ] : absint( 0 );
			$post_no = ! empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : absint( 5 );
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php echo esc_html__( 'Title: ', 'news-make' ); ?></strong></label>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'cat' ) )?>"><strong><?php echo esc_html__( 'Select Category: ', 'news-make' ); ?></strong></label>
				<?php
					$cat_args = array(
						'orderby'	=> 'name',
						'hide_empty'	=> 0,
						'id'	=> $this->get_field_id( 'cat' ),
						'name'	=> $this->get_field_name( 'cat' ),
						'class'	=> 'widefat',
						'taxonomy'	=> 'category',
						'selected'	=> absint( $cat ),
						'show_option_all'	=> esc_html__( 'Show Recent Posts', 'news-make' )
					);
					wp_dropdown_categories( $cat_args );
				?>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'post_no' ) )?>"><strong><?php echo esc_html__( 'Post No: ', 'news-make' )?></strong></label>
				<input type="number" id="<?php echo esc_attr( $this->get_field_id( 'post_no' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_no' ) ); ?>" value="<?php echo esc_attr( $post_no ); ?>" class="widefat">
			</p>
			<?php			
		}
	}
endif;
?>