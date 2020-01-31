<?php 
	function enigma_parallax_scripts() {      
		
		wp_enqueue_style('enigma-parallax-style-sheet', get_stylesheet_uri());
		wp_enqueue_style('enigma-parallax-bootstrap', get_template_directory_uri() .'/css/bootstrap.css');
		wp_enqueue_style('enigma-parallax-default', get_template_directory_uri() . '/css/default.css');
		wp_enqueue_style('enigma-parallax-theme', get_template_directory_uri() . '/css/enigma-theme.css');
		wp_enqueue_style('enigma-parallax-media-responsive', get_template_directory_uri() . '/css/media-responsive.css');
		wp_enqueue_style('enigma-parallax-animations', get_template_directory_uri() . '/css/animations.css');
		wp_enqueue_style('enigma-parallax-theme-animtae', get_template_directory_uri() . '/css/theme-animate.css');
		wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome-5.8.1/css/all.css');
		wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome-5.8.1/css/fontawesom.css');
		wp_enqueue_style('font-awesome-470', get_template_directory_uri(). '/css/font-awesome-4.7.0/css/font-awesome.css');
		wp_enqueue_style('enigma-parallax-swiper', get_template_directory_uri() .'/css/swiper.min.css'); 

		wp_enqueue_style('enigma-parallax-OpenSansRegular','//fonts.googleapis.com/css?family=Open+Sans');
		wp_enqueue_style('enigma-parallax-OpenSansBold','//fonts.googleapis.com/css?family=Open+Sans:700');
		wp_enqueue_style('enigma-parallax-OpenSansSemiBold','//fonts.googleapis.com/css?family=Open+Sans:600');
		wp_enqueue_style('enigma-parallax-RobotoRegular','//fonts.googleapis.com/css?family=Roboto');
		wp_enqueue_style('enigma-parallax-RobotoBold','//fonts.googleapis.com/css?family=Roboto:700');
		wp_enqueue_style('enigma-parallax-RalewaySemiBold','//fonts.googleapis.com/css?family=Raleway:600');
		wp_enqueue_style('enigma-parallax-Courgette','//fonts.googleapis.com/css?family=Courgette');
		
		$font_var = '300,400,600,700,900,300italic,400italic,600italic,700italic,900italic';
		$http     = (!empty($_SERVER['HTTPS'])) ? "https" : "http";
	
		$font_title = str_replace(' ' , '+', get_theme_mod( 'font_title', 'Open Sans' ) );
		wp_enqueue_style('googleFonts', $http . '://fonts.googleapis.com/css?family=' . $font_title . ':' . $font_var);

		$header_menu_link = str_replace(' ' , '+', get_theme_mod( 'header_menu_link', 'Open Sans' ) );
		wp_enqueue_style('header_menu_link', $http . '://fonts.googleapis.com/css?family=' . $header_menu_link . ':' . $font_var);

		$theme_title = str_replace(' ' , '+', get_theme_mod( 'theme_title', 'Open Sans' ) );
		wp_enqueue_style('theme_title', $http . '://fonts.googleapis.com/css?family=' . $theme_title . ':' . $font_var);

		$font_description = str_replace(' ' , '+', get_theme_mod( 'font_description', 'Open Sans' ) );
		wp_enqueue_style('font_description', $http . '://fonts.googleapis.com/css?family=' . $font_description . ':' . $font_var);
		
		// Js
		wp_enqueue_script('enigma-parallax-menu', get_template_directory_uri() .'/js/menu.js', array('jquery'), true, true );
		wp_enqueue_script('popper-js', get_template_directory_uri() .'/js/popper.js', array('jquery'), true, true );
		wp_enqueue_script('enigma-parallax-bootstrap-js', get_template_directory_uri() .'/js/bootstrap.js', array('jquery'), true, true );
		wp_enqueue_script('enigma-parallax-enigma-theme-script', get_template_directory_uri() .'/js/enigma-theme-script.js', array('jquery'), true, true );

		// if ( is_front_page() ) {
			/*Carofredsul Slides*/
			wp_enqueue_script('enigma-parallax-carouFredSel', get_template_directory_uri() .'/js/carouFredSel-6.2.1/jquery.carouFredSel-6.2.1.js', array('jquery'), true, true );
			wp_enqueue_script('enigma-parallax-carouFredSel-element', get_template_directory_uri() .'/js/carouFredSel-6.2.1/caroufredsel-element.js', array('jquery'), true, true );
			wp_enqueue_script('enigma-parallax-swiper', get_template_directory_uri() .'/js/swiper.js', array('jquery'), true, true );

			/*PhotoBox JS*/
			wp_enqueue_script('enigma-parallax-photobox-js', get_template_directory_uri() .'/js/jquery.photobox.js', array('jquery'), true, true );
			wp_enqueue_style('enigma-parallax-photobox', get_template_directory_uri() . '/css/photobox.css', array('jquery'), true, true );
			
			//Footer JS//
			wp_enqueue_script('enigma-parallax-footer-script', get_template_directory_uri() .'/js/enigma-footer-script.js', array('jquery'), true, true );	
		// }

		wp_enqueue_script('enigma-parallax-waypoints', get_template_directory_uri() .'/js/waypoints.js', array('jquery'), true, true );				
		wp_enqueue_script('enigma-parallax-scroll', get_template_directory_uri() .'/js/scroll.js', array('jquery'), true, true );
		wp_enqueue_script('enigma-parallax-scroll', get_template_directory_uri() .'/js/enigma-scroll.js', array('jquery'), true, true );
		if ( is_singular() ) wp_enqueue_script( "comment-reply" );

		if ( ! empty ( get_theme_mod('slider_image_speed' ) ) ) {
                $image_speed = get_theme_mod( 'slider_image_speed', '1000' );
                $speed       = true;
        } else {
                $image_speed = '';
                $speed       = false;
        }

        $ajax_data = array(
                'blog_speed'    => get_theme_mod( 'blog_speed', '2000' ),
                'autoplay'      => get_theme_mod( 'autoplay', 1 ),
                'image_speed'   => $image_speed,
                'sticky_header' => get_theme_mod( 'sticky_header', 1 ),
                'speed'         => $speed,
        );

        wp_enqueue_script( 'enigma-ajax-front', get_template_directory_uri() . '/js/frontend-ajax.js', array( 'jquery' ), true, true );
        wp_localize_script( 'enigma-ajax-front', 'ajax_admin', array(
                'ajax_url'      => admin_url( 'admin-ajax.php' ),
                'admin_nonce'   => wp_create_nonce( 'admin_ajax_nonce' ),
                'ajax_data'     => $ajax_data,
        ) );
	}
	add_action('wp_enqueue_scripts', 'enigma_parallax_scripts');
	
	function enigma_parallax_upload_scripts() {
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('upload-media-widget', get_template_directory_uri(). '/js/upload-media.js', array('jquery'));
        wp_enqueue_style('thickbox');
    }
	add_action('admin_enqueue_scripts', 'enigma_parallax_upload_scripts');