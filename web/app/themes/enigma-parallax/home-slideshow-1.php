<!-- Swiper -->
<div class="swiper-container swiper-container-slider2">
  <div class="swiper-wrapper">
  	<?php for ( $i=1; $i<=3; $i++ ) { ?>
    <div class="swiper-slide">
    <img src="<?php echo esc_url( get_theme_mod( 'slide_image_'.$i, get_template_directory_uri() ."/images/1.jpg" ) ); ?>"/>
    <div class="container">
        <div class="carousel-caption">
          <?php if ( ! empty ( get_theme_mod( 'slide_title_'.$i, 'Contrary to popular' ) ) ) {  ?>
          <div class="carousel-text">
            <h1 class="animated animation animated-item-2 head_<?php echo esc_attr( $i ) ?>"><?php echo esc_html( get_theme_mod( 'slide_title_'.$i, 'Contrary to popular' ) ); ?></h1>   
            <?php if ( ! empty ( get_theme_mod( 'slide_desc_'.$i, 'Lorem Ipsum is simply dummy text of the printing' ) ) ) {  ?>
            <ul class="list-unstyled carousel-list">
              <li class="animated animation animated-item-3 desc_<?php echo esc_attr( $i ) ?>"><?php echo wp_kses_post( get_theme_mod( 'slide_desc_'.$i, 'Lorem Ipsum is simply dummy text of the printing' ) ); ?></li>
            </ul>
            <?php } if ( ! empty ( get_theme_mod( 'slide_btn_text_'.$i, 'Read More' ) ) ) { ?>
              <a class="enigma_blog_read_btn  animation animated-item-3 rdm_<?php echo esc_attr( $i ) ?>" href="<?php if ( ! empty ( get_theme_mod( 'slide_btn_link_'.$i, '#' ) ) ) { echo esc_url( get_theme_mod( 'slide_btn_link_'.$i, '#' ) ); } ?>" role="button"><?php echo esc_html( get_theme_mod( 'slide_btn_text_'.$i, 'Read More' ) ); ?></a>
            <?php } ?>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
  <!-- Add Pagination -->
 	<div class="swiper-pagination swiper'"></div>
    <div class="swiper-button-next swiper' swiper-button-next-cont swiper-button-white"></div>
    <div class="swiper-button-prev swiper' swiper-button-prev-cont swiper-button-white"></div>
</div>