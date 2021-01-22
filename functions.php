<?php

/**
 * Functions: list
 *
 * @version 2020.10.01
 * @package wp-theme-cc-commoners
 */

/*
 Theme Constants (to speed up some common things) ------*/
/* Theme Constants (to speed up some common things) ------*/
define( 'THEME_LOCAL_URI', get_stylesheet_directory_uri() );
define( 'THEME_PARENT_URI', get_template_directory_uri() );

define( 'MEMBERS_PAGE_ID', 4 );
/*
	calling related files
*/
	require get_stylesheet_directory() . '/inc/site.php';
	require get_stylesheet_directory() . '/inc/render.php';
	require get_stylesheet_directory() . '/inc/widgets.php';
	require get_stylesheet_directory() . '/inc/bp-integration.php';
	require get_stylesheet_directory() . '/inc/search.php';
	require get_stylesheet_directory() . '/inc/settings.php';
	require get_stylesheet_directory() . '/inc/filters.php';
	require get_stylesheet_directory() . '/inc/taxonomies.php';
	require get_stylesheet_directory() . '/inc/class-ccgn-components.php';

// Custom Post type files
require get_stylesheet_directory() . '/inc/custom-post-type/queulat-ccgn-projects-cpt-plugin/ccgn-projects-cpt-plugin.php';
require get_stylesheet_directory() . '/inc/custom-post-type/queulat-ccgn-faq-cpt-plugin/ccgn-faq-cpt-plugin.php';
require get_stylesheet_directory() . '/inc/custom-post-type/queulat-ccgn-platforms-cpt-plugin/ccgn-platforms-cpt-plugin.php';
require get_stylesheet_directory() . '/inc/custom-post-type/queulat-cc-chapters-cpt-plugin/cc-chapters-cpt-plugin.php';
require get_stylesheet_directory() . '/inc/custom-post-type/queulat-ccgnfeature-cpt-plugin/ccgnfeature-cpt-plugin.php';

/* AVATAR MAX CROP SIZING */
define( 'BP_AVATAR_THUMB_WIDTH', 150 );
define( 'BP_AVATAR_THUMB_HEIGHT', 150 );
define( 'BP_AVATAR_FULL_WIDTH', 300 );
define( 'BP_AVATAR_FULL_HEIGHT', 300 );


// Define custom thumbnail sizes
// add_image_size( $name, $width, $height, $crop );
add_image_size( 'squared', 300, 300, true );
add_image_size( 'landscape-medium', 740, 416, true );
add_image_size( 'landscape-featured', 2000, 700, true );
add_image_size( 'homepage-portrait-large', 260, 570, true );
add_image_size( 'portrait-page', 480, 600, true );
add_image_size( 'homepage-squared', 270, 270, true );
add_image_size( 'homepage-landscape', 380, 260, true );

/**
 * Theme specific stuff
 * --------------------
 * */

/**
 * Theme singleton class
 * ---------------------
 * Stores various theme and site specific info and groups custom methods
 **/
class ccgn_site {
	private static $instance;

	protected $settings;
	public $show_welcome = true;

