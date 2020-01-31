<!-- portfolio section -->
<div  id="portfolio" class="portfolio__section"></div>
<div class="enigma_project_section" <?php if ( ! empty ( get_theme_mod( 'upload__portfolio_image' ) ) ) { echo 'style="background-image:url('.esc_url( get_theme_mod( 'upload__portfolio_image' ) ).');"'; }?>>
<?php if ( ! empty ( get_theme_mod( 'port_heading', 'Recent Works' ) ) ) { ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="enigma_heading_title">
					<h3><?php esc_html_e( get_theme_mod( 'port_heading', 'Recent Works' ), 'enigma-parallax' ); ?></h3>		
				</div>
			</div>
		</div>
	</div>
<?php } ?>	
	<div class="container">
		<div class="row" >
			<div id="enigma_portfolio_section" class="enima_photo_gallery">
				<?php for ( $i=1 ; $i<=4; $i++ ) { ?>
				<?php if ( ! empty ( get_theme_mod( 'port_'.$i.'_img', get_template_directory_uri() ."/images/portfolio1.jpg" ) ) ) { ?>
				<div class="col-lg-3 col-md-3 col-sm-6 pull-left scrollimation fade-right d1"> 
					<div class="img-wrapper">
						<div class="enigma_home_portfolio_showcase">
							<img class="enigma_img_responsive" src="<?php echo esc_url( get_theme_mod( 'port_'.$i.'_img', get_template_directory_uri() ."/images/portfolio".$i.".jpg" ) ); ?>">
							<div class="enigma_home_portfolio_showcase_overlay">
								<div class="enigma_home_portfolio_showcase_overlay_inner ">
									<div class="enigma_home_portfolio_showcase_icons">
										<a title="<?php echo esc_attr( get_theme_mod( 'port_'.$i.'_title', __( 'Bonorum', 'enigma-parallax' ) ) ); ?>" href="<?php echo esc_url( get_theme_mod( 'port_'.$i.'_link', '#' ) ); ?>">
											<i class="fa fa-link"></i>
										</a>
										<a class="photobox_a" href="<?php echo esc_url( get_theme_mod( 'port_'.$i.'_img' ) ); ?>">
											<i class="fa fa-search-plus"></i>
											<img src="<?php echo esc_url( get_theme_mod( 'port_'.$i.'_img' ) ); ?>" alt="<?php echo esc_attr( get_theme_mod( 'port_'.$i.'_title', __( 'Bonorum', 'enigma-parallax' ) ) ); ?>" style="display:none !important;visibility:hidden">
										</a>
									</div>
								</div>
							</div>
						</div>
						<?php if ( ! empty ( get_theme_mod( 'port_'.$i.'_title', __( 'Bonorum', 'enigma-parallax' ) ) ) ) { ?>	
						<div class="enigma_home_portfolio_caption">
							<h3 class="port_<?php echo esc_attr( $i ) ?>">
								<a href="<?php echo esc_url( get_theme_mod( 'port_'.$i.'_link', '#' ) ); ?>"><?php echo esc_html( get_theme_mod( 'port_'.$i.'_title', 'Bonorum' ) ); ?></a>
							</h3>
						</div>					
					</div>
					<div class="enigma_portfolio_shadow"></div>
				</div><?php } } } ?>
			</div>
		</div>				
	</div>
</div>
<!-- /portfolio section -->