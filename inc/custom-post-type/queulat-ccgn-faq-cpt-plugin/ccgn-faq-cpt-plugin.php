<?php
/**
 * Plugin Name: FAQ Custom Post Type Plugin
 * Plugin URI:
 * Description: 
 * Version: 0.1.0
 * Author:
 * Author URI:
 * License: GPL-3.0-or-later
 */

function Ccgn_Faq_Post_Type_register_post_type(){
	require_once __DIR__ .'/class-ccgn-faq-post-type.php';
	Ccgn_Faq_Post_Type::activate_plugin();
	require_once __DIR__ .'/class-ccgn-faq-post-type.php';
	require_once __DIR__ .'/class-ccgn-faq-post-query.php';
	require_once __DIR__ .'/class-ccgn-faq-post-object.php';
};

add_action('init', 'Ccgn_Faq_Post_Type_register_post_type');
