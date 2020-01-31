<?php
/** Theme Name    : Enigma-Parallax
 * Theme Core Functions and Codes
 */
/**Includes required resources here**/
require( get_template_directory() . '/core/menu/default_menu_walker.php' );
require( get_template_directory() . '/core/menu/weblizar_nav_walker.php' );
require( get_template_directory() . '/core/menu/weblizar_nav_side_walker.php' );//side menu
require( get_template_directory() . '/core/scripts/css-js.php' ); //Enquiring Resources here
require( get_template_directory() . '/core/comment-function.php' );
require( get_template_directory() . '/customizer.php' );
require( get_template_directory() . '/class-tgm-plugin-activation.php' );
require get_template_directory() . '/core/custom-header.php';

define( 'enigma_parallax_THEME_URL', 'https://weblizar.com/themes/enigma-premium/' );
define( 'enigma_parallax_THEME_REVIEW_URL', 'https://wordpress.org/support/theme/enigma-parallax/reviews/#new-post' );

add_action( 'wp_enqueue_scripts', 'enigma_parallax_font_family' );
function enigma_parallax_font_family() {
	wp_register_style( 'googleFonts', 'https://fonts.googleapis.com/css?family=Rock+Salt|Neucha|Sans+Serif|Indie+Flower|Shadows+Into+Light|Dancing+Script|Kaushan+Script|Tangerine|Pinyon+Script|Great+Vibes|Bad+Script|Calligraffitti|Homemade+Apple|Allura|Megrim|Nothing+You+Could+Do|Fredericka+the+Great|Rochester|Arizonia|Astloch|Bilbo|Cedarville+Cursive|Clicker+Script|Dawning+of+a+New+Day|Ewert|Felipa|Give+You+Glory|Italianno|Jim+Nightshade|Kristi|La+Belle+Aurore|Meddon|Montez|Mr+Bedfort|Over+the+Rainbow|Princess+Sofia|Reenie+Beanie|Ruthie|Sacramento|Seaweed+Script|Stalemate|Trade+Winds|UnifrakturMaguntia|Waiting+for+the+Sunrise|Yesteryear|Zeyada|Warnes|Verdana|Abril+Fatface|Advent+Pro|Aldrich|Alex+Brush|Amatic+SC|Antic+Slab|Candal' );

	wp_enqueue_style( 'googleFonts' );
}

/*After Theme Setup*/
add_action( 'after_setup_theme', 'enigma_parallax_head_setup' );
function enigma_parallax_head_setup() {
	global $content_width;
	//content width
	if ( ! isset( $content_width ) ) {
		$content_width = 550;
	} //px

	/* Enable support for Woocommerce */
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	//Blog Thumb Image Sizes
	add_image_size( 'enigma_parallax_home_post_thumb', 340, 210, true );
	//Blogs thumbs
	add_image_size( 'enigma_parallax_page_thumb', 730, 350, true );
	add_image_size( 'enigma_parallax_blog_2c_thumb', 570, 350, true );
	add_theme_support( 'title-tag' );

	// Logo
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );
	// Load text domain for translation-ready

	add_theme_support( 'post-thumbnails' ); //supports featured image
	// This theme uses wp_nav_menu() in one location.

	// theme support
	$args = array( 'default-color' => '000000' );
	add_theme_support( 'custom-background', $args );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );

	/* Allow shortcodes in widgets. */
	add_filter( 'widget_text', 'do_shortcode' );

	/* Gutenberg */
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'customize-selective-refresh-widgets' );

	/* Add editor style. */
	add_theme_support( 'editor-styles' );
	add_theme_support( 'dark-editor-style' );

	/* Enable support for HTML5 */
	add_theme_support( 'html5',
		array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	*/
	add_editor_style( 'css/editor-style.css' );

}

// Read more tag to formatting in blog page
function enigma_parallax_content_more( $more ) {
	return '<div class="blog-post-details-item"><a class="enigma_blog_read_btn" href="' . esc_url( get_permalink() ) . '"><i class="fa fa-plus-circle"></i>"' . __( 'Read More', 'enigma-parallax' ) . '"</a></div>';
}

