<?php


if( ! class_exists( 'news_make_Slider_Featured_Posts' ) ) :
    /**
     * Slider Highlight
     *
     */
    class news_make_Slider_Featured_Posts extends WP_Widget
    {

        function __construct()
        {
            $opts = array(
                'classname' => '',
                'description' => esc_html__( 'Displays posts as featured posts in Slider. Place it in "Featured Posts Wiget Area" widget area. It only works in the widget area.', 'news-make' )
            );
            parent::__construct( 'news-make-slider-highlight', esc_html__( 'NM: Slider Featured Posts', 'news-make' ), $opts );
        }

        function widget( $args, $instance ) {
            $cat = ! empty( $instance[ 'cat' ] ) ? $instance[ 'cat' ] : '';
            $post_no = ! empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 5;

            $slider_arguments = array(
                'cat'				=> $cat,
                'posts_per_page' 	=> absint( $post_no ),
                'post_type'			=> 'post',
                'post__not_in'		=> get_option("sticky_posts")
            );

            $slider_query = new WP_Query( $slider_arguments );
            if( $slider_query->have_posts() ) :
                ?>
                <div class="row clearfix section highlight-section">
                    <div class="col-sm-12">
                        <div class="owl-carousel highlight-carousel">
                            <?php
                            while( $slider_query->have_posts() ) :
                                $slider_query->the_post();
                                ?>
                                <div class="item">
                                    <div class="news-highlight-content">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php
                                            if( has_post_thumbnail() ) :
                                                the_post_thumbnail( 'news-make-thumbnail-3', array( 'class' => 'img-responsive' ) );
                                            else :
                                                ?>
                                                <img src="<?php echo esc_url( get_template_directory_uri() . '/themes-make/assets/images/image-1.jpg' )?>" class="img-responsive">
                                                <?php
                                            endif;
                                            ?>
                                            <div class="mask"></div><!-- .mask -->
                                        </a>
                                        <?php
                                        news_make_get_categories();
                                        ?>
                                        <div class="highlight-info">
                                            <h3 class="news-title">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php
                                                    the_title();
                                                    ?>
                                                </a>
                                            </h3><!-- .news-title -->
                                            <div class="entry-meta">
                                                <?php
                                                news_make_get_date();
                                                ?>
                                            </div><!-- .entry-meta -->
                                        </div><!-- .highlight-info -->
                                    </div><!-- .news-highlight-content -->
                                </div><!-- .item -->
                                <?php
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        </div><!-- .owl-carousel.highlight-carousel -->
                    </div>
                </div><!-- .row.clearfix.section.highlight-section -->
                <?php
            endif;
        }


        function update( $new_instance, $old_instance ) {
            $instance = $old_instance;

            $instance[ 'cat' ] =absint( $new_instance[ 'cat' ]);
            $instance[ 'post_no' ] = absint( $new_instance[ 'post_no' ] );

            return $instance;
        }


        function form( $instance ) {

            $defaults = array(
                'cat' => array(),
                'post_no' => 5,
            );
            $instance = wp_parse_args( (array) $instance, $defaults );
            ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'cat' ) )?>"><strong><?php echo esc_html__( 'Select Category: ', 'news-make' ); ?></strong></label>
                <span class="widget_multicheck">
				<br>
                    <?php
                    $categories = get_terms(array( 'category' ), array( 'fields' => 'ids' ));

                    array_unshift( $categories, 0 );

                    foreach($categories as $cat) {
                        ?>
                        <input id="<?php echo $this->get_field_id( 'cat' ) . $cat; ?>" name="<?php echo $this->get_field_name('cat'); ?>[]" type="checkbox" value="<?php echo $cat; ?>" <?php if(!empty($instance['cat'])) { ?><?php foreach ( $instance['cat'] as $checked ) { checked( $checked, $cat, true ); } ?><?php } ?>><?php if( $cat == 0 ) { echo esc_html__( 'Latest Posts', 'news-make' ); } else { echo esc_html( get_cat_name( $cat ) ); } ?>
	            <br>
                        <?php
                    }
                    ?>
	        	</span>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'post_no' ) )?>"><strong><?php echo esc_html__( 'Post No: ', 'news-make' )?></strong></label>
                <input type="number" id="<?php echo esc_attr( $this->get_field_id( 'post_no' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_no' ) ); ?>" value="<?php echo esc_attr( $instance['post_no'] ); ?>" class="widefat">
            </p>
            <?php
        }
    }
endif;