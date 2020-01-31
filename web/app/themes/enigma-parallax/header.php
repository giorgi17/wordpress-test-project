<!DOCTYPE html>
<!--[if lt IE 7]>
    <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>
    <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>
    <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?>><!--<![endif]-->
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta charset="<?php bloginfo('charset'); ?>" />	
	<?php wp_head(); ?>
</head>
<body <?php if ( get_theme_mod( 'box_layout', '1' ) == '2' ) { body_class('boxed'); } else body_class(); ?>>
<div>
	<!-- Header Section -->
	<div class=" home-menu-list">
	<div class="header_section affix-top transition" <?php if ( has_header_image() ) { ?> style='background-image: url("<?php header_image(); ?>")' <?php  } ?>>
		<div class="container" id="header">
			<!-- Logo & Contact Info -->
			<div class="row ">
			<?php if ( get_theme_mod( 'title_position' ) == 1 ) { ?>
				<div class="col-md-6 col-sm-12 wl_rtl" >					
					<div claSS="logo logocenter">		
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php 
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$image          = wp_get_attachment_image_src( $custom_logo_id,'full' );

						if ( has_custom_logo() ) { ?> 
							<img src="<?php echo esc_attr( $image[0] ); ?>" height="<?php echo esc_attr( get_theme_mod( 'logo_height', '55' ) ); ?>" width="<?php echo esc_attr( get_theme_mod( 'logo_height', '150' ) ) ?>"> 
					<?php } else { 
							if ( display_header_text()==true ) {
					?>  
					 	<h1><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
					<?php } } ?>
					</a>
					<?php if ( display_header_text()==true ) { ?>
						<p><?php esc_html( bloginfo( 'description' ) ); ?></p>
					<?php } ?>
					</div>
				</div>
				<?php } else { ?>
				<div class="col-md-6 col-sm-12 wl_rtl" >					
					<div claSS="logo">						
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php 
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$image          = wp_get_attachment_image_src( $custom_logo_id, 'full' ); 

						if ( has_custom_logo() ) { ?> 
							<img src="<?php echo esc_attr( $image[0] ); ?>" height="<?php echo esc_attr( get_theme_mod( 'logo_height', '55' ) ) ?>" width="<?php echo esc_attr( get_theme_mod( 'logo_height', '150' ) ) ?>"> 
					<?php } else { 
							if ( display_header_text()==true ) {
					?> 
					 	<h1><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
					 <?php } } ?>
					</a>
					<?php if ( display_header_text() == true ) { ?>
						<p><?php esc_html( bloginfo( 'description' ) ); ?></p>
					<?php } ?>
					</div>
				</div>
				<?php } 
				if ( ! empty ( get_theme_mod( 'email_id', 'example@mymail.com' ) ) || ! empty ( get_theme_mod( 'phone_no', '0159753586' ) ) ) { ?>
				<div class="col-md-6 col-sm-12">
				<ul class="head-contact-info">
						<?php if ( ! empty ( get_theme_mod( 'email_id', 'example@mymail.com' ) ) ) { ?><li><i class="fa fa-envelope"></i><a href="mailto:<?php echo esc_attr( get_theme_mod( 'email_id', 'example@mymail.com' ) ); ?>"><?php echo esc_attr( get_theme_mod( 'email_id', 'example@mymail.com' ) ); ?></a></li><?php } ?>
						<?php if ( ! empty ( get_theme_mod( 'phone_no', '0159753586' ) ) ) { ?><li><i class="fa fa-phone"></i><a href="tel:<?php echo esc_attr( get_theme_mod( 'phone_no', '0159753586' )); ?>"><?php echo esc_attr( get_theme_mod( 'phone_no', '0159753586' ) ); ?></a></li><?php } ?>
				</ul>
				<?php } 
				if ( get_theme_mod( 'header_social_media_in_enabled', 1 ) == 1 ) { ?>
					<ul class="social">
					<?php if ( ! empty ( get_theme_mod( 'fb_link', '#' ) ) ) { ?>
					   <li class="facebook" data-toggle="tooltip" data-placement="bottom" title="Facebook"><a  href="<?php echo esc_url( get_theme_mod( 'fb_link', '#' ) ); ?>"><i class="fab fa-facebook-f"></i></a></li>
					<?php } if ( ! empty ( get_theme_mod( 'twitter_link', '#' ) ) ) { ?>
					<li class="twitter" data-toggle="tooltip" data-placement="bottom" title="Twitter"><a href="<?php echo esc_url( get_theme_mod( 'twitter_link', '#' ) ); ?>"><i class="fab fa-twitter"></i></a></li>
					<?php } if ( ! empty ( get_theme_mod( 'linkedin_link', '#' ) ) ) { ?>					
					<li class="linkedin" data-toggle="tooltip" data-placement="bottom" title="Linkedin"><a href="<?php echo esc_url( get_theme_mod( 'linkedin_link', '#' ) ); ?>"><i class="fab fa-linkedin-in"></i></a></li>
					<?php } if ( ! empty ( get_theme_mod( 'youtube_link', '#' ) ) ) { ?>
					<li class="youtube" data-toggle="tooltip" data-placement="bottom" title="Youtube"><a href="<?php echo esc_url( get_theme_mod( 'youtube_link', '#' ) ) ; ?>"><i class="fab fa-youtube"></i></a></li>
	                <?php } if ( ! empty ( get_theme_mod( 'instagram', '#' ) ) ) { ?>
					<li class="facebook" data-toggle="tooltip" data-placement="bottom" title="instagram"><a href="<?php echo esc_url( get_theme_mod( 'instagram', '#' ) ) ; ?>"><i class="fab fa-instagram"></i></a></li>
	                <?php } if ( ! empty ( get_theme_mod( 'vk_link', '#' ) ) ) { ?>
					<li class="facebook" data-toggle="tooltip" data-placement="bottom" title="vk"><a href="<?php echo esc_url( get_theme_mod( 'vk_link', '#' ) ) ; ?>"><i class="fab fa-vk"></i></a></li>
	                <?php } if ( ! empty ( get_theme_mod( 'qq_link', '#' ) ) ) { ?>
					<li class="facebook" data-toggle="tooltip" data-placement="bottom" title="qq"><a href="<?php echo esc_url( get_theme_mod( 'qq_link', '#' ) ) ; ?>"><i class="fab fa-qq"></i></a></li>
					<?php } ?>
					</ul>	
				</div>
				<?php } 
				if ( get_theme_mod( 'search_box' ) == 1 ) { ?>
				<div class="col-md-6 col-sm-12 header_search">
				 <?php get_search_form(); ?>
				</div>
				<?php } ?>
			</div>
			<!-- /Logo & Contact Info -->
		</div>	
	</div>	
	<!-- /Header Section -->
	<!-- Navigation  menus -->
		<?php
		if ( get_theme_mod( 'side_menu_option' )  =="both" || get_theme_mod( 'side_menu_option' ) == 'both_id' || get_theme_mod( 'side_menu_option' ) == "main" ) {
		?>
	<div class="navigation_menu transition"   id="enigma_nav_top">
		<span id="header_shadow"></span>
		
		<div class="container navbar-container" >
			<nav class="navbar navbar-default " role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu" aria-controls="#menu" aria-expanded="false" aria-label="Toggle navigation">
					  <span class="sr-only"><?php esc_html_e('Toggle navigation','enigma-parallax');?></span>
					  <span class="fas fa-bars"></span>
					</button>
				</div>
				<div id="menu" class="collapse navbar-collapse ">	
				<?php 
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class'     => 'nav navbar-nav',
						'fallback_cb'    => 'enigma_parallax_fallback_page_menu',
						'walker'         => new enigma_parallax_nav_walker(),
						)
					);	
				?>				
				</div>	
			</nav>
		</div>
	</div>
		<?php } ?>
	</div>
	<?php
	if ( get_theme_mod('side_menu_option')  == "both" || get_theme_mod( 'side_menu_option' ) == "side" ) {
		if ( has_nav_menu( "SIDEER" ) ) {
	?>
	
	<div class="home_menu">
	<div id="scroll_menu">
		<div id='cssmenu'>
	<!--<a href="<?php //echo esc_url(home_url( '/' )); ?>" class="btn " data-toggle="tooltip" title="Home"><i class="fa fa-home"></i></a><br />
	<a href="<?php //echo esc_url(home_url( '/' )); ?>#myCarousel" class="btn " data-toggle="tooltip" title="Slider"><i class="fa fa-caret-square-o-right"></i></a><br />-->
	<?php			  
		wp_nav_menu( array(
			'theme_location' => 'SIDEER',
			'menu_class'     => 'side-menu',
			'menu'           => 'side', // This will be different for you.
			'walker'         => new CSS_Menu_Maker_Walker()
			)
		);	
	?>
		</div>
	</div>
	<div class="scroll_toggle">
	<i class="fa fa-arrow-circle-o-right" id="bt1" onclick="setVisibility( 'scroll_menu' ); "></i>
	</div>
	</div><!--class=home_menu-->
	
	<?php  } else { ?>
	<div class="home_menu">
		<h2><?php esc_html_e( 'Please Select The Side Menu', 'enigma-parallax' );?></h2>
	</div>
	<?php
		}
	} elseif ( get_theme_mod( 'side_menu_option' )  =="side_id" || get_theme_mod( 'side_menu_option' ) == 'both_id' ) {
	?>
		<div class="home_menu-2">
			<div id="scroll_menu-2">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn " data-toggle="tooltip" title="Home"><i class="fa fa-home"></i></a><br />
				<?php if ( get_theme_mod( 'slider_home', 1 ) == 1 ) { ?>
				<a href="<?php if ( !is_home() ) { echo esc_url( home_url( '/' ) ); } ?>#slider" class="btn " data-toggle="tooltip" title="Slider"><i class="fa fa-caret-square-o-right"></i></a><br />
				<?php } if ( get_theme_mod( 'services_home', 1 ) == 1 ) { ?>
				<a href="<?php if ( !is_home() ) { echo esc_url( home_url( '/' ) ); } ?>#service" class="btn " data-toggle="tooltip" title="Service"><i class="fa fa-yelp"></i></a><br />
				<?php } if ( get_theme_mod( 'portfolio_home', 1 ) == 1 ) { ?>
				<a href="<?php if ( !is_home() ) { echo esc_url( home_url( '/' ) ); } ?>#portfolio" class="btn " data-toggle="tooltip" title="Portfolio"><i class="fa fa-picture-o"></i></a><br />
				<?php } if ( get_theme_mod( 'blog_home', 1 ) == 1 ) { ?>
				<a href="<?php if ( !is_home() ) { echo esc_url( home_url( '/' ) ); } ?>#blog" class="btn" data-toggle="tooltip" title="Blog"><i class="fa fa-book"></i></a><br />
				<?php } if ( get_theme_mod( 'team_home', 1 ) == 1 ) { ?>
				<a href="<?php if ( !is_home() ) { echo esc_url( home_url( '/' ) ); } ?>#team" class="btn " data-toggle="tooltip" title="Team"><i class="fa fa-users"></i></a><br />
				<?php } ?>		
			</div>	
		<div class="scroll_toggle-2">
	<i class="fa fa-arrow-circle-o-right" id="bt1" onclick="setVisibility( 'scroll_menu-2' ); "></i>
	</div>
	</div><!--class=home_menu-->	
	<?php
} 