add_filter( 'the_content_more_link', 'enigma_parallax_content_more' );


// Replaces the excerpt "more" text by a link
function enigma_parallax_excerpt_more( $more ) {
	return '';
}

add_filter( 'excerpt_more', 'enigma_parallax_excerpt_more' );
/*
* enigma-parallax widget area
*/
add_action( 'widgets_init', 'enigma_parallax_widgets_init' );
function enigma_parallax_widgets_init() {
	/*sidebar*/
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'enigma-parallax' ),
		'id'            => 'sidebar-primary',
		'description'   => __( 'The primary widget area', 'enigma-parallax' ),
		'before_widget' => '<div class="enigma_sidebar_widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="enigma_sidebar_widget_title"><h2>',
		'after_title'   => '</h2></div>'
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'enigma-parallax' ),
		'id'            => 'footer-widget-area',
		'description'   => __( 'footer widget area', 'enigma-parallax' ),
		'before_widget' => '<div class="col-md-3 col-sm-6 enigma_footer_widget_column %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="enigma_footer_widget_title">',
		'after_title'   => '<div class="enigma-footer-separator"></div></div>',
	) );
}

/* Breadcrumbs  */
function enigma_parallax_breadcrumbs() {
	$delimiter = '';
    $home = __('Home', 'enigma'); // text for the 'Home' link
    $before = '<li>'; // tag before the current crumb
    $after = '</li>'; // tag after the current crumb
    echo '<ul class="breadcrumb">';
    global $post;
    $homeLink = home_url();
    echo '<li><a href="' . esc_url($homeLink) . '">' . $home . '</a></li>' . $delimiter . ' ';
    if (is_category()) {
        global $wp_query;
        $cat_obj = $wp_query->get_queried_object();
        $thisCat = $cat_obj->term_id;
        $thisCat = get_category($thisCat);
        $parentCat = get_category($thisCat->parent);
        if ($thisCat->parent != 0)
            echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
        echo $before . ' _e("Archive by category","enigma") "' . single_cat_title('', false) . '"' . $after;
    } elseif (is_day()) {
        echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
        echo '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . $delimiter . ' ';
        echo $before . get_the_time('d') . $after;
    } elseif (is_month()) {
        echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
        echo $before . get_the_time('F') . $after;
    } elseif (is_year()) {
        echo $before . get_the_time('Y') . $after;
    } elseif (is_single() && !is_attachment()) {
        if (get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } else {
            $cat = get_the_category();
            $cat = $cat[0];
            //echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo $before . get_the_title() . $after;
        }

    } elseif (!is_single() && !is_page() && get_post_type() != 'post') {
        $post_type = get_post_type_object(get_post_type());
        echo $before . $post_type->labels->singular_name . $after;
    } elseif (is_attachment()) {
        $parent = get_post($post->post_parent);
        $cat = get_the_category($parent->ID);
        //$cat = $cat[0];
        // echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_page() && !$post->post_parent) {
        echo $before . get_the_title() . $after;
    } elseif (is_page() && $post->post_parent) {
        $parent_id = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
            $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        foreach ($breadcrumbs as $crumb)
            echo $crumb . ' ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_search()) {
        echo $before . _e("Search results for", "enigma") . get_search_query() . '"' . $after;

    } elseif (is_tag()) {
        echo $before . _e('Tag', 'enigma') . single_tag_title('', false) . $after;
    } elseif (is_author()) {
        global $author;
        $userdata = get_userdata($author);
        echo $before . _e("Articles posted by", "enigma") . $userdata->display_name . $after;
    } elseif (is_404()) {
        echo $before . _e("Error 404", "enigma") . $after;
    }

    echo '</ul>';
}

