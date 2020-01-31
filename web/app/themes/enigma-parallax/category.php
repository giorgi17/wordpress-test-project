<?php
/**
 * The template for displaying Category Posts
 *
 * @package enigma-parallax
 */

get_header();
$class            = '';
if ( get_theme_mod( 'breadcrumb', 1 ) == 1 ) {  
?>
<div class="enigma_header_breadcrum_title">	
	<div class="container">
		<div class="row">
		<?php if(have_posts()) :?>
			<div class="col-md-12">
			<h1><?php /* translators: %s: category name */
			printf( esc_html__( 'Category Archives: %s', 'enigma-parallax' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
			</h1>
			</div>
		<?php endif; ?>	
		</div>
	</div>	
</div>
<?php } else {
	$class = 'no-breadcrumb';
} ?>
<div class="container">	
	<div class="row enigma_blog_wrapper <?php echo esc_attr( $class ); ?>">
		<div class="col-md-8">
		<?php 
		if ( have_posts()): 
		while ( have_posts() ): the_post();
		get_template_part('post','content'); ?>	
		<?php endwhile;
		endif;
		?>
		<div class="text-center wl-theme-pagination">
	        <?php echo esc_html( the_posts_pagination( array( 'mid_size' => 2 ) ) ); ?>
	        <div class="clearfix"></div>
	    </div>
		</div>	
	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>