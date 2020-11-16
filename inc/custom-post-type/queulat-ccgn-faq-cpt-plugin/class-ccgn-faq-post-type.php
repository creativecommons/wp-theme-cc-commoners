<?php

use Queulat\Post_Type;

class Ccgn_Faq_Post_Type extends Post_Type {
	public function get_post_type() : string {
		return 'ccgn-faq';
	}
	public function get_post_type_args() : array {
		return [
			'label'                 => __('FAQ', 'cpt_ccgn-faq'),
			'labels'                => [
				'name'                     => __('FAQ', 'cpt_ccgn-faq'),
				'singular_name'            => __('FAQ', 'cpt_ccgn-faq'),
				'add_new'                  => __('Add New', 'cpt_ccgn-faq'),
				'add_new_item'             => __('Add New Page', 'cpt_ccgn-faq'),
				'edit_item'                => __('Edit Page', 'cpt_ccgn-faq'),
				'new_item'                 => __('New Page', 'cpt_ccgn-faq'),
				'view_item'                => __('View Page', 'cpt_ccgn-faq'),
				'view_items'               => __('View Pages', 'cpt_ccgn-faq'),
				'search_items'             => __('Search Pages', 'cpt_ccgn-faq'),
				'not_found'                => __('No pages found.', 'cpt_ccgn-faq'),
				'not_found_in_trash'       => __('No pages found in Trash.', 'cpt_ccgn-faq'),
				'parent_item_colon'        => __('Parent Page:', 'cpt_ccgn-faq'),
				'all_items'                => __('FAQ', 'cpt_ccgn-faq'),
				'archives'                 => __('FAQ', 'cpt_ccgn-faq'),
				'attributes'               => __('Page Attributes', 'cpt_ccgn-faq'),
				'insert_into_item'         => __('Insert into page', 'cpt_ccgn-faq'),
				'uploaded_to_this_item'    => __('Uploaded to this page', 'cpt_ccgn-faq'),
				'featured_image'           => __('Featured image', 'cpt_ccgn-faq'),
				'set_featured_image'       => __('Set featured image', 'cpt_ccgn-faq'),
				'remove_featured_image'    => __('Remove featured image', 'cpt_ccgn-faq'),
				'use_featured_image'       => __('Use as featured image', 'cpt_ccgn-faq'),
				'filter_items_list'        => __('Filter pages list', 'cpt_ccgn-faq'),
				'items_list_navigation'    => __('Pages list navigation', 'cpt_ccgn-faq'),
				'items_list'               => __('Pages list', 'cpt_ccgn-faq'),
				'item_published'           => __('Page published.', 'cpt_ccgn-faq'),
				'item_published_privately' => __('Page published privately.', 'cpt_ccgn-faq'),
				'item_reverted_to_draft'   => __('Page reverted to draft.', 'cpt_ccgn-faq'),
				'item_scheduled'           => __('Page scheduled.', 'cpt_ccgn-faq'),
				'item_updated'             => __('Page updated.', 'cpt_ccgn-faq'),
				'menu_name'                => __('FAQ', 'cpt_ccgn-faq'),
				'name_admin_bar'           => __('FAQ', 'cpt_ccgn-faq'),
			],
			'description'           => __('', 'cpt_ccgn-faq'),
			'public'                => true,
			'hierarchical'          => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'show_in_nav_menus'     => true,
			'show_in_admin_bar'     => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-editor-help',
			'capability_type'       => [
				0 => 'ccgn-faq',
				1 => 'ccgn-faqs',
			],
			'map_meta_cap'          => true,
			'register_meta_box_cb'  => null,
			'taxonomies'            => [],
			'has_archive'           => true,
			'query_var'             => 'ccgn-faq',
			'can_export'            => true,
			'delete_with_user'      => true,
			'rewrite'               => [
				'with_front' => true,
				'feeds'      => true,
				'pages'      => true,
				'slug'       => 'faq',
				'ep_mask'    => 1,
			],
			'supports'              => [
				0 => 'title',
				1 => 'editor',
			],
			'show_in_rest'          => true,
			'rest_base'             => false,
			'rest_controller_class' => false,
			'rest_controller'       => null
		];
	}
}