/*===================================================================================
* Add Author Links
* =================================================================================*/
function enigma_parallax_author_profile( $contactmethods ) {

	$contactmethods['youtube_profile']  = __( 'Youtube Profile URL', 'enigma-parallax' );
	$contactmethods['twitter_profile']  = __( 'Twitter Profile URL', 'enigma-parallax' );
	$contactmethods['facebook_profile'] = __( 'Facebook Profile URL', 'enigma-parallax' );
	$contactmethods['linkedin_profile'] = __( 'Linkedin Profile URL', 'enigma-parallax' );

	return $contactmethods;
}

add_filter( 'user_contactmethods', 'enigma_parallax_author_profile', 10, 1 );
/*===================================================================================
* Add Class Gravtar
* =================================================================================*/
add_filter( 'get_avatar', 'enigma_parallax_gravatar_class' );

function enigma_parallax_gravatar_class( $class ) {
	$class = str_replace( "class='avatar", "class='author_detail_img", $class );

	return $class;
}

/****--- Navigation for Author, Category , Tag , Archive ---***/
function enigma_parallax_navigation() { ?>
    <div class="enigma_blog_pagination">
        <div class="enigma_blog_pagi">
			<?php posts_nav_link(); ?>
        </div>
    </div>
<?php }

/****--- Navigation for Single ---***/
function enigma_parallax_navigation_posts() { ?>
    <div class="navigation_en">
        <nav id="wblizar_nav">
			<span class="nav-previous">
			<?php previous_post_link( '&laquo; %link' ); ?>
			</span>
            <span class="nav-next">
			<?php next_post_link( '%link &raquo;' ); ?>
			</span>
        </nav>
    </div>
	<?php
}

/*
if (is_admin()) {
require_once('core/admin/admin-themes.php');
}*/
add_action( 'tgmpa_register', 'enigma_parallax_plugin_recommend' );
function enigma_parallax_plugin_recommend() {
	$plugins = array(
		array(
			'name'     => 'Institute Management',
			'slug'     => 'institute-management',
			'required' => false,
		),
		array(
			'name'     => 'Advanced Google Maps Lite',
			'slug'     => 'advanced-google-maps-lite',
			'required' => false,
		),
		array(
			'name'     => 'Weblizar Companion',
			'slug'     => 'weblizar-companion',
			'required' => false,
		),
	);
	tgmpa( $plugins );
}

/*===================================================================================
	* DISPLAY LOCATION
	* =================================================================================*/
function enigmaregister_my_menus() {
	register_nav_menu( 'primary', __( 'Primary Menu', 'enigma-parallax' ) );
	register_nav_menus(
		array(
			'SIDEER' => esc_attr( 'SIDE MENU' ),
			/*'another-menu' => __( 'Another Menu' ),
			'an-extra-menu' => __( 'An Extra Menu' )*/
		)
	);
}

add_action( 'init', 'enigmaregister_my_menus' );

if ( get_theme_mod( 'snoweffect' ) == 1 ) {
	function snow_script() {
		wp_enqueue_script( 'snow', get_template_directory_uri() . '/js/snowstorm.js' );
	}

	add_action( 'wp_enqueue_scripts', 'snow_script' );
}
if ( is_admin() ) {
	require_once( 'core/admin/hire-us.php' );
}
if ( is_admin() ) {
	require_once( 'core/admin/admin-themes.php' );
}

