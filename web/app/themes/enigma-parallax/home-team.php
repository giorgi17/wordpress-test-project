<div  id="team"></div>
<div class="enigma_team_section">
<?php if ( get_theme_mod( 'team_title', 'Our Team' ) ) { ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="enigma_heading_title">
					<h3><?php esc_html_e( get_theme_mod( 'team_title', 'Our Team' ), 'enigma-parallax' ); ?></h3>		
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<div class="container scrollimation scale-in">	
	<?php 
		for( $i=1; $i<=4; $i++ ) { 
		if ( ! empty ( get_theme_mod( 'team_'.$i.'_img ', get_template_directory_uri() ."/images/team1.jpg" ) ) ) { 
	?>
		<div class="col-md-3 service scrollimation scale-in d2 pull-left in mb-5">
			<img class="img-circle rounded-circle img-responsive" src="<?php echo esc_url( get_theme_mod( 'team_'.$i.'_img', get_template_directory_uri() ."/images/team".$i.".jpg" ) ); ?>" height="261px" width="276px">
			<?php if ( get_theme_mod( 'team_post_'.$i ) ) { ?>
			<div class="pos"><?php echo esc_html( get_theme_mod( 'team_post_'.$i ) ); ?></div>
			<?php } ?>

			<div class="caption">
				<div class="long">
					<h3 class="team_<?php echo esc_attr( $i ) ?>"><?php echo esc_html( get_theme_mod( 'team_name_'.$i, 'Member '.$i ) ); ?></h3>
				</div>
				<div class="team_social">
				<?php if ( ! empty ( get_theme_mod( 'team_fb_'.$i, '#' ) ) ) { ?>
					<a href="<?php echo esc_url( get_theme_mod( 'team_fb_'.$i, '#' ) ); ?>"><i class="fa fa-facebook"></i></a>
				<?php } if ( ! empty ( get_theme_mod( 'team_twitter_'.$i, '#' ) ) ) { ?>
					<a href="<?php echo esc_url( get_theme_mod( 'team_twitter_'.$i, '#' ) ); ?>" ><i class="fa fa-twitter"></i></a>
				<?php } if ( ! empty ( get_theme_mod( 'team_linkedin_'.$i, '#' ) ) ) { ?>
					<a href="<?php echo esc_url( get_theme_mod( 'team_linkedin_'.$i, '#' ) ); ?>" ><i class="fa fa-linkedin"></i></a>
				<?php } ?>
				</div>
			</div>
		</div>
	<?php } } ?>		
	</div><!-- row end--->
</div> <!-- container div end here -->