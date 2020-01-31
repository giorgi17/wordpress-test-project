<?php

// Register Taxonomy brand
function create_brand_tax() {

	$labels = array(
		'name'              => _x( 'brands', 'taxonomy general name', 'test-plugin123' ),
		'singular_name'     => _x( 'brand', 'taxonomy singular name', 'test-plugin123' ),
		'search_items'      => __( 'Search brands', 'test-plugin123' ),
		'all_items'         => __( 'All brands', 'test-plugin123' ),
		'parent_item'       => __( 'Parent brand', 'test-plugin123' ),
		'parent_item_colon' => __( 'Parent brand:', 'test-plugin123' ),
		'edit_item'         => __( 'Edit brand', 'test-plugin123' ),
		'update_item'       => __( 'Update brand', 'test-plugin123' ),
		'add_new_item'      => __( 'Add New brand', 'test-plugin123' ),
		'new_item_name'     => __( 'New brand Name', 'test-plugin123' ),
		'menu_name'         => __( 'brand', 'test-plugin123' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( 'types of brands', 'test-plugin123' ),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
	);
	register_taxonomy( 'brand', array('car'), $args );

}
add_action( 'init', 'create_brand_tax' );
