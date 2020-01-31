<?php // Template Name: Home Template
get_header();

if ( get_theme_mod( 'slider_home', 1 ) == 1 ) {
	if ( get_theme_mod( 'slider_choise', '1' ) == '1' ) {
		get_template_part( 'home', 'slideshow' );
	} else {
		get_template_part( 'home', 'slideshow-1' );
	}
}

if ( $sections = json_decode( get_theme_mod( 'home_reorder' ), true ) ) {
	foreach ( $sections as $section ) {
		$data = $section."_home";
		if ( get_theme_mod( $data, 1 ) == "1" ) {
			get_template_part( 'home', $section );
		}
	}
} else {
	if ( get_theme_mod( 'services_home', 1 ) == 1 ) {
		get_template_part('home','services'); 
	}

	if ( get_theme_mod( 'portfolio_home', 1 ) == 1 ) {
		get_template_part( 'home', 'portfolio' ); 
	}

	if ( get_theme_mod( 'blog_home', 1 ) == 1 ) {
		get_template_part( 'home', 'blog' );
	}

	if ( get_theme_mod( 'team_home', 1 ) == 1 ) {
		get_template_part( 'home', 'team' );
	}
}

if ( get_theme_mod( 'fc_home', 1 ) == 1 ) {
	get_template_part( 'footer', 'callout' );
}		

get_footer();