add_action( 'wp_enqueue_scripts', 'enigna_parallax_custom_css' );
function enigna_parallax_custom_css() {

	$output = '.logo a, .logo p {
		font-family: ' . get_theme_mod( 'font_title', 'Open Sans' ) . ';
		}
		.navbar-default .navbar-nav > li > a, .dropdown-menu > li > a{
			font-family: ' . get_theme_mod( 'header_menu_link', 'Open Sans' ) . '!important ;
		}
		.carousel-text h1, .enigma_heading_title h3, .enigma_blog_thumb_wrapper h2 a, .sub-title, .enigma_footer_widget_title, .enigma_sidebar_widget_title h2 {
			font-family: ' . get_theme_mod( 'theme_title', 'Open Sans' ) . ';
		}

		.head-contact-info li a,
		.enigma_blog_thumb_wrapper p, 
		.enigma_blog_thumb_date li, 
		.enigma_header_breadcrum_title h1, 
		.breadcrumb li a, .breadcrumb li, 
		.enigma_fuul_blog_detail_padding h2, 
		.enigma_fuul_blog_detail_padding p, 
		.enigma_comment_form_section h2, 
		.enigma_comment_form_section label, 
		.enigma_comment_form_section p,
		.enigma_comment_form_section a,
		.logged_in_as p, .enigma_blog_comment a,
		.enigma_blog_post_content p, 
		.enigma_comment_title h3, 
		.enigma_comment_detail_title, 
		.enigma_comment_date, 
		.enigma_comment_detail p, 
		.reply a, .enigma_blog_read_btn,
		.enigma_cotact_form_div p,
		 label, .enigma_con_input_control, 
		 .enigma_contact_info li .text, 
		 .enigma_contact_info li .desc, 
		 .enigma_send_button, #enigma_send_button, .enigma_home_portfolio_caption h3 a,
		 .enigma_service_detail h3 a, .enigma_service_detail p, 
		 .carousel-list li,
		.carousel-text .enigma_blog_read_btn,
		.pos, .error_404 p,
		.long h3, .enigma_testimonial_area p, h3, span,
		.enigma_footer_area p,
		.enigma_callout_area p, .enigma_callout_area a,
		.enigma_footer_widget_column ul li a, .enigma_footer_widget_column .textwidget
		.enigma_sidebar_widget_title h2,
		.enigma_sidebar_link p a, .enigma_sidebar_widget ul li a
		{
			font-family: ' . get_theme_mod( 'font_description', 'Open Sans' ) . ';
		}';

	$output .= ".swiper-slide-active .animation.animated-item-2 {
	    animation: 1200ms linear 900ms normal both 1 running " . get_theme_mod( 'animate_type_title' ) . ";
	    }
	.swiper-slide-active .animation.animated-item-3 {
	  animation: 1200ms linear 900ms normal both 1 running " . get_theme_mod( 'animate_type_desc' ) . ";
	  }";

	if ( get_theme_mod( 'slider_home', 1 ) != 1 ) {
		$output .= ".service__section{
			padding-top:240px !important;
		}";
	}

	if ( get_theme_mod( 'slider_home', 1 ) != 1 && get_theme_mod( 'service_home', 1 ) != 1 ) {
		$output .= ".portfolio__section{
			padding-top:240px !important;
		}";
	}

	if ( get_theme_mod( 'slider_home', 1 ) != 1 && get_theme_mod( 'service_home', 1 ) != 1 && get_theme_mod( 'portfolio_home', 1 ) != 1 ) {
		$output .= ".enigma_blog_area{
			padding-top:240px !important;
			border-top:0px solid !important;
		}";
	}

	if ( get_theme_mod( 'slider_home', 1 ) != 1 && get_theme_mod( 'service_home', 1 ) != 1 && get_theme_mod( 'portfolio_home', 1 ) != 1 && get_theme_mod( 'show_testimonial', 1 ) != 1 ) {
		$output .= ".enigma_team_section{
			padding-top:240px !important;
			border-top:0px solid !important;
		}";
	}

	if ( get_theme_mod( 'slider_home', 1 ) != 1 && get_theme_mod( 'service_home', 1 ) != 1 && get_theme_mod( 'portfolio_home', 1 ) != 1 && get_theme_mod( 'show_blog', 1 ) != 1 && get_theme_mod( 'show_team', 1 ) != 1 ) {
		$output .= ".enigma_callout_area{
			padding-top:240px !important;
			border-top:0px solid !important;
		}";
	}

	//custom css
	if ( ! empty ( get_theme_mod( 'custom_css' ) ) ) {
		$output .= get_theme_mod( 'custom_css' ) . "\n";
	}

	wp_register_style( 'custom-header-style', false );
	wp_enqueue_style( 'custom-header-style', get_template_directory_uri() . '/css/custom-header-style.css' );
	wp_add_inline_style( 'custom-header-style', $output );
}

