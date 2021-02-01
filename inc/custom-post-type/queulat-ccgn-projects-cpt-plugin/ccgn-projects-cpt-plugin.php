<?php
/**
 * Plugin Name: Initiatives and Projects Custom Post Type Plugin
 * Plugin URI:
 * Description:
 * Version: 0.1.0
 * Author:
 * Author URI:
 * License: GPL-3.0-or-later
 */

function Ccgn_Projects_Post_Type_register_post_type() {
	require_once __DIR__ . '/class-ccgn-projects-post-type.php';
	Ccgn_Projects_Post_Type::activate_plugin();
	require_once __DIR__ . '/class-ccgn-projects-post-type.php';
	require_once __DIR__ . '/class-ccgn-projects-post-query.php';
	require_once __DIR__ . '/class-ccgn-projects-post-object.php';
	require_once __DIR__ . '/class-ccgn-projects-metabox.php';
};

add_action( 'init', 'Ccgn_Projects_Post_Type_register_post_type' );

add_filter( 'manage_ccgn-projects_posts_columns', 'ccgn_projects_custom_post_type_columns' );
add_action( 'manage_ccgn-projects_posts_custom_column', 'ccgn_projects_custom_post_type_columns_content', 10, 2 );

function ccgn_projects_custom_post_type_columns( $columns ) {
	$columns = array(
		'cb'       => $columns['cb'],
		'title'    => __( 'Title' ),
		'platform' => __( 'Platform', 'cc-commoners' ),
		'date'     => __( 'Date' ),
	);
	return $columns;
}
function ccgn_projects_custom_post_type_columns_content( $column, $post_id ) {
	if ( 'platform' === $column ) {
		$platform_id = get_post_meta( $post_id, 'projects_platform_id', true );
		if ( ! empty( $platform_id ) ) {
			echo '<small><a href="' . get_the_permalink( $platform_id ) . '">' . get_the_title( $platform_id ) . '</a></small>';
		} else {
			'<small>No platform selected</small>';
		}
	}
}
