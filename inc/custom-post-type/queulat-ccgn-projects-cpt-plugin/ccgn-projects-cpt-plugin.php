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

function Ccgn_Projects_Post_Type_register_post_type(){
	require_once __DIR__ .'/class-ccgn-projects-post-type.php';
	Ccgn_Projects_Post_Type::activate_plugin();
	require_once __DIR__ .'/class-ccgn-projects-post-type.php';
	require_once __DIR__ .'/class-ccgn-projects-post-query.php';
	require_once __DIR__ .'/class-ccgn-projects-post-object.php';
	require_once __DIR__ .'/class-ccgn-projects-metabox.php';
};

add_action('init', 'Ccgn_Projects_Post_Type_register_post_type');
