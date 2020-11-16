<?php
/**
 * Plugin Name: Platforms Custom Post Type Plugin
 * Plugin URI:
 * Description: 
 * Version: 0.1.0
 * Author:
 * Author URI:
 * License: GPL-3.0-or-later
 */

function Ccgn_Platforms_Post_Type_register_post_type(){
	require_once __DIR__ .'/class-ccgn-platforms-post-type.php';
	Ccgn_Platforms_Post_Type::activate_plugin();
	require_once __DIR__ .'/class-ccgn-platforms-post-type.php';
	require_once __DIR__ .'/class-ccgn-platforms-post-query.php';
	require_once __DIR__ .'/class-ccgn-platforms-post-object.php';
	require_once __DIR__ .'/class-ccgn-platforms-metabox.php';
};

add_action('init', 'Ccgn_Platforms_Post_Type_register_post_type');
