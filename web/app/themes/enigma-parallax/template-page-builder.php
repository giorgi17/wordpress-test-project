<?php //Template Name: Page Builder Full Width
get_header();
$class = '';
if ( get_theme_mod( 'breadcrumb', 1 ) == 1 ) { 
	get_template_part('breadcrums'); 
} else {
	$class = 'no-breadcrumb';
} 
?>
<div class="container">
<div class="row enigma_blog_wrapper <?php echo esc_attr( $class ); ?>">
	<div class="col-md-12">
	<?php if ( have_posts()) : while ( have_posts() ) : the_post(); ?>
		<div class="enigma_blog_full">
				<div class="enigma_blog_post_content">
					<?php the_content( __( 'Read More' , 'enigma-parallax' ) ); ?>
				</div>
		</div>	
		<div class="push-right">
			<hr class="blog-sep header-sep">
		</div>
		<?php
		endwhile; endif; ?>
	</div>	
</div>
</div>
<?php get_footer(); ?>