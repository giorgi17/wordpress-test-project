<?php
/**
 * The Template for displaying all single posts.
 *
 * @package enigma-parallax
 */

get_header();
$class            = '';
if ( get_theme_mod( 'breadcrumb', 1 ) == 1 ) {
	get_template_part('breadcrums');
} else {
	$class = 'no-breadcrumb';
}
?>
<div class="container">
	<div class="row enigma_blog_wrapper <?php echo esc_attr( $class ); ?>">
    <h1>This is a custom car single page!</h1>
		<div class="col-md-8">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
				get_template_part('post','content');
				get_template_part('authorintro');

			endwhile;
			else :
				get_template_part('nocontent');
			endif;
			enigma_parallax_navigation_posts();
			comments_template( '', true );
			?>
			<h3>text field<h3>
				<input type="text" value="<?php echo get_field("text-field"); ?>"><br><br>
			<h3>select field<h3>
				<select selected="selected" value="<?php echo get_field("select-field"); ?>">
				  <option value="<?php echo get_field("select-field"); ?>"><?php echo get_field("select-field"); ?></option>
				</select><br><br>
			<h3>image field<h3>
			<p><?php echo get_field("image-field"); ?></p>
		</div>
		<?php get_sidebar(); ?>
	</div> <!-- row div end here -->
</div><!-- container div end here -->
<?php get_footer(); ?>
