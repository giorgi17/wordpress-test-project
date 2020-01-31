<!-- Carousel-->
<div  id="slider"></div>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
	  <?php 
	   $j = 1;
		for( $i=1; $i<=3; $i++ ) { 
		if ( ! empty ( get_theme_mod( 'slide_image_'.$i, get_template_directory_uri() ."/images/".$i.".jpg" ) ) ) {  ?>
		<div class="carousel-item <?php if ( $j == 1 ) echo "active"; ?>">
			<img src="<?php echo esc_url( get_theme_mod( 'slide_image_'.$i, get_template_directory_uri() ."/images/".$i.".jpg" ) ); ?>" class="img-responsive" alt="<?php echo esc_attr( get_theme_mod( 'slide_title_'.$i, 'Contrary to popular' ) ); ?>">	  
			<div class="container">
				<div class="carousel-caption">
					<?php if ( ! empty ( get_theme_mod( 'slide_title_'.$i, 'Contrary to popular' ) ) ) {  ?>
					<div class="carousel-text">
						<h1 class="animated <?php if ( ! empty ( get_theme_mod( 'animate_type_title' ) ) ) { echo esc_attr( get_theme_mod( 'animate_type_title' ) ); } else echo esc_attr( 'bounceInRight' ); ?> head_<?php echo esc_attr( $i ) ?>"><?php echo esc_html( get_theme_mod( 'slide_title_'.$i, 'Contrary to popular' ) ); ?>
						</h1>			
						<?php } if ( ! empty ( get_theme_mod( 'slide_desc_'.$i, 'Lorem Ipsum is simply dummy text of the printing' ) ) ) {  ?>
						<ul class="list-unstyled carousel-list">
							<li class="animated <?php if ( ! empty ( get_theme_mod( 'animate_type_desc' ) ) ) { echo esc_attr( get_theme_mod( 'animate_type_desc' ) ); } else esc_attr( 'bounceInLeft' ); ?> desc_<?php echo esc_attr( $i ) ?>"><?php echo wp_kses_post( get_theme_mod( 'slide_desc_'.$i, 'Lorem Ipsum is simply dummy text of the printing' ) ); ?></li>
						</ul>
						<?php } if ( ! empty ( get_theme_mod( 'slide_btn_text_'.$i, 'Read More' ) ) ) { ?>
							<a class="enigma_blog_read_btn animated bounceInUp rdm_<?php echo esc_attr( $i ) ?>" href="<?php if ( ! empty ( get_theme_mod( 'slide_btn_link_'.$i, '#' ) ) ) { echo esc_url( get_theme_mod( 'slide_btn_link_'.$i, '#' ) ); } ?>" role="button"><?php echo esc_html( get_theme_mod( 'slide_btn_text_'.$i, 'Read More' ) ); ?></a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>		
		<?php $j++; }  } ?>
	</div>
	<ol class="carousel-indicators">
		<?php for( $i=0; $i<$j-1; $i++ ) { ?>
			<li data-target="#myCarousel" data-slide-to="<?php echo esc_attr( $i ); ?>" <?php if( $i == 0 ) { echo 'class="active"'; } ?> ></li>
		<?php } ?>
	</ol>
	<a class="carousel-control-prev" href="#myCarousel" data-slide="prev"><span class="carousel-control-prev-icon"></span></a>
	<a class="carousel-control-next" href="#myCarousel" data-slide="next"><span class="carousel-control-next-icon"></span></a>
	<div class="enigma_slider_shadow"></div>
</div><!-- /.carousel -->