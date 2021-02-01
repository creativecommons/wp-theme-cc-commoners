<?php

use Queulat\Post_Type;

class Ccgn_Projects_Post_Type extends Post_Type {
	public function get_post_type() : string {
		return 'ccgn-projects';
	}
	public function get_post_type_args() : array {
		return [
			'label'                 => __( 'Initiatives and Projects', 'cpt_ccgn-projects' ),
			'labels'                => [
				'name'                     => __( 'Initiatives and Projects', 'cpt_ccgn-projects' ),
				'singular_name'            => __( 'Initiatives and Projects', 'cpt_ccgn-projects' ),
				'add_new'                  => __( 'Add New', 'cpt_ccgn-projects' ),
				'add_new_item'             => __( 'Add New Page', 'cpt_ccgn-projects' ),
				'edit_item'                => __( 'Edit Page', 'cpt_ccgn-projects' ),
				'new_item'                 => __( 'New Page', 'cpt_ccgn-projects' ),
				'view_item'                => __( 'View Page', 'cpt_ccgn-projects' ),
				'view_items'               => __( 'View Pages', 'cpt_ccgn-projects' ),
				'search_items'             => __( 'Search Pages', 'cpt_ccgn-projects' ),
				'not_found'                => __( 'No pages found.', 'cpt_ccgn-projects' ),
				'not_found_in_trash'       => __( 'No pages found in Trash.', 'cpt_ccgn-projects' ),
				'parent_item_colon'        => __( 'Parent Page:', 'cpt_ccgn-projects' ),
				'all_items'                => __( 'Initiatives and Projects', 'cpt_ccgn-projects' ),
				'archives'                 => __( 'Initiatives and Projects', 'cpt_ccgn-projects' ),
				'attributes'               => __( 'Page Attributes', 'cpt_ccgn-projects' ),
				'insert_into_item'         => __( 'Insert into page', 'cpt_ccgn-projects' ),
				'uploaded_to_this_item'    => __( 'Uploaded to this page', 'cpt_ccgn-projects' ),
				'featured_image'           => __( 'Featured image', 'cpt_ccgn-projects' ),
				'set_featured_image'       => __( 'Set featured image', 'cpt_ccgn-projects' ),
				'remove_featured_image'    => __( 'Remove featured image', 'cpt_ccgn-projects' ),
				'use_featured_image'       => __( 'Use as featured image', 'cpt_ccgn-projects' ),
				'filter_items_list'        => __( 'Filter pages list', 'cpt_ccgn-projects' ),
				'items_list_navigation'    => __( 'Pages list navigation', 'cpt_ccgn-projects' ),
				'items_list'               => __( 'Pages list', 'cpt_ccgn-projects' ),
				'item_published'           => __( 'Page published.', 'cpt_ccgn-projects' ),
				'item_published_privately' => __( 'Page published privately.', 'cpt_ccgn-projects' ),
				'item_reverted_to_draft'   => __( 'Page reverted to draft.', 'cpt_ccgn-projects' ),
				'item_scheduled'           => __( 'Page scheduled.', 'cpt_ccgn-projects' ),
				'item_updated'             => __( 'Page updated.', 'cpt_ccgn-projects' ),
				'menu_name'                => __( 'Initiatives and Projects', 'cpt_ccgn-projects' ),
				'name_admin_bar'           => __( 'Initiatives and Projects', 'cpt_ccgn-projects' ),
			],
			'description'           => __( '', 'cpt_ccgn-projects' ),
			'public'                => true,
			'hierarchical'          => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'show_in_nav_menus'     => true,
			'show_in_admin_bar'     => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-media-document',
			'capability_type'       => [
				0 => 'ccgn-project',
				1 => 'ccgn-projects',
			],
			'map_meta_cap'          => true,
			'register_meta_box_cb'  => null,
			'taxonomies'            => [],
			'has_archive'           => false,
			'query_var'             => 'ccgn-projects',
			'can_export'            => true,
			'delete_with_user'      => true,
			'rewrite'               => [
				'with_front' => true,
				'feeds'      => true,
				'pages'      => true,
				'slug'       => 'initiative-and-projects',
				'ep_mask'    => 1,
			],
			'supports'              => [
				0 => 'title',
				1 => 'editor',
				2 => 'thumbnail',
			],
			'show_in_rest'          => true,
			'rest_base'             => false,
			'rest_controller_class' => false,
			'rest_controller'       => null,
		];
	}
}
