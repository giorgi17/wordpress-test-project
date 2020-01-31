<?php
/**
 * Enigma Parallax Theme Customizer
 *
 * @package enigma-parallax
 */

function enigma_parallax_customizer_styles() {
	wp_enqueue_style( 'enigma-parallax-customizr', get_template_directory_uri() . '/css/customizr.css' );
	wp_enqueue_style( 'FA', get_template_directory_uri() . '/css/font-awesome-5.8.1/css/fontawesome.css' );
}

add_action( 'customize_controls_print_styles', 'enigma_parallax_customizer_styles', 999 );

add_action( 'customize_register', 'enigma_parallax_customizer' );
function enigma_parallax_customizer( $wp_customize ) {

	$ImageUrl1 = get_template_directory_uri() . "/images/1.jpg";
	$ImageUrl2 = get_template_directory_uri() . "/images/2.jpg";
	$ImageUrl3 = get_template_directory_uri() . "/images/3.jpg";

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.logo h1',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.logo p',
	) );

	/* General section */
	$wp_customize->add_panel(
		'enigma_theme_option',
		array(
			'title'    => __( 'Theme Options', 'enigma-parallax' ),
			'priority' => 1, // Mixed with top-level-section hierarchy.
		)
	);

	$wp_customize->add_section(
		'general_sec',
		array(
			'title'       => __( 'Theme General Options', 'enigma-parallax' ),
			'description' => __( 'Here you can customize Your theme\'s general Settings', 'enigma-parallax' ),
			'panel'       => 'enigma_theme_option',
			'capability'  => 'edit_theme_options',
			'priority'    => 35,
		)
	);

	$wp_customize->add_setting(
		'sticky_header',
		array(
			'type'              => 'theme_mod',
			'default'           => 1,
			'sanitize_callback' => 'enigma_parallax_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		'sticky_header',
		array(
			'label'    => __( 'Sticky Header On/Off', 'enigma-parallax' ),
			'type'     => 'checkbox',
			'section'  => 'general_sec',
			'settings' => 'sticky_header',
		)
	);

	$wp_customize->add_setting(
		'snoweffect',
		array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'enigma_parallax_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		'snoweffect',
		array(
			'label'    => __( 'Snow effect on/off ,Reload to view effect', 'enigma-parallax' ),
			'type'     => 'checkbox',
			'section'  => 'general_sec',
			'settings' => 'snoweffect',
		)
	);

	// logo height width //
	$wp_customize->add_setting(
		'logo_height',
		array(
			'type'              => 'theme_mod',
			'default'           => '55',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize,
		'logo_height', array(
			'type'        => 'range-value',
			'section'     => 'general_sec',
			'settings'    => 'logo_height',
			'label'       => __( 'Logo Height', 'enigma-parallax' ),
			'input_attrs' => array(
				'min'    => 1,
				'max'    => 500,
				'step'   => 1,
				'suffix' => 'px', //optional suffix
			),
		)
	) );

	$wp_customize->add_setting(
		'logo_width',
		array(
			'type'              => 'theme_mod',
			'default'           => '150',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize,
		'logo_width',
		array(
			'type'        => 'range-value',
			'section'     => 'general_sec',
			'settings'    => 'logo_width',
			'label'       => __( 'Logo Width', 'enigma-parallax' ),
			'input_attrs' => array(
				'min'    => 1,
				'max'    => 500,
				'step'   => 1,
				'suffix' => 'px', //optional suffix
			),
		)
	) );
	// logo height width //

	$wp_customize->add_section(
		'search_sec',
		array(
			'title'       => __( 'Search Box', 'enigma-parallax' ),
			'description' => __( 'Here you can Select Search Box in header', 'enigma-parallax' ),
			'panel'       => 'enigma_theme_option',
			'capability'  => 'edit_theme_options',
			'priority'    => 35,
		)
	);

	$wp_customize->add_setting(
		'search_box',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'enigma_parallax_sanitize_checkbox',
			'capability'        => 'edit_theme_options'
		)
	);

	$wp_customize->add_control(
		'search_box',
		array(
			'label'    => __( 'Enable Search Box', 'enigma-parallax' ),
			'type'     => 'checkbox',
			'section'  => 'search_sec',
			'settings' => 'search_box'
		)
	);

	/*navigation option*/
	$wp_customize->add_setting(
		'side_menu_option',
		array(
			'sanitize_callback' => 'enigma_parallax_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
			'default'           => 'both_id',
		)
	);

	$wp_customize->add_control(
		'side_menu',
		array(
			'label'    => __( 'Display  sidemenu', 'enigma-parallax' ),
			'type'     => 'select',
			'section'  => 'general_sec',
			'settings' => 'side_menu_option',
			'choices'  => array(
				'both'    => 'Main Menu With Side Menu',
				'both_id' => 'Main Menu + Side Menu(Default)',
				'side'    => 'Side',
				'side_id' => 'Side Menu(Internal Linked) ',
				'main'    => 'Main'
			),
		)
	);
	/*navigation option*/

	$wp_customize->add_setting(
		'title_position',
		array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'enigma_parallax_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		'title_position',
		array(
			'label'    => __( 'Show Site Title in Center', 'enigma-parallax' ),
			'type'     => 'checkbox',
			'section'  => 'general_sec',
			'settings' => 'title_position',
		)
	);

	$wp_customize->add_setting(
		'breadcrumb',
		array(
			'type'              => 'theme_mod',
			'default'           => 1,
			'sanitize_callback' => 'enigma_parallax_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		'breadcrumb',
		array(
			'label'    => __( 'Enable Breadcrumb', 'enigma-parallax' ),
			'type'     => 'checkbox',
			'section'  => 'general_sec',
			'settings' => 'breadcrumb',
		)
	);

	$wp_customize->add_setting(
		'enigma_options_breadcrums_title',
		array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'enigma_parallax_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control(
		'breadcrums_title',
		array(
			'label'    => __( 'Hide Page Title(breadcrums)', 'enigma-parallax' ),
			'type'     => 'checkbox',
			'section'  => 'general_sec',
			'settings' => 'enigma_options_breadcrums_title',
		)
	);

	$wp_customize->add_setting(
		'custom_css',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
		)
	);

	$wp_customize->add_control(
		'custom_css',
		array(
			'label'    => __( 'Custom CSS', 'enigma-parallax' ),
			'type'     => 'textarea',
			'section'  => 'general_sec',
			'settings' => 'custom_css'
		)
	);

	if ( is_child_theme() ) {

		/* Product options */
		$wp_customize->add_section( 'product_section',
			array(
				'title'      => __( "Product Options", 'enigma-parallax' ),
				'panel'      => 'enigma_theme_option',
				'capability' => 'edit_theme_options',
				'priority'   => 35,
			) );

		$wp_customize->add_setting(
			'product_title',
			array(
				'default'           => __( 'Our Products', 'enigma-parallax' ),
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'enigma_parallax_sanitize_text',
			)
		);

		$wp_customize->add_control( 'product_title',
			array(
				'label'    => __( 'Product Title', 'enigma-parallax' ),
				'type'     => 'text',
				'section'  => 'product_section',
				'settings' => 'product_title'
			)
		);
	}

	/* Typography  & Google Font Section */
	$wp_customize->add_section(
		'font_sec',
		array(
			'title'       => __( 'Typography Section', 'enigma-parallax' ),
			'panel'       => 'enigma_theme_option',
			'description' => __( 'Here you can manage your theme font', 'enigma-parallax' ),
			'capability'  => 'edit_theme_options',
			'priority'    => 35,
		)
	);

	$wp_customize->add_setting(
		'font_title',
		array(
			'default'           => 'Open Sans',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options'
		)
	);

	$wp_customize->add_control( new enigma_parallax_Font_Control( $wp_customize,
		'font_title',
		array(
			'label'       => __( 'Header Font Style', 'enigma-parallax' ),
			'description' => __( 'Logo & Tagline Font Family', 'enigma-parallax' ),
			'section'     => 'font_sec',
			'settings'    => 'font_title',
		)
	) );

	$wp_customize->add_setting(
		'header_menu_link',
		array(
			'default'           => 'Open Sans',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options'
		)
	);

	$wp_customize->add_control( new enigma_parallax_Font_Control( $wp_customize,
		'header_menu_link',
		array(
			'label'       => __( 'Header Menu Font', 'enigma-parallax' ),
			'description' => __( 'Header Menu Font Family', 'enigma-parallax' ),
			'section'     => 'font_sec',
			'settings'    => 'header_menu_link',
		)
	) );

	$wp_customize->add_setting(
		'theme_title',
		array(
			'default'           => 'Open Sans',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options'
		)
	);

	$wp_customize->add_control( new enigma_parallax_Font_Control( $wp_customize,
		'theme_title',
		array(
			'label'       => __( 'Theme Heading Title', 'enigma-parallax' ),
			'description' => __( 'Change Theme Title Font Family', 'enigma-parallax' ),
			'section'     => 'font_sec',
			'settings'    => 'theme_title',
		)
	) );

	$wp_customize->add_setting(
		'font_description',
		array(
			'default'           => 'Open Sans',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options'
		)
	);

	$wp_customize->add_control( new enigma_parallax_Font_Control( $wp_customize, 'font_description', array(
		'label'       => __( 'Font Family For Theme', 'enigma-parallax' ),
		'description' => '',
		'section'     => 'font_sec',
		'settings'    => 'font_description',
	) ) );

	/* Slider options */
	$wp_customize->add_section(
		'slider_sec',
		array(
			'title'           => __( 'Theme Slider Options', 'enigma-parallax' ),
			'panel'           => 'enigma_theme_option',
			'description'     => __( 'Here you can add slider images', 'enigma-parallax' ),
			'capability'      => 'edit_theme_options',
			'priority'        => 35,
			'active_callback' => 'is_front_page',
		)
	);

	//  =============================
	//  = Select Box                =
	//  =============================
	$wp_customize->add_setting(
		'slider_choise',
		array(
			'default'           => '1',
			'capability'        => 'edit_theme_options',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
		)
	);

	$wp_customize->add_control(
		'slider_select_box',
		array(
			'settings' => 'slider_choise',
			'label'    => __( 'Select Something:', 'enigma-parallax' ),
			'section'  => 'slider_sec',
			'type'     => 'select',
			'choices'  => array(
				'1' => 'Carousel Slider',
				'2' => 'Touch Slider',
			),
		)
	);

	$wp_customize->add_setting(
		'slider_image_speed',
		array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		'enigma_slider_speed',
		array(
			'label'       => __( 'Slider Speed Option', 'enigma-parallax' ),
			'description' => __( 'Enter value in milliseconds( Multiple of 1000 )', 'enigma-parallax' ),
			'type'        => 'text',
			'section'     => 'slider_sec',
			'settings'    => 'slider_image_speed',
		)
	);

	$wp_customize->add_setting(
		'animate_type_title',
		array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control( new enigma_animation( $wp_customize,
			'animate_type_title',
			array(
				'label'    => __( 'Animation for Slider Title', 'enigma-parallax' ),
				'type'     => 'select',
				'section'  => 'slider_sec',
				'settings' => 'animate_type_title',
			)
		)
	);

	$wp_customize->add_setting(
		'animate_type_desc',
		array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control( new enigma_animation( $wp_customize,
		'animate_type_desc',
		array(
			'label'    => __( 'Animation for Slider Description', 'enigma-parallax' ),
			'type'     => 'select',
			'section'  => 'slider_sec',
			'settings' => 'animate_type_desc',
		)
	) );


	$wp_customize->add_setting(
		'slider_home',
		array(
			'type'              => 'theme_mod',
			'default'           => 1,
			'sanitize_callback' => 'enigma_parallax_sanitize_checkbox',
			'capability'        => 'edit_theme_options'
		)
	);

	$wp_customize->add_control(
		'enigma_show_slider',
		array(
			'label'    => __( 'Enable Slider on Home', 'enigma-parallax' ),
			'type'     => 'checkbox',
			'section'  => 'slider_sec',
			'settings' => 'slider_home'
		)
	);

	$wp_customize->add_setting(
		'slide_image_1',
		array(
			'type'              => 'theme_mod',
			'default'           => esc_url( $ImageUrl1 ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_setting(
		'slide_image_2',
		array(
			'type'              => 'theme_mod',
			'default'           => esc_url( $ImageUrl2 ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_setting(
		'slide_image_3',
		array(
			'type'              => 'theme_mod',
			'default'           => esc_url( $ImageUrl3 ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',

		)
	);

	$wp_customize->add_setting(
		'slide_title_1',
		array(
			'type'              => 'theme_mod',
			'default'           => __( 'Contrary to popular ', 'enigma-parallax' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',

		)
	);

	$wp_customize->add_setting(
		'slide_title_2',
		array(
			'type'              => 'theme_mod',
			'default'           => __( 'variations of passages', 'enigma-parallax' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',

		)
	);

	$wp_customize->add_setting(
		'slide_title_3',
		array(
			'type'              => 'theme_mod',
			'default'           => __( 'Contrary to popular ', 'enigma-parallax' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',

		)
	);

	$wp_customize->add_setting(
		'slide_desc_1',
		array(
			'default'           => __( 'Lorem Ipsum is simply dummy text of the printing', 'enigma-parallax' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',

		)
	);

	$wp_customize->add_setting(
		'slide_desc_2',
		array(
			'default'           => __( 'Lorem Ipsum is simply dummy text of the printing', 'enigma-parallax' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',

		)
	);

	$wp_customize->add_setting(
		'slide_desc_3',
		array(
			'default'           => __( 'Lorem Ipsum is simply dummy text of the printing', 'enigma-parallax' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',

		)
	);

	$wp_customize->add_setting(
		'slide_btn_text_1',
		array(
			'type'              => 'theme_mod',
			'default'           => __( 'Read More', 'enigma-parallax' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',

		)
	);

	$wp_customize->add_setting(
		'slide_btn_text_2',
		array(
			'type'              => 'theme_mod',
			'default'           => __( 'Read More', 'enigma-parallax' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',

		)
	);

	$wp_customize->add_setting(
		'slide_btn_text_3',
		array(
			'type'              => 'theme_mod',
			'default'           => __( 'Read More', 'enigma-parallax' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',

		)
	);

	$wp_customize->add_setting(
		'slide_btn_link_1',
		array(
			'type'              => 'theme_mod',
			'default'           => '#',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',

		)
	);

	$wp_customize->add_setting(
		'slide_btn_link_2',
		array(
			'type'              => 'theme_mod',
			'default'           => '#',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',

		)
	);

	$wp_customize->add_setting(
		'slide_btn_link_3',
		array(
			'type'              => 'theme_mod',
			'default'           => '#',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',

		)
	);

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
		'enigma_slider_image_1',
		array(
			'label'    => __( 'Slider Image One', 'enigma-parallax' ),
			'section'  => 'slider_sec',
			'settings' => 'slide_image_1'
		)
	) );

	$wp_customize->add_control(
		'enigma_slide_title_1',
		array(
			'label'    => __( 'Slider title one', 'enigma-parallax' ),
			'type'     => 'text',
			'section'  => 'slider_sec',
			'settings' => 'slide_title_1'
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'slide_title_1',
		array(
			'selector' => '.carousel-text .head_1',
		)
	);

	$wp_customize->add_control( new One_Page_Editor( $wp_customize,
		'slide_desc_1',
		array(
			'label'                      => __( 'Slider Description One', 'enigma-parallax' ),
			'active_callback'            => 'show_on_front',
			'include_admin_print_footer' => true,
			'section'                    => 'slider_sec',
			'settings'                   => 'slide_desc_1'
		)
	) );

	$wp_customize->selective_refresh->add_partial(
		'slide_desc_1',
		array(
			'selector' => '.desc_1',
		)
	);

	$wp_customize->add_control(
		'Slider button one',
		array(
			'label'    => __( 'Slider Button Text One', 'enigma-parallax' ),
			'type'     => 'text',
			'section'  => 'slider_sec',
			'settings' => 'slide_btn_text_1'
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'slide_btn_text_1',
		array(
			'selector' => '.rdm_1',
		)
	);

	$wp_customize->add_control(
		'enigma_slide_btnlink_1',
		array(
			'label'    => __( 'Slider Button Link One', 'enigma-parallax' ),
			'type'     => 'url',
			'section'  => 'slider_sec',
			'settings' => 'slide_btn_link_1'
		)
	);

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
			'enigma_slider_image_2',
			array(
				'label'    => __( 'Slider Image Two ', 'enigma-parallax' ),
				'section'  => 'slider_sec',
				'settings' => 'slide_image_2'
			)
		)
	);

	$wp_customize->add_control(
		'enigma_slide_title_2',
		array(
			'label'    => __( 'Slider Title Two', 'enigma-parallax' ),
			'type'     => 'text',
			'section'  => 'slider_sec',
			'settings' => 'slide_title_2'
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'slide_title_2',
		array(
			'selector' => '.carousel-text .head_2',
		)
	);


	$wp_customize->add_control( new One_Page_Editor( $wp_customize,
		'slide_desc_2',
		array(
			'label'                      => __( 'Slider Description Two', 'enigma-parallax' ),
			'active_callback'            => 'show_on_front',
			'include_admin_print_footer' => true,
			'section'                    => 'slider_sec',
			'settings'                   => 'slide_desc_2'
		)
	) );

	$wp_customize->selective_refresh->add_partial(
		'slide_desc_2',
		array(
			'selector' => '.desc_2',
		)
	);

	$wp_customize->add_control(
		'enigma_slide_btn_2',
		array(
			'label'    => __( 'Slider Button Text Two', 'enigma-parallax' ),
			'type'     => 'text',
			'section'  => 'slider_sec',
			'settings' => 'slide_btn_text_2'
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'slide_btn_text_2',
		array(
			'selector' => '.rdm_2',
		)
	);

	$wp_customize->add_control( 'enigma_slide_btnlink_2', array(
		'label'    => __( 'Slider Button Link Two', 'enigma-parallax' ),
		'type'     => 'url',
		'section'  => 'slider_sec',
		'settings' => 'slide_btn_link_2'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'enigma_slider_image_3', array(
		'label'    => __( 'Slider Image Three', 'enigma-parallax' ),
		'section'  => 'slider_sec',
		'settings' => 'slide_image_3'
	) ) );

	$wp_customize->add_control( 'enigma_slide_title_3', array(
		'label'    => __( 'Slider Title Three', 'enigma-parallax' ),
		'type'     => 'text',
		'section'  => 'slider_sec',
		'settings' => 'slide_title_3'
	) );

	$wp_customize->selective_refresh->add_partial( 'slide_title_3', array(
		'selector' => '.carousel-text .head_3',
	) );

	$wp_customize->add_control( new One_Page_Editor( $wp_customize,
		'slide_desc_3',
		array(
			'label'                      => __( 'Slider Description Three', 'enigma-parallax' ),
			'active_callback'            => 'show_on_front',
			'include_admin_print_footer' => true,
			'section'                    => 'slider_sec',
			'settings'                   => 'slide_desc_3'
		) ) );

	$wp_customize->selective_refresh->add_partial( 'slide_desc_3', array(
		'selector' => '.desc_3',
	) );

	$wp_customize->add_control( 'enigma_slide_btn_3', array(
		'label'    => __( 'Slider Button Text Three', 'enigma-parallax' ),
		'type'     => 'text',
		'section'  => 'slider_sec',
		'settings' => 'slide_btn_text_3'
	) );
	$wp_customize->selective_refresh->add_partial( 'slide_btn_text_3', array(
		'selector' => '.rdm_3',
	) );
	$wp_customize->add_control( 'enigma_slide_btnlink_3', array(
		'label'    => __( 'Slider Button Link Three', 'enigma-parallax' ),
		'type'     => 'url',
		'section'  => 'slider_sec',
		'settings' => 'slide_btn_link_3'
	) );

	/* Service Options */
	$wp_customize->add_section( 'service_section', array(
		'title'           => __( "Service Options", 'enigma-parallax' ),
		'panel'           => 'enigma_theme_option',
		'capability'      => 'edit_theme_options',
		'priority'        => 35,
		'active_callback' => 'is_front_page',
	) );

	$wp_customize->add_setting(
		'services_home',
		array(
			'type'              => 'theme_mod',
			'default'           => 1,
			'sanitize_callback' => 'enigma_parallax_sanitize_checkbox',
			'capability'        => 'edit_theme_options'
		)
	);

	$wp_customize->add_control( 'enigma_show_service', array(
		'label'    => __( 'Enable Services on Home', 'enigma-parallax' ),
		'type'     => 'checkbox',
		'section'  => 'service_section',
		'settings' => 'services_home'
	) );

	$wp_customize->add_setting(
		'home_service_heading',
		array(
			'default'           => __( 'Our Services', 'enigma-parallax' ),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',

		)
	);

	$wp_customize->add_control( 'home_service_heading', array(
		'label'    => __( 'Home Service Title', 'enigma-parallax' ),
		'type'     => 'text',
		'section'  => 'service_section',
		'settings' => 'home_service_heading'
	) );

	$wp_customize->selective_refresh->add_partial( 'home_service_heading', array(
		'selector' => '.enigma_service .enigma_heading_title h3',
	) );

	$wp_customize->add_setting(
		'service_1_icons',
		array(
			'default'           => 'fa-google',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',

		)
	);
	$wp_customize->add_setting(
		'service_2_icons',
		array(
			'default'           => 'fa-database',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',

		)
	);
	$wp_customize->add_setting(
		'service_3_icons',
		array(
			'default'           => 'fa-wordpress',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',

		)
	);
	$wp_customize->add_setting(
		'service_1_title',
		array(
			'default'           => __( "Idea", 'enigma-parallax' ),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
		)
	);
	$wp_customize->add_setting(
		'service_2_title',
		array(
			'default'           => __( 'Records', 'enigma-parallax' ),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_parallax_sanitize_text'
		)
	);
	$wp_customize->add_setting(
		'service_3_title',
		array(
			'default'           => __( "WordPress", 'enigma-parallax' ),
			'type'              => 'theme_mod',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
		'service_1_text',
		array(
			'default'           => __( "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.", 'enigma-parallax' ),
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
		'service_2_text',
		array(
			'default'           => __( "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.", 'enigma-parallax' ),
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
		'service_3_text',
		array(
			'default'           => __( "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.", 'enigma-parallax' ),
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
		'service_1_link',
		array(
			'default'           => '#',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
		'service_2_link',
		array(
			'default'           => '#',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
		'service_3_link',
		array(
			'default'           => '#',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new enigma_parallax_Customize_Misc_Control(
			$wp_customize,
			'service_options1-line',
			array(
				'section' => 'service_section',
				'type'    => 'line'
			)
		) );

	$wp_customize->add_control( 'service_one_title', array(
		'label'    => __( 'Service One Title', 'enigma-parallax' ),
		'type'     => 'text',
		'section'  => 'service_section',
		'settings' => 'service_1_title'
	) );
	$wp_customize->selective_refresh->add_partial( 'service_1_title', array(
		'selector' => '.enigma_service_detail .head_1',
	) );
	$wp_customize->add_control( new Enigma_Customizer_Icon_Picker_Control( $wp_customize, 'service_1_icons',
		array(
			'label'       => __( 'Service Icon One', 'enigma-parallax' ),
			'description' => wp_kses_post( '<a href="http://fontawesome.bootstrapcheatsheets.com">FontAwesome Icons</a>', 'enigma-parallax' ),
			'section'     => 'service_section',
			'type'        => 'text',
			'settings'    => 'service_1_icons'
		)
	) );

	$wp_customize->add_control( new One_Page_Editor( $wp_customize, 'service_1_text', array(
		'label'                      => __( 'Service One Text', 'enigma-parallax' ),
		'active_callback'            => 'show_on_front',
		'include_admin_print_footer' => true,
		'section'                    => 'service_section',
		'settings'                   => 'service_1_text'
	) ) );

	$wp_customize->add_control( 'service_one_link', array(
		'label'    => __( 'Service One Link', 'enigma-parallax' ),
		'type'     => 'text',
		'section'  => 'service_section',
		'settings' => 'service_1_link'
	) );

	$wp_customize->add_control( 'service_one_links', array(
		'label'    => __( 'Service One Button Link', 'enigma-parallax' ),
		'type'     => 'text',
		'section'  => 'service_section',
		'settings' => 'service_1_links'
	) );

	$wp_customize->add_control(
		new enigma_parallax_Customize_Misc_Control(
			$wp_customize,
			'service_options2-line',
			array(
				'section' => 'service_section',
				'type'    => 'line'
			)
		) );

	$wp_customize->add_control( 'service_two_title', array(
		'label'    => __( 'Service Two Title', 'enigma-parallax' ),
		'type'     => 'text',
		'section'  => 'service_section',
		'settings' => 'service_2_title'
	) );

	$wp_customize->selective_refresh->add_partial( 'service_2_title', array(
		'selector' => '.enigma_service_detail .head_2',
	) );

	$wp_customize->add_control( new Enigma_Customizer_Icon_Picker_Control( $wp_customize, 'service_2_icons',
		array(
			'label'       => __( 'Service Icon Two', 'enigma-parallax' ),
			'description' => __( '<a href="http://fontawesome.bootstrapcheatsheets.com">FontAwesome Icons</a>', 'enigma-parallax' ),
			'section'     => 'service_section',
			'type'        => 'text',
			'settings'    => 'service_2_icons'
		)
	) );

	$wp_customize->add_control( new One_Page_Editor( $wp_customize, 'service_2_text', array(
		'label'                      => __( 'Service Two Text', 'enigma-parallax' ),
		'active_callback'            => 'show_on_front',
		'include_admin_print_footer' => true,
		'section'                    => 'service_section',
		'settings'                   => 'service_2_text'
	) ) );

	$wp_customize->add_control( 'service_two_link', array(
		'label'    => __( 'Service One Link', 'enigma-parallax' ),
		'type'     => 'text',
		'section'  => 'service_section',
		'settings' => 'service_2_link'
	) );

	$wp_customize->add_control( 'service_two_links', array(
		'label'    => __( 'Service Two Button Link', 'enigma-parallax' ),
		'type'     => 'text',
		'section'  => 'service_section',
		'settings' => 'service_2_links'
	) );

	$wp_customize->add_control( new enigma_parallax_Customize_Misc_Control(
		$wp_customize, 'enigma_service_options3-line',
		array(
			'section' => 'service_section',
			'type'    => 'line'
		)
	) );

	$wp_customize->add_control( 'enigma_service_three_title', array(
		'label'    => __( 'Service Three Title', 'enigma-parallax' ),
		'type'     => 'text',
		'section'  => 'service_section',
		'settings' => 'service_3_title'
	) );

	$wp_customize->selective_refresh->add_partial( 'service_3_title', array(
		'selector' => '.enigma_service_detail .head_3',
	) );

	$wp_customize->add_control( new Enigma_Customizer_Icon_Picker_Control( $wp_customize, 'service_3_icons',
		array(
			'label'       => __( 'Service Icon Three', 'enigma-parallax' ),
			'description' => wp_kses_post( '<a href="http://fontawesome.bootstrapcheatsheets.com">FontAwesome Icons</a>', 'enigma-parallax' ),
			'section'     => 'service_section',
			'type'        => 'text',
			'settings'    => 'service_3_icons'
		)
	) );

	$wp_customize->add_control( new One_Page_Editor( $wp_customize, 'service_3_text', array(
		'label'                      => __( 'Service Three Text', 'enigma-parallax' ),
		'active_callback'            => 'show_on_front',
		'include_admin_print_footer' => true,
		'section'                    => 'service_section',
		'settings'                   => 'service_3_text'
	) ) );


	$wp_customize->add_control( 'service_three_link', array(
		'label'    => __( 'Service One Link', 'enigma-parallax' ),
		'type'     => 'text',
		'section'  => 'service_section',
		'settings' => 'service_3_link'
	) );

	$wp_customize->add_control( 'service_three_links', array(
		'label'    => __( 'Service Three Button Link', 'enigma-parallax' ),
		'type'     => 'text',
		'section'  => 'service_section',
		'settings' => 'service_3_links'
	) );

	/* Portfolio Section */
	$wp_customize->add_section(
		'portfolio_section',
		array(
			'title'       => __( 'Portfolio Options', 'enigma-parallax' ),
			'description' => __( 'Here you can add Portfolio title,description and even portfolios', 'enigma-parallax' ),
			'panel'       => 'enigma_theme_option',
			'capability'  => 'edit_theme_options',
			'priority'    => 35,
		)
	);

	$wp_customize->add_setting(
		'portfolio_home',
		array(
			'type'              => 'theme_mod',
			'default'           => 1,
			'sanitize_callback' => 'enigma_parallax_sanitize_checkbox',
			'capability'        => 'edit_theme_options'
		)
	);
	$wp_customize->add_setting(
		'port_heading',
		array(
			'type'              => 'theme_mod',
			'default'           => __( 'Recent Works', 'enigma-parallax' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
		)
	);

	for ( $i = 1; $i <= 4; $i ++ ) {

		if ( $i == 1 ) {
			$img_link   = get_template_directory_uri() . "/images/home-ppt1.png";
			$port_title = __( 'Bonorum', 'enigma-parallax' );
		} elseif ( $i == 2 ) {
			$img_link   = get_template_directory_uri() . "/images/home-ppt2.png";
			$port_title = __( 'Content', 'enigma-parallax' );
		} elseif ( $i == 3 ) {
			$img_link   = get_template_directory_uri() . "/images/home-ppt3.png";
			$port_title = __( 'dictionary', 'enigma-parallax' );
		} elseif ( $i == 4 ) {
			$img_link   = get_template_directory_uri() . "/images/home-ppt4.png";
			$port_title = __( 'randomised', 'enigma-parallax' );
		}

		$wp_customize->add_setting(
			'port_' . $i . '_img',
			array(
				'type'              => 'theme_mod',
				'default'           => esc_url( $img_link ),
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_setting(
			'port_' . $i . '_title',
			array(
				'type'              => 'theme_mod',
				'default'           => $port_title,
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'enigma_parallax_sanitize_text',
			)
		);

		$wp_customize->add_setting(
			'port_' . $i . '_link',
			array(
				'type'              => 'theme_mod',
				'default'           => '#',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
	}

	$wp_customize->add_setting( 'upload__portfolio_image',
		array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control( 'portfolio_home', array(
		'label'    => __( 'Enable Portfolio on Home', 'enigma-parallax' ),
		'type'     => 'checkbox',
		'section'  => 'portfolio_section',
		'settings' => 'portfolio_home'
	) );
	$wp_customize->add_control( 'port_heading', array(
		'label'    => __( 'Portfolio Heading', 'enigma-parallax' ),
		'type'     => 'text',
		'section'  => 'portfolio_section',
		'settings' => 'port_heading'
	) );

	$wp_customize->selective_refresh->add_partial( 'port_heading', array(
		'selector' => '.enigma_project_section .enigma_heading_title h3',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'enigma_portfolio_img_', array(
		'label'    => __( 'Portfolio Background Image', 'enigma-parallax' ),
		'section'  => 'portfolio_section',
		'settings' => 'upload__portfolio_image',
	) ) );


	for ( $i = 1; $i <= 4; $i ++ ) {
		$j = array( ' One', ' Two', ' Three', ' Four' );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'port_' . $i . '_img', array(
			'label'    => __( 'Portfolio Image ', 'enigma-parallax' ) . $j[ $i - 1 ],
			'section'  => 'portfolio_section',
			'settings' => 'port_' . $i . '_img'
		) ) );
		$wp_customize->add_control( 'port_' . $i . '_title', array(
			'label'    => __( 'Portfolio Title ', 'enigma-parallax' ) . $j[ $i - 1 ],
			'type'     => 'text',
			'section'  => 'portfolio_section',
			'settings' => 'port_' . $i . '_title'
		) );

		$wp_customize->selective_refresh->add_partial( 'port_' . $i . '_title', array(
			'selector' => '.enigma_home_portfolio_caption .port_' . $i,
		) );

		$wp_customize->add_control( 'port_' . $i . '_link', array(
			'label'    => __( 'Portfolio Link ', 'enigma-parallax' ) . $j[ $i - 1 ],
			'type'     => 'url',
			'section'  => 'portfolio_section',
			'settings' => 'port_' . $i . '_link'
		) );
	}

	/* Blog Option */
	$wp_customize->add_section( 'blog_section', array(
		'title'      => __( 'Home Blog Options', 'enigma-parallax' ),
		'panel'      => 'enigma_theme_option',
		'capability' => 'edit_theme_options',
		'priority'   => 35
	) );

	$wp_customize->add_setting(
		'blog_home',
		array(
			'default'           => 1,
			'type'              => 'theme_mod',
			'sanitize_callback' => 'enigma_parallax_sanitize_checkbox',
			'capability'        => 'edit_theme_options'
		)
	);

	$wp_customize->add_control( 'blog_home', array(
		'label'    => __( 'Enable Blog Area in Front Page', 'enigma-parallax' ),
		'type'     => 'checkbox',
		'section'  => 'blog_section',
		'settings' => 'blog_home'
	) );

	$wp_customize->add_setting(
		'blog_title',
		array(
			'type'              => 'theme_mod',
			'default'           => __( 'Latest Blog', 'enigma-parallax' ),
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control( 'blog_title', array(
		'label'    => __( 'Home Blog Title', 'enigma-parallax' ),
		'type'     => 'text',
		'section'  => 'blog_section',
		'settings' => 'blog_title',
	) );

	$wp_customize->selective_refresh->add_partial( 'blog_title', array(
		'selector' => '.enigma_blog_area .enigma_heading_title h3',
	) );

	$wp_customize->add_setting(
		'upload__blog_image',
		array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'upload__blog_image', array(
		'label'    => __( 'Blog Background Image', 'enigma-parallax' ),
		'section'  => 'blog_section',
		'settings' => 'upload__blog_image',
	) ) );

	$wp_customize->add_setting( 'blog_speed', array(
			'type'              => 'theme_mod',
			'default'           => '2000',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'blog_speed', array(
		'label'       => __( 'Blog Speed Option', 'enigma-parallax' ),
		'description' => 'Value will be in milliseconds',
		'type'        => 'text',
		'section'     => 'blog_section',
		'settings'    => 'blog_speed',
	) );

	$wp_customize->add_setting( 'blog_category',
		array(
			'type'              => 'theme_mod',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control( new enigma_parallaxcategory_Control( $wp_customize, 'blog_category', array(
		'label'    => __( 'Blog Category', 'enigma-parallax' ),
		'type'     => 'select',
		'section'  => 'blog_section',
		'settings' => 'blog_category',
	) ) );

	$wp_customize->add_setting( 'read_more', array(
			'type'              => 'theme_mod',
			'default'           => __( 'Read More', 'enigma-parallax' ),
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'read_more', array(
		'label'       => __( 'Blog Read More Button', 'enigma-parallax' ),
		'description' => 'Enter Read More button text',
		'type'        => 'text',
		'section'     => 'blog_section',
		'settings'    => 'read_more',
	) );

	$wp_customize->add_setting( 'autoplay', array(
			'type'              => 'theme_mod',
			'default'           => 1,
			'sanitize_callback' => 'enigma_parallax_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'autoplay', array(
		'label'       => __( 'Blog AutoPlay', 'enigma-parallax' ),
		'description' => 'blog autoplay on/off',
		'type'        => 'checkbox',
		'section'     => 'blog_section',
		'settings'    => 'autoplay',
	) );

	/* Team Option */
	$wp_customize->add_section( 'team_section', array(
		'title'      => __( 'Home Team Options', 'enigma-parallax' ),
		'panel'      => 'enigma_theme_option',
		'capability' => 'edit_theme_options',
		'priority'   => 35
	) );
	$wp_customize->add_setting(
		'team_home',
		array(
			'default'           => 1,
			'type'              => 'theme_mod',
			'sanitize_callback' => 'enigma_parallax_sanitize_checkbox',
			'capability'        => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'team_home', array(
		'label'    => __( 'Enable Team Area in Front Page', 'enigma-parallax' ),
		'type'     => 'checkbox',
		'section'  => 'team_section',
		'settings' => 'team_home'
	) );
	$wp_customize->add_setting(
		'team_title',
		array(
			'type'              => 'theme_mod',
			'default'           => __( 'Our Team', 'enigma-parallax' ),
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'enigma_team_title', array(
		'label'    => __( 'Team Area Title', 'enigma-parallax' ),
		'type'     => 'text',
		'section'  => 'team_section',
		'settings' => 'team_title',
	) );

	$wp_customize->selective_refresh->add_partial( 'team_title', array(
		'selector' => '.enigma_team_section .enigma_heading_title h3',
	) );

	for ( $i = 1; $i <= 4; $i ++ ) {
		$wp_customize->add_setting(
			'team_name_' . $i . '',
			array(
				'type'              => 'theme_mod',
				'default'           => esc_html( 'Member ' . $i ),
				'sanitize_callback' => 'enigma_parallax_sanitize_text',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control( 'enigma_team_name' . $i, array(
			'label'    => __( 'Name ', 'enigma-parallax' ) . $i,
			'type'     => 'text',
			'section'  => 'team_section',
			'settings' => 'team_name_' . $i . '',
		) );

		$wp_customize->selective_refresh->add_partial( 'team_name_' . $i . '', array(
			'selector' => '.enigma_team_section .caption .team_' . $i,
		) );

		$wp_customize->add_setting(
			'team_post_' . $i . '',
			array(
				'type'              => 'theme_mod',
				'default'           => esc_html( 'Team Member ' . $i ),
				'sanitize_callback' => 'enigma_parallax_sanitize_text',
				'capability'        => 'edit_theme_options',
			)
		);
		$wp_customize->add_control( 'enigma_team_post' . $i, array(
			'label'    => __( 'Designation ', 'enigma-parallax' ) . $i,
			'type'     => 'text',
			'section'  => 'team_section',
			'settings' => 'team_post_' . $i . '',
		) );
		$wp_customize->add_setting(
			'team_fb_' . $i . '',
			array(
				'type'              => 'theme_mod',
				'default'           => '#',
				'sanitize_callback' => 'enigma_parallax_sanitize_text',
				'capability'        => 'edit_theme_options',
			)
		);
		$wp_customize->add_control( 'enigma_fb_link' . $i, array(
			'label'    => __( 'Facebook Link ', 'enigma-parallax' ) . $i,
			'type'     => 'text',
			'section'  => 'team_section',
			'settings' => 'team_fb_' . $i . '',
		) );
		$wp_customize->add_setting(
			'team_twitter_' . $i . '',
			array(
				'type'              => 'theme_mod',
				'default'           => '#',
				'sanitize_callback' => 'enigma_parallax_sanitize_text',
				'capability'        => 'edit_theme_options',
			)
		);
		$wp_customize->add_control( 'enigma_twitter_link' . $i, array(
			'label'    => __( 'Twitter Link ', 'enigma-parallax' ) . $i,
			'type'     => 'text',
			'section'  => 'team_section',
			'settings' => 'team_twitter_' . $i . '',
		) );
		$wp_customize->add_setting(
			'team_linkedin_' . $i . '',
			array(
				'type'              => 'theme_mod',
				'default'           => '#',
				'sanitize_callback' => 'enigma_parallax_sanitize_text',
				'capability'        => 'edit_theme_options',
			)
		);
		$wp_customize->add_control( 'enigma_linkedin_link' . $i, array(
			'label'    => __( 'Linkedin Link ', 'enigma-parallax' ) . $i,
			'type'     => 'text',
			'section'  => 'team_section',
			'settings' => 'team_linkedin_' . $i . '',
		) );

		if ( $i == 1 ) {
			$team_img = get_template_directory_uri() . "/images/team1.jpg";
		} elseif ( $i == 2 ) {
			$team_img = get_template_directory_uri() . "/images/team2.jpg";
		} elseif ( $i == 3 ) {
			$team_img = get_template_directory_uri() . "/images/team3.jpg";
		} elseif ( $i == 4 ) {
			$team_img = get_template_directory_uri() . "/images/team4.jpg";
		}

		$wp_customize->add_setting(
			'team_' . $i . '_img',
			array(
				'type'              => 'theme_mod',
				'default'           => $team_img,
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'enigma_team_img_' . $i, array(
			'label'    => __( 'Team Image ', 'enigma-parallax' ) . $i,
			'section'  => 'team_section',
			'settings' => 'team_' . $i . '_img'
		) ) );
	}

	/* Social options */
	$wp_customize->add_section( 'social_section', array(
		'title'      => __( "Social Options", 'enigma-parallax' ),
		'panel'      => 'enigma_theme_option',
		'capability' => 'edit_theme_options',
		'priority'   => 35
	) );
	$wp_customize->add_setting(
		'header_social_media_in_enabled',
		array(
			'default'           => 1,
			'type'              => 'theme_mod',
			'sanitize_callback' => 'enigma_parallax_sanitize_checkbox',
			'capability'        => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'header_social_media_in_enabled', array(
		'label'    => __( 'Enable Social Media Icons in Header', 'enigma-parallax' ),
		'type'     => 'checkbox',
		'section'  => 'social_section',
		'settings' => 'header_social_media_in_enabled'
	) );

	$wp_customize->selective_refresh->add_partial( 'header_social_media_in_enabled', array(
		'selector' => '.header_section .social',
	) );

	$wp_customize->add_setting(
		'footer_section_social_media_enbled',
		array(
			'default'           => 1,
			'type'              => 'theme_mod',
			'sanitize_callback' => 'enigma_parallax_sanitize_checkbox',
			'capability'        => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'footer_section_social_media_enbled', array(
		'label'    => __( 'Enable Social Media Icons in Footer', 'enigma-parallax' ),
		'type'     => 'checkbox',
		'section'  => 'social_section',
		'settings' => 'footer_section_social_media_enbled'
	) );

	$wp_customize->selective_refresh->add_partial( 'footer_section_social_media_enbled', array(
		'selector' => '.enigma_footer_area .social',
	) );

	$wp_customize->add_setting(
		'email_id',
		array(
			'default'           => __( 'example@mymail.com', 'enigma-parallax' ),
			'type'              => 'theme_mod',
			'sanitize_callback' => 'sanitize_email',
			'capability'        => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'email_id', array(
		'label'    => __( 'Email ID', 'enigma-parallax' ),
		'type'     => 'email',
		'section'  => 'social_section',
		'settings' => 'email_id'
	) );

	$wp_customize->selective_refresh->add_partial( 'email_id', array(
		'selector' => '.head-contact-info',
	) );

	$wp_customize->add_setting(
		'phone_no',
		array(
			'default'           => __( '0159753586', 'enigma-parallax' ),
			'type'              => 'theme_mod',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'phone_no', array(
		'label'    => __( 'Phone Number', 'enigma-parallax' ),
		'type'     => 'text',
		'section'  => 'social_section',
		'settings' => 'phone_no'
	) );

	$wp_customize->add_setting(
		'twitter_link',
		array(
			'default'           => '#',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw',
			'capability'        => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'twitter_link', array(
		'label'    => __( 'Twitter', 'enigma-parallax' ),
		'type'     => 'url',
		'section'  => 'social_section',
		'settings' => 'twitter_link'
	) );
	$wp_customize->add_setting(
		'fb_link',
		array(
			'default'           => '#',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw',
			'capability'        => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'fb_link', array(
		'label'    => __( 'Facebook', 'enigma-parallax' ),
		'type'     => 'url',
		'section'  => 'social_section',
		'settings' => 'fb_link'
	) );
	$wp_customize->add_setting(
		'linkedin_link',
		array(
			'default'           => '#',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw',
			'capability'        => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'linkedin_link', array(
		'label'    => __( 'LinkedIn', 'enigma-parallax' ),
		'type'     => 'url',
		'section'  => 'social_section',
		'settings' => 'linkedin_link'
	) );

	$wp_customize->add_setting(
		'youtube_link',
		array(
			'default'           => '#',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw',
			'capability'        => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'youtube_link', array(
		'label'    => __( 'Youtube', 'enigma-parallax' ),
		'type'     => 'url',
		'section'  => 'social_section',
		'settings' => 'youtube_link'
	) );
	$wp_customize->add_setting(
		'instagram',
		array(
			'default'           => '#',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw',
			'capability'        => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'instagram', array(
		'label'    => __( 'Instagram', 'enigma-parallax' ),
		'type'     => 'url',
		'section'  => 'social_section',
		'settings' => 'instagram'
	) );

	$wp_customize->add_setting(
		'qq_link',
		array(
			'default'           => '#',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw',
			'capability'        => 'edit_theme_options'
		)
	);

	$wp_customize->add_control( 'qq_link', array(
		'label'    => __( 'qq_link', 'enigma-parallax' ),
		'type'     => 'url',
		'section'  => 'social_section',
		'settings' => 'qq_link'
	) );

	$wp_customize->add_setting(
		'vk_link',
		array(
			'default'           => '#',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw',
			'capability'        => 'edit_theme_options'
		)
	);

	$wp_customize->add_control( 'vk_link', array(
		'label'    => __( 'vk_link', 'enigma-parallax' ),
		'type'     => 'url',
		'section'  => 'social_section',
		'settings' => 'vk_link'
	) );

	/* Footer callout */
	$wp_customize->add_section( 'callout_section', array(
		'title'      => __( "Footer Call-Out Options", 'enigma-parallax' ),
		'panel'      => 'enigma_theme_option',
		'capability' => 'edit_theme_options',
		'priority'   => 35
	) );
	$wp_customize->add_setting(
		'fc_home',
		array(
			'default'           => 1,
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
		)
	);
	$wp_customize->add_control( 'fc_home', array(
		'label'    => __( 'Enable Footer callout on HOme', 'enigma-parallax' ),
		'type'     => 'checkbox',
		'section'  => 'callout_section',
		'settings' => 'fc_home'
	) );
	$wp_customize->add_setting(
		'fc_title',
		array(
			'default'           => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'enigma-parallax' ),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
		)
	);
	$wp_customize->add_control( 'fc_title', array(
		'label'    => __( 'Footer callout Title', 'enigma-parallax' ),
		'type'     => 'text',
		'section'  => 'callout_section',
		'settings' => 'fc_title'
	) );

	$wp_customize->selective_refresh->add_partial( 'fc_title', array(
		'selector' => '.enigma_callout_area p',
	) );

	$wp_customize->add_setting(
		'fc_btn_txt',
		array(
			'default'           => __( 'More Features', 'enigma-parallax' ),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
		)
	);
	$wp_customize->add_control( 'fc_btn_txt', array(
		'label'    => __( 'Footer callout Button Text', 'enigma-parallax' ),
		'type'     => 'text',
		'section'  => 'callout_section',
		'settings' => 'fc_btn_txt'
	) );

	$wp_customize->selective_refresh->add_partial( 'fc_btn_txt', array(
		'selector' => '.enigma_callout_area a',
	) );

	$wp_customize->add_setting(
		'fc_btn_link',
		array(
			'default'           => '#',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
		)
	);
	$wp_customize->add_control( 'fc_btn_link', array(
		'label'    => __( 'Footer callout Button Link', 'enigma-parallax' ),
		'type'     => 'text',
		'section'  => 'callout_section',
		'settings' => 'fc_btn_link'
	) );

	/* Footer Options */
	$wp_customize->add_section( 'footer_section', array(
		'title'      => __( "Footer Options", 'enigma-parallax' ),
		'panel'      => 'enigma_theme_option',
		'capability' => 'edit_theme_options',
		'priority'   => 35
	) );

	// $wp_customize->add_setting(	'widget_box', array(
	// 	'default'=> 1,
	// 	'type'=>'theme_mod',
	// 	'sanitize_callback'=>'enigma_parallax_sanitize_checkbox',
	// 	'capability'=>'edit_theme_options'
	// 	)
	// );
	// $wp_customize->add_control( 'widget_box', array(
	// 	'label'        => __( 'Enable/Disable Footer Widget Section', 'enigma-parallax' ),
	// 	'type'=>'checkbox',
	// 	'section'    => 'footer_section',
	// 	'settings'   => 'widget_box'
	// ) );

	$wp_customize->add_setting(
		'footer_customizations',
		array(
			'default'           => '@ Copyright ',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'footer_customizations', array(
		'label'    => __( 'Footer Customization Text', 'enigma-parallax' ),
		'type'     => 'text',
		'section'  => 'footer_section',
		'settings' => 'footer_customizations'
	) );

	$wp_customize->selective_refresh->add_partial( 'footer_customizations', array(
		'selector' => '.enigma_footer_copyright_info',
	) );

	$wp_customize->add_setting(
		'developed_by_text',
		array(
			'default'           => 'Developed By',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'developed_by_text', array(
		'label'    => __( 'Developed By Text', 'enigma-parallax' ),
		'type'     => 'text',
		'section'  => 'footer_section',
		'settings' => 'developed_by_text'
	) );
	$wp_customize->add_setting(
		'developed_by_weblizar_text',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'enigma_parallax_sanitize_text',
			'capability'        => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'developed_by_weblizar_text', array(
		'label'    => __( 'Developed By Link Text', 'enigma-parallax' ),
		'type'     => 'text',
		'section'  => 'footer_section',
		'settings' => 'developed_by_weblizar_text'
	) );
	$wp_customize->add_setting(
		'developed_by_link',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw'
		)
	);
	$wp_customize->add_control( 'developed_by_link', array(
		'label'    => __( 'Developed By Link', 'enigma-parallax' ),
		'type'     => 'url',
		'section'  => 'footer_section',
		'settings' => 'developed_by_link'
	) );


	// excerpt option 
	$wp_customize->add_section( 'excerpt_option', array(
		'title'      => __( "Excerpt Option", 'enigma-parallax' ),
		'panel'      => 'enigma_theme_option',
		'capability' => 'edit_theme_options',
		'priority'   => 37,
	) );

	$wp_customize->add_setting( 'excerpt_blog', array(
		'default'           => '55',
		'type'              => 'theme_mod',
		'sanitize_callback' => 'enigma_parallax_sanitize_integer',
		'capability'        => 'edit_theme_options'
	) );
	$wp_customize->add_control( 'excerpt_blog', array(
		'label'       => __( 'Excerpt length blog section', 'enigma-parallax' ),
		'type'        => 'number',
		'section'     => 'excerpt_option',
		'description' => esc_html__( 'Excerpt length only for home blog section.', 'enigma-parallax' ),
		'settings'    => 'excerpt_blog'
	) );

	// home layout //
	$wp_customize->add_section( 'Home_Page_Layout', array(
		'title'      => __( "Front Page Layout", 'enigma-parallax' ),
		'panel'      => 'enigma_theme_option',
		'capability' => 'edit_theme_options',
		'priority'   => 37,
	) );
	$wp_customize->add_setting( 'home_reorder',
		array(
			'type'              => 'theme_mod',
			'sanitize_callback' => 'sanitize_json_string',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( new enigma_Custom_sortable_Control( $wp_customize, 'home_reorder', array(
		'label'    => __( 'Front Page Layout Option', 'enigma-parallax' ),
		'section'  => 'Home_Page_Layout',
		'type'     => 'home-sortable',
		'choices'  => array(
			'services'  => __( 'Home Services', 'enigma-parallax' ),
			'portfolio' => __( 'Home Portfolio', 'enigma-parallax' ),
			'blog'      => __( 'Home Blog', 'enigma-parallax' ),
			'team'      => __( 'Home Team', 'enigma-parallax' ),
		),
		'settings' => 'home_reorder',
	) ) );

	$wp_customize->add_setting( 'box_layout',
		array(
			'type'              => 'theme_mod',
			'default'           => '1',
			'sanitize_callback' => 'enigma_parallax_sanitize_integer',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'box_layout', array(
		'label'    => __( 'Boxed Layout', 'enigma-parallax' ),
		'section'  => 'Home_Page_Layout',
		'type'     => 'select',
		'choices'  => array(
			'1' => __( 'Full-Width', 'enigma-parallax' ),
			'2' => __( 'Boxed', 'enigma-parallax' ),
		),
		'settings' => 'box_layout',
	) );
	// home layout close // 

}

function enigma_parallax_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

function enigma_parallax_sanitize_checkbox( $input ) {
	return $input;
}

function enigma_parallax_sanitize_integer( $input ) {
	return (int) ( $input );
}

/* class for categories */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'enigma_parallaxcategory_Control' ) ) :
	class enigma_parallaxcategory_Control extends WP_Customize_Control {
		public function render_content() {
			?>
            <span class="customize-control-title">
			<?php echo esc_attr( $this->label ); ?>
		</span>
			<?php $enigma_category = get_categories(); ?>
            <select <?php $this->link(); ?> >
				<?php foreach ( $enigma_category as $category ) { ?>
                    <option value="<?php echo esc_attr( $category->term_id ); ?>" <?php if ( $this->value() == '' ) {
						echo 'selected="selected"';
					} ?> >
						<?php echo esc_attr( $category->cat_name ); ?>
                    </option>
				<?php } ?>
            </select> <?php
		}  /* public function ends */
	}/*   class ends */
endif;

/* Custom Control Class */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'enigma_parallax_Customize_Misc_Control' ) ) :
	class enigma_parallax_Customize_Misc_Control extends WP_Customize_Control {
		public $settings = 'blogname';
		public $description = '';

		public function render_content() {
			switch ( $this->type ) {
				default:

				case 'heading':
					echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
					break;

				case 'line' :
					echo '<hr />';
					break;

			}
		}
	}
endif;

/* class for font-family */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'enigma_parallax_Font_Control' ) ) :
	class enigma_parallax_Font_Control extends WP_Customize_Control {
		public function render_content() {
			?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php
			$google_api_url = 'https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyC8GQW0seCcIYbo8xt_gXuToPK8xAMx83A';
			//lets fetch it
			$response = wp_remote_retrieve_body( wp_remote_get( $google_api_url, array( 'sslverify' => false ) ) );
			if ( $response == '' ) {
				echo '<script>jQuery(document).ready(function() {alert("Something went wrong! this works only when you are connected to Internet....!!");});</script>';
			}
			if ( is_wp_error( $response ) ) {
				echo 'Something went wrong!';
			} else {
				$json_fonts = json_decode( $response, true );
				// that's it
				$items = $json_fonts['items'];
				$i     = 0;
				?>
                <select <?php $this->link(); ?> >
					<?php foreach ( $items as $item ) {
						$i ++;
						$str = $item['family']; ?>
                        <option value="<?php echo esc_attr( $str ); ?>" <?php if ( $this->value() == $str ) {
							echo 'selected="selected"';
						} ?>><?php echo esc_attr( $str ); ?></option>
					<?php } ?>
                </select>
				<?php
			}
		}
	}
endif;


if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Customizer_Range_Value_Control' ) ) :
	class Customizer_Range_Value_Control extends WP_Customize_Control {
		public $type = 'range-value';

		// Enqueue scripts/styles.
		public function enqueue() {
			wp_enqueue_script( 'customizer-range-value-control', get_template_directory_uri() . '/js/customizer-range-value-control.js', array( 'jquery' ), rand(), true );
			wp_enqueue_style( 'customizer-range-value-control', get_template_directory_uri() . '/css/customizer-range-value-control.css', array(), rand() );
		}

		public function render_content() {
			?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <div class="range-slider"
                     style="width:100%; display:flex;flex-direction: row;justify-content: flex-start;">
				<span style="width:100%; flex: 1 0 0; vertical-align: middle;"><input class="range-slider__range"
                                                                                      type="range"
                                                                                      value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->input_attrs();
					$this->link(); ?>>
				<span class="range-slider__value">0</span></span>
                </div>
				<?php if ( ! empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo esc_attr( $this->description ); ?></span>
				<?php endif; ?>
            </label>
			<?php
		}
	}
endif;

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Enigma_Customizer_Icon_Picker_Control' ) ) :
	class Enigma_Customizer_Icon_Picker_Control extends WP_Customize_Control {

		public function enqueue() {
			wp_enqueue_script( 'fontawesome-iconpicker', get_template_directory_uri() . '/iconpicker-control/assets/js/fontawesome-iconpicker.js', array( 'jquery' ), '1.0.0', true );
			wp_enqueue_script( 'iconpicker-control', get_template_directory_uri() . '/iconpicker-control/assets/js/iconpicker-control.js', array( 'jquery' ), '1.0.0', true );
			wp_enqueue_style( 'iconpicker-css', get_template_directory_uri() . '/iconpicker-control/assets/css/fontawesome-iconpicker.css', array(), rand() );
			wp_enqueue_style( 'font-awesome-latest', get_template_directory_uri() . '/css/font-awesome-5.8.1/css/all.css' );

		}

		public function render_content() {
			?>
            <label>
                <style>
                    input.icp.icp-auto.iconpicker-element.iconpicker-input {
                        width: 90% !important;
                    }
                </style>
                <span class="customize-control-title">
					<?php echo esc_html( $this->label ); ?>
				</span>
                <div class="input-group icp-container">
                    <input data-placement="bottomRight" class="icp icp-auto" <?php $this->link(); ?>
                           value="<?php echo esc_attr( $this->value() ); ?>" type="text">
                    <span class="input-group-addon"></span>
                </div>
            </label>
			<?php
		}
	}
endif;

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'enigma_Custom_sortable_Control' ) ) :
	class enigma_Custom_sortable_Control extends WP_Customize_Control {
		public $type = 'home-sortable';

		/*Enqueue resources for the control*/
		public function enqueue() {

			wp_enqueue_style( 'customizer-repeater-admin-stylesheet', get_template_directory_uri() . '/assets/customizer_js_css/css/enigma-admin-style.css', time() );

			wp_enqueue_script( 'customizer-repeater-script', get_template_directory_uri() . '/assets/customizer_js_css/js/enigma-customizer_repeater.js', array(
				'jquery',
				'jquery-ui-draggable'
			), time(), true );

		}

		public function render_content() {
			if ( empty( $this->choices ) ) {
				return;
			}
			$values = json_decode( $this->value() );
			$name   = $this->id;
			?>

            <span class="customize-control-title">
			<?php echo esc_attr( $this->label ); ?>
		</span>

			<?php if ( ! empty( $this->description ) ): ?>
                <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>

            <div class="customizer-repeater-general-control-repeater customizer-repeater-general-control-droppable">
				<?php
				if ( ! empty( $values ) ) {
					foreach ( $values as $value ) { ?>
                        <div class="customizer-repeater-general-control-repeater-container customizer-repeater-draggable ui-sortable-handle">
                            <div class="customizer-repeater-customize-control-title">
								<?php echo esc_attr( $this->choices[ $value ] ); ?>
                            </div>
                            <input type="hidden" class="section-id" value="<?php echo esc_attr( $value ); ?>">
                        </div>
					<?php } ?>

				<?php } else {
					foreach ( $this->choices as $value => $label ): ?>
                        <div class="customizer-repeater-general-control-repeater-container customizer-repeater-draggable ui-sortable-handle">
                            <div class="customizer-repeater-customize-control-title">
								<?php echo esc_attr( $label ); ?>
                            </div>
                            <input type="hidden" class="section-id" value="<?php echo esc_attr( $value ); ?>">
                        </div>

					<?php endforeach;
				}
				if ( ! empty( $value ) ) { ?>
                    <input type="hidden"
                           id="customizer-repeater-<?php echo esc_attr( $this->id ); ?>-colector" <?php esc_url( $this->link() ); ?>
                           class="customizer-repeater-colector"
                           value="<?php echo esc_textarea( json_encode( $value ) ); ?>"/>
					<?php
				} else { ?>
                    <input type="hidden"
                           id="customizer-repeater-<?php echo esc_attr( $this->id ); ?>-colector" <?php esc_url( $this->link() ); ?>
                           class="customizer-repeater-colector"/>
					<?php
				} ?>
            </div>
			<?php
		}
	}
endif;

function sanitize_json_string( $json ) {
	$sanitized_value = array();
	foreach ( json_decode( $json, true ) as $value ) {
		$sanitized_value[] = esc_attr( $value );
	}

	return json_encode( $sanitized_value );
}

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'One_Page_Editor' ) ) :
	/* Class to create a custom tags control */
	class One_Page_Editor extends WP_Customize_Control {
		private $include_admin_print_footer = false;
		private $teeny = false;
		public $type = 'text-editor';

		public function __construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );
			if ( ! empty( $args['include_admin_print_footer'] ) ) {
				$this->include_admin_print_footer = $args['include_admin_print_footer'];
			}
			if ( ! empty( $args['teeny'] ) ) {
				$this->teeny = $args['teeny'];
			}
		}

		/* Enqueue scripts */
		public function enqueue() {
			wp_enqueue_script( 'one_lite_text_editor', get_template_directory_uri() . '/inc/customizer-page-editor/js/one-lite-text-editor.js', array( 'jquery' ), false, true );
		}

		/* Render the content on the theme customizer page */
		public function render_content() {
			?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>">
			<?php
			$settings        = array(
				'textarea_name' => $this->id,
				'teeny'         => $this->teeny,
			);
			$control_content = $this->value();
			wp_editor( $control_content, $this->id, $settings );

			if ( $this->include_admin_print_footer === true ) {
				do_action( 'admin_print_footer_scripts' );
			}
		}
	}
endif;

function show_on_front() {
	if ( is_front_page() ) {
		return is_front_page() && 'posts' !== get_option( 'show_on_front' );
	} elseif ( is_home() ) {
		return is_home();
	}
}

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'enigma_animation' ) ) :
	class enigma_animation extends WP_Customize_Control {

		/**
		 * Render the content on the theme customizer page
		 */
		public function render_content() { ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php
			$animation = array(
				'fadeIn',
				'fadeInUp',
				'fadeInDown',
				'fadeInLeft',
				'fadeInRight',
				'bounceIn',
				'bounceInUp',
				'bounceInDown',
				'bounceInLeft',
				'bounceInRight',
				'rotateIn',
				'rotateInUpLeft',
				'rotateInDownLeft',
				'rotateInUpRight',
				'rotateInDownRight',
			); ?>

            <select name="animate_slider" class="webriti_inpute" <?php $this->link(); ?>>
				<?php foreach ( $animation as $animate ) { ?>
                    <option value="<?php echo esc_attr( $animate ); ?>" <?php if ( $this->value() == $animate ) {
						echo 'selected="selected"';
					} ?>><?php echo esc_attr( $animate ); ?></option>
				<?php } ?>
            </select>
			<?php
		}
	}
endif;
?>