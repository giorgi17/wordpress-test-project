<?php //Template Name:Full-Width Page
get_header();
$class = ''; 
if ( get_theme_mod( 'breadcrumb', 1 ) == 1 ) { 
	get_template_part('breadcrums'); 
} else { 
	$class = 'no-breadcrumb';
} ?>
<div class="container">
	<div class="row enigma_blog_wrapper <?php echo esc_attr( $class ); ?>">
	<div class="col-md-12">
	<?php get_template_part('post','page'); ?>	
	</div>		
	</div>
</div>	
<?php get_footer(); ?>