<?php
/**
 * Helper Functions.
 *
 * @package news_make
 */


/**
 * Funtion To Get Google Fonts
 */
if ( !function_exists( 'news_make_fonts_url' ) ) :

    /**
     * Return Font's URL.
     *
     * @since 1.0.0
     * @return string Fonts URL.
     */
    function news_make_fonts_url()
    {

        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Roboto Condensed font: on or off', 'news-make')) {
            $fonts[] = 'Roboto+Condensed:300,300i,400,400i,700,700i';
        }

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Open Sans font: on or off', 'news-make')) {
            $fonts[] = 'Open+Sans:400,600,700';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urldecode(implode('|', $fonts)),
                'subset' => urldecode($subsets),
            ), 'https://fonts.googleapis.com/css');
        }
        return $fonts_url;
    }
endif;

if ( ! function_exists( 'news_make_primary_navigation_fallback' ) ) :

    /**
     * Fallback for primary navigation.
     *
     * @since 1.0.0
     */
    function news_make_primary_navigation_fallback() {
        ?>
        <div class="primary-menu-container">
            <ul id="primary-menu" class="primary-menu">
                <li>
                    <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>" title="<?php esc_attr_e( 'Add Menu', 'news-make' ); ?>">
                        <?php
                            esc_html_e( 'Add a menu', 'news-make' );
                        ?>
                    </a>
                </li>
            </ul>
        </div>
        <?php
    }

endif;