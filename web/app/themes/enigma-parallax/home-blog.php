<div  id="blog"></div>
<div class="enigma_blog_area" <?php if ( get_theme_mod( 'upload__blog_image' ) ) { echo 'style="background-image:url('.esc_url( get_theme_mod( 'upload__blog_image' ) ).');"'; }?>>
	<?php 
	if ( ! empty ( get_theme_mod( 'blog_title', 'Home Blog Title' ) ) ) { 
	?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="enigma_heading_title">
					<h3><?php esc_html_e( get_theme_mod( 'blog_title',  'Home Blog Title' ), 'enigma-parallax'  ); ?></h3>		
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<div class="container">	
		<div id="enigma_blog_section">
			<?php if ( have_posts() ) : $posts_count = wp_count_posts()->publish;
				if ( get_theme_mod( 'blog_category', '1' ) ) {
					$category = get_theme_mod( 'blog_category', '1' );
					$args     = array( 'post_type' => 'post', 'posts_per_page' => $posts_count , 'ignore_sticky_posts' => 1, 'cat' => $category );		
				} else {
					$args = array( 'post_type' => 'post', 'posts_per_page' => $posts_count , 'ignore_sticky_posts' => 1 );	 
				}	
				$post_type_data = new WP_Query( $args );
				while ( $post_type_data->have_posts() ): $post_type_data->the_post();
			?>
				<div class="col-md-4 col-sm-12 scrollimation scale-in d2 pull-left">
				<div class="enigma_blog_thumb_wrapper">
					<div class="enigma_blog_thumb_wrapper_showcase">					
						<?php $img = array( 'class' => 'enigma_img_responsive' );
							if ( has_post_thumbnail() ): 
								the_post_thumbnail( 'home_post_thumb', $img );
							endif; 
						?>
						<div class="enigma_blog_thumb_wrapper_showcase_overlay">
							<div class="enigma_blog_thumb_wrapper_showcase_overlay_inner ">
								<div class="enigma_blog_thumb_wrapper_showcase_icons">
									<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
								</div>
							</div>
						</div>
					</div>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php if ( get_the_tag_list() != '' ) { ?>
					<p class="enigma_tags"><?php the_tags( 'Tags :&nbsp;', '', '<br />' ); ?></p>
					<?php } ?>
					<p>
						<?php echo esc_attr( substr( get_the_excerpt(), 0, get_theme_mod( 'excerpt_blog', '55' ) ) ); ?>
					</p>
					<a href="<?php the_permalink(); ?>" class="enigma_blog_read_btn">
						<i class="fa fa-plus-circle"></i>
						<?php if ( ! empty ( get_theme_mod( 'read_more', 'Read More' ) ) ) { 
							esc_html_e( get_theme_mod( 'read_more', 'Read More' ), 'enigma-parallax' ); 
						} ?>
					</a>
					<div class="enigma_blog_thumb_footer">
						<ul class="enigma_blog_thumb_date">
							<li>
								<i class="fa fa-user"></i>
								<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
									<?php echo get_the_author(); ?>
								</a>
							</li>
							<li><i class="fa fa-clock-o"></i>
							<?php 
								if ( ('d M  y') == get_option( 'date_format' ) ) : 
							 		echo get_the_date('F d ,Y'); 
							 	else : 
							 		echo get_the_date(); 
							 	endif;
							?>
							</li>
							<li><i class="fa fa-comments-o"></i>
								<?php comments_popup_link( '0', '1', '%', '', '-' ); ?>
							</li>
						</ul>
					</div>
				</div>
				</div>
				<?php  endwhile; 
				else : ?>
				<div class="col-md-4 col-sm-12 scrollimation scale-in d2 pull-left">
				<div class="enigma_blog_thumb_wrapper">
					<div class="enigma_blog_thumb_wrapper_showcase">
						<img  alt="Enigma" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/wall/img(11).jpg">
						<div class="enigma_blog_thumb_wrapper_showcase_overlay">
							<div class="enigma_blog_thumb_wrapper_showcase_overlay_inner ">
								<div class="enigma_blog_thumb_wrapper_showcase_icons">
									<a title="Enigma" href="#"><i class="fa fa-link"></i></a>
								</div>
							</div>
						</div>
					</div>
					<h2><a href="#"><?php esc_html_e( 'NO Post', 'enigma-parallax' ); ?></a></h2>
					
					<div class="enigma_tags">
						<?php esc_html_e( 'Tags :&nbsp;', 'enigma-parallax' ); ?>
						<a href="#"><?php esc_html_e( 'Bootstrap', 'enigma-parallax' ); ?></a>
						<a href="#"><?php esc_html_e( 'HTML5', 'enigma-parallax' ); ?></a>
					   
					</div>
					<p><?php esc_html_e( 'Add You Post To show post here..', 'enigma-parallax' ); ?></p>
					<a href="#" class="enigma_blog_read_btn"><i class="fa fa-plus-circle"></i><?php esc_html_e( 'Read More', 'enigma-parallax' ); ?></a>
					<div class="enigma_blog_thumb_footer">
						<ul class="enigma_blog_thumb_date">
							<li><i class="fa fa-user"></i><a href="#"><?php esc_html_e( 'By Admin', 'enigma-parallax' ); ?></a></li>
							<li><i class="fa fa-clock-o"></i><?php esc_html_e( ' November 9 2013', 'enigma-parallax' ); ?></li>
							<li><i class="fa fa-comments-o"></i><a href="#"><?php esc_html_e( '10', 'enigma-parallax' ); ?></a></li>
						</ul>
					</div>
				</div>
				</div>
			<?php endif; ?>
					
		</div>
					
		<div class="enigma_carousel-navi">
			<div id="port-next" class="enigma_carousel-prev" ><i class="fa fa-arrow-left"></i></div>
			<div id="port-prev" class="enigma_carousel-next" ><i class="fa fa-arrow-right"></i></div>
		</div>
	</div>
</div>