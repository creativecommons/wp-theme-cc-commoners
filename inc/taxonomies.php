<?php

if ( ! function_exists( 'ccgn_register_taxonomies' ) ) {

function ccgn_register_taxonomies() {

	$labels = array(
		'name'                       => _x( 'FAQ Sections', 'Taxonomy General Name', 'ccgn' ),
		'singular_name'              => _x( 'FAQ Section', 'Taxonomy Singular Name', 'ccgn' ),
		'menu_name'                  => __( 'FAQ sections', 'ccgn' ),
		'all_items'                  => __( 'All Items', 'ccgn' ),
		'parent_item'                => __( 'Parent Item', 'ccgn' ),
		'parent_item_colon'          => __( 'Parent Item:', 'ccgn' ),
		'new_item_name'              => __( 'New Section', 'ccgn' ),
		'add_new_item'               => __( 'Add New Section', 'ccgn' ),
		'edit_item'                  => __( 'Edit Section', 'ccgn' ),
		'update_item'                => __( 'Update Section', 'ccgn' ),
		'view_item'                  => __( 'View Section', 'ccgn' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'ccgn' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'ccgn' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'ccgn' ),
		'popular_items'              => __( 'Popular Items', 'ccgn' ),
		'search_items'               => __( 'Search Items', 'ccgn' ),
		'not_found'                  => __( 'Not Found', 'ccgn' ),
		'no_terms'                   => __( 'No items', 'ccgn' ),
		'items_list'                 => __( 'Items list', 'ccgn' ),
		'items_list_navigation'      => __( 'Items list navigation', 'ccgn' ),
	);
	$rewrite = array(
		'slug'                       => 'faq-section',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'tax-ccgn-faq', array( 'ccgn-faq' ), $args );

}
add_action( 'init', 'ccgn_register_taxonomies', 0 );

}