/**
 * display notice
 **/
global $pagenow;
if ( $pagenow == 'themes.php' && is_admin() ) :
	if ( get_option( 'enigma_notice_dismiss_notice' ) != true ) {
		add_action( 'admin_notices', 'enigma_parallax_activation_notice' );
		add_action( 'admin_enqueue_scripts', 'enigma_admin_notice_assets' );
	}
endif;

function enigma_admin_notice_assets() {
	wp_enqueue_style( 'enigma_admin_notice', get_template_directory_uri() . '/css/admin-notice.css' );
}

function enigma_parallax_activation_notice() {
	$my_theme = wp_get_theme();
	?>
    <div class="enigma-notice updated notice notice-success updated my-dismiss-notice is-dismissible">
        <div class="hello-elementor-notice-inner">
            <div class="hello-elementor-notice-content">
                <h3> <?php _e( 'Thank you for installing', 'enigma-parallax' ); ?><?php echo $my_theme->get( 'Name' ); ?></h3>
				<?php
				$msg = sprintf( '<p> %1$s %2$s <span style="color:#f8aa30">&#9733;</span><span style="color:#f8aa30">&#9733;</span><span style="color:#f8aa30">&#9733;</span><span style="color:#f8aa30">&#9733;</span><span style="color:#f8aa30">&#9733;</span> %3$s <span style="color:red">&hearts;</span>  %4$s <br><a href=%5$s target="_blank"  style="text-decoration: none; margin-left:10px;" class="button button-primary"> %6$s </a>
				 	<a href=%7$s target="_blank"  style="text-decoration: none; margin-left:10px;" class="button button-primary">%8$s</a>
				 	<a href=%9$s style="text-decoration: none; margin-left:10px;" class="button button-primary">%10$s</a>
				 	</p>',
					esc_html__( ' If you like this ', 'enigma-parallax' ),
					esc_html__( ' theme, please leave us a ', 'enigma-parallax' ),
					esc_html__( ' Rating ', 'enigma-parallax' ),
					esc_html__( ' Big thanks in advance. ', 'enigma-parallax' ),
					esc_url( enigma_parallax_THEME_REVIEW_URL ),
					esc_html__( 'Rate', 'enigma-parallax' ),
					esc_url( enigma_parallax_THEME_URL ),
					esc_html__( 'Go Pro Version', 'enigma-parallax' ),
					esc_url( admin_url( '/themes.php?page=enigma-parallax' ) ),
					esc_html__( 'About Theme', 'enigma-parallax' ) );
				echo wp_kses_post( $msg );
				?>
            </div>
            <div class="restore-notice border-two">
                <p>
                    <b><?php _e( 'Recentely we update our theme Code ( according to wordpress guidelines ).', 'enigma-parallax' ); ?></b>
                </p>
                <p><?php _e( 'By this your data will be reset for homepage, but you can restore it and get back your homepage same as previous.', 'enigma-parallax' ); ?></p>
                <p><?php _e( 'Just click ', 'enigma-parallax' ) . ' ' . wp_kses_post( '<a href="' . admin_url( 'admin.php?page=enigma-parallax#home' ) . '">here</a> ' ) . '' . _e( 'and follow the steps.!!.', 'enigma-parallax' ); ?></p>
            </div>
        </div>
        <button type="button" class="notice-dismiss">
            <span class="screen-reader-text">Dismiss this notice.</span>
        </button>
    </div>
<?php }

add_action( 'admin_enqueue_scripts', 'enigma_notice_add_script' );
function enigma_notice_add_script() {
	wp_register_script( 'notice-update', get_template_directory_uri() . '/js/update-notice.js', '', '1.0', false );
	wp_localize_script( 'notice-update', 'notice_params', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
	) );
	wp_enqueue_script( 'notice-update' );
}

add_action( 'wp_ajax_enigma_dismiss_notice', 'enigma_notice_dismiss_notice' );
function enigma_notice_dismiss_notice() {
	update_option( 'enigma_notice_dismiss_notice', true );
}