	const id                         = __CLASS__;
	const theme_ver                  = '2020.10.01';
	const theme_settings_permissions = 'edit_theme_options';
	private function __construct() {
		/**
		 * Get our custom theme options so we can easily access them
		 * on templates or other admin pages
		 * */
		// $this->settings = get_option( __CLASS__ .'_theme_settings' );
		$this->actions_manager();

	}
	public function __get( $key ) {
		return isset( $this->$key ) ? $this->$key : null;
	}
	public function __isset( $key ) {
		return isset( $this->$key );
	}
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			$c              = __CLASS__;
			self::$instance = new $c();
		}
		return self::$instance;
	}
	public function __clone() {
		trigger_error( 'Clone is not allowed.', E_USER_ERROR );
	}
	/**
	 * Setup theme actions, both in the front and back end
	 * */
	public function actions_manager() {
		add_action( 'after_setup_theme', array( $this, 'setup_theme' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
		add_action( 'init', array( $this, 'init_functions' ) );
		add_action( 'init', array( $this, 'register_menus_locations' ) );
		add_filter( 'cc_theme_base_mandatory_sidebars', array( $this, 'register_sidebars' ) );
		add_filter( 'cc_active_parent_widgets_list', array( $this, 'unregister_parent_widgets' ) );
	}
	public function init_functions() {
		add_post_type_support( 'page', 'excerpt' );
	}
	/**
	 * Remove CC.org news widgets to extend it in this child theme
	 * because we need to change the format
	 */
	public function unregister_parent_widgets( $widget_list ) {
		$remove_parent_widgets = array(
			'cc-org-news',
			'cc-list-entries',
		);
		foreach ( $remove_parent_widgets as $widget ) {
			$key = array_search( $widget, $widget_list );
			if ( ! empty( $key ) ) {
				unset( $widget_list[ $key ] );
			}
		}
		return $widget_list;
	}
	/**
	 * Enable theme extra supports
	 *
	 * @return void
	 */
	public function setup_theme() {
		add_theme_support( 'post-formats', array( 'gallery', 'image', 'video' ) );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'menus' );
	}
	public function register_sidebars( $sidebars ) {
		$sidebars['Homepage platforms'] = array(
			'name' => 'homepage-platforms',
		);
		$sidebars['Single Platforms']   = array(
			'name' => 'single-platform',
		);
		return $sidebars;
	}
	public function register_menus_locations() {
		register_nav_menus(
			array(
				'main-menu'        => 'Main menu',
				'main-menu-mobile' => 'Main menu mobile',
				'secondary'        => 'Secondary menu',
				'footer'           => 'Footer menu',
			)
		);
	}

	public function get_post_thumbnail_url( $postid = null, $size = 'landscape-medium' ) {
		if ( is_null( $postid ) ) {
			global $post;
			$postid = $post->ID;
		}
		$thumb_id = get_post_thumbnail_id( $postid );
		$img_src  = wp_get_attachment_image_src( $thumb_id, $size );
		return $img_src ? current( $img_src ) : '';
	}

	public function enqueue_styles() {
		// Front-end styles
		wp_enqueue_style( 'commoners_style', THEME_LOCAL_URI . '/assets/css/styles.css', array(), self::theme_ver );
		wp_enqueue_style( 'dashicons' );
	}

	function admin_enqueue_scripts() {
		// admin scripts
		$current_screen = get_current_screen();
		if ( is_admin() && ( $current_screen->id == 'dashboard_page_ccgn-site-settings' ) ) {
			wp_enqueue_media();
		}
	}

	function enqueue_scripts() {
		// front-end scripts
		wp_enqueue_script( 'jquery', true );
		wp_enqueue_script( 'dependencies', THEME_LOCAL_URI . '/assets/js/dependencies.js', array( 'jquery' ), self::theme_ver, true );
		wp_enqueue_script( 'commoners_script', THEME_LOCAL_URI . '/assets/js/script.js', array( 'jquery' ), self::theme_ver, true );
		// attach data to script.js
		$ajax_data = array(
			'url' => admin_url( 'admin-ajax.php' ),
		);
		wp_localize_script( 'commoners_script', 'Ajax', $ajax_data );

		if ( is_post_type_archive( 'cc_chapters' ) ) {
			wp_enqueue_script( 'cc-theme-datatable', THEME_LOCAL_URI . '/assets/js/datatables.min.js', array( 'jquery' ), self::theme_ver, true );
			wp_enqueue_script( 'cc-theme-responsive-datatable', THEME_LOCAL_URI . '/assets/js/responsive.datatables.min.js', array( 'cc-theme-datatable' ), self::theme_ver, true );
			wp_enqueue_script( 'cc-commoners-chapters-panzoom', THEME_LOCAL_URI . '/assets/js/svgpanzoom.js', array( 'jquery' ), self::theme_ver, true );
			wp_enqueue_script( 'cc-commoners-chapters', THEME_LOCAL_URI . '/assets/js/commoners-chapters.js', array( 'jquery' ), self::theme_ver, true );
			wp_localize_script( 'cc-commoners-chapters', 'Ajax', $ajax_data );

			wp_enqueue_style( 'cc-datatables-styles', THEME_LOCAL_URI . '/assets/css/datatables.css', array(), self::theme_ver );
			wp_enqueue_style( 'cc-datatables-responsive-styles', THEME_LOCAL_URI . '/assets/css/responsive.datatables.min.css', array(), self::theme_ver );
			wp_enqueue_style( 'cc-datatables-styles-foundation', THEME_LOCAL_URI . '/assets/css/datatables.css', array( 'cc-datatables-styles' ), self::theme_ver );
		}
	}
}

/**
 * Instantiate the class object
 * */

$_s = ccgn_site::get_instance();
