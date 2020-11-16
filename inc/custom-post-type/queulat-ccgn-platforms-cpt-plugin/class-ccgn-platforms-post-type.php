<?php

use Queulat\Post_Type;

class Ccgn_Platforms_Post_Type extends Post_Type {
	public function get_post_type() : string {
		return 'ccgn-platforms';
	}
	public function get_post_type_args() : array {
		return [
			'label'                 => __('Platforms', 'cpt_ccgn_platforms'),
			'labels'                => [
				'name'                     => __('Platforms', 'cpt_ccgn_platforms'),
				'singular_name'            => __('Platforms', 'cpt_ccgn_platforms'),
				'add_new'                  => __('Add New', 'cpt_ccgn_platforms'),
				'add_new_item'             => __('Add New Page', 'cpt_ccgn_platforms'),
				'edit_item'                => __('Edit Page', 'cpt_ccgn_platforms'),
				'new_item'                 => __('New Page', 'cpt_ccgn_platforms'),
				'view_item'                => __('View Page', 'cpt_ccgn_platforms'),
				'view_items'               => __('View Pages', 'cpt_ccgn_platforms'),
				'search_items'             => __('Search Pages', 'cpt_ccgn_platforms'),
				'not_found'                => __('No pages found.', 'cpt_ccgn_platforms'),
				'not_found_in_trash'       => __('No pages found in Trash.', 'cpt_ccgn_platforms'),
				'parent_item_colon'        => __('Parent Page:', 'cpt_ccgn_platforms'),
				'all_items'                => __('Platforms', 'cpt_ccgn_platforms'),
				'archives'                 => __('Platforms', 'cpt_ccgn_platforms'),
				'attributes'               => __('Page Attributes', 'cpt_ccgn_platforms'),
				'insert_into_item'         => __('Insert into page', 'cpt_ccgn_platforms'),
				'uploaded_to_this_item'    => __('Uploaded to this page', 'cpt_ccgn_platforms'),
				'featured_image'           => __('Featured image', 'cpt_ccgn_platforms'),
				'set_featured_image'       => __('Set featured image', 'cpt_ccgn_platforms'),
				'remove_featured_image'    => __('Remove featured image', 'cpt_ccgn_platforms'),
				'use_featured_image'       => __('Use as featured image', 'cpt_ccgn_platforms'),
				'filter_items_list'        => __('Filter pages list', 'cpt_ccgn_platforms'),
				'items_list_navigation'    => __('Pages list navigation', 'cpt_ccgn_platforms'),
				'items_list'               => __('Pages list', 'cpt_ccgn_platforms'),
				'item_published'           => __('Page published.', 'cpt_ccgn_platforms'),
				'item_published_privately' => __('Page published privately.', 'cpt_ccgn_platforms'),
				'item_reverted_to_draft'   => __('Page reverted to draft.', 'cpt_ccgn_platforms'),
				'item_scheduled'           => __('Page scheduled.', 'cpt_ccgn_platforms'),
				'item_updated'             => __('Page updated.', 'cpt_ccgn_platforms'),
				'menu_name'                => __('Platforms', 'cpt_ccgn_platforms'),
				'name_admin_bar'           => __('Platforms', 'cpt_ccgn_platforms'),
			],
			'description'           => __('', 'cpt_ccgn_platforms'),
			'public'                => true,
			'hierarchical'          => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'show_in_nav_menus'     => true,
			'show_in_admin_bar'     => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-admin-multisite',
			'capability_type'       => [
				0 => 'ccgn_platforms',
				1 => 'ccgn_platform',
			],
			'map_meta_cap'          => true,
			'register_meta_box_cb'  => null,
			'taxonomies'            => [],
			'has_archive'           => true,
			'query_var'             => 'ccgn_platforms',
			'can_export'            => true,
			'delete_with_user'      => true,
			'rewrite'               => [
				'with_front' => true,
				'feeds'      => true,
				'pages'      => true,
				'slug'       => 'ccgn_platforms',
				'ep_mask'    => 1,
			],
			'supports'              => [
				0 => 'title',
				1 => 'editor',
				2 => 'thumbnail',
				3 => 'excerpt',
				4 => 'page-attributes',
			],
			'show_in_rest'          => true,
			'rest_base'             => false,
			'rest_controller_class' => false,
			'rest_controller'       => null
		];
	}
}
