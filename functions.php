<?php
/**
 * Dokanee.
 *
 * Please do not make any edits to this file. All edits should be done in a child theme.
 *
 * @package Dokanee
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Set our theme version.
define( 'GENERATE_VERSION', '2.1.2' );

if ( ! function_exists( 'dokanee_setup' ) ) {
	add_action( 'after_setup_theme', 'dokanee_setup' );
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since 0.1
	 */
	function dokanee_setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'dokanee' );

		// Add theme support for various features.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'status' ) );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'custom-logo', array(
			'height' => 70,
			'width' => 350,
			'flex-height' => true,
			'flex-width' => true
		) );

		add_image_size( 'single-vendor-thumb', 270, 160, true );

		// Register primary menu.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'dokanee' ),
		) );

		/**
		 * Set the content width to something large
		 * We set a more accurate width in dokanee_smart_content_width()
		 */
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 1200; /* pixels */
		}

		// This theme styles the visual editor to resemble the theme style.
		add_editor_style( 'assets/css/admin/editor-style.css' );

		// WooCommerce support
		add_theme_support( 'woocommerce', array(
			'thumbnail_image_width' => 260,
		) );

		update_option( 'woocommerce_thumbnail_cropping', 'custom' );
		update_option( 'woocommerce_thumbnail_cropping_custom_width', '4' );
		update_option( 'woocommerce_thumbnail_cropping_custom_height', '3' );
	}
}

if ( ! function_exists( 'slider_page' ) ) {
	add_action( 'dokan_admin_menu', 'slider_page' );
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since 0.1
	 */
	function slider_page() {
		add_submenu_page( 'themes.php', __( 'Slider', 'dokanee' ), __( 'Slider', 'dokanee' ), 'manage_options', 'edit.php?post_type=dokanee_slider' );
	}
}


/**
 * Get all necessary theme files
 */
require get_template_directory() . '/inc/theme-functions.php';
require get_template_directory() . '/inc/defaults.php';
require get_template_directory() . '/inc/class-css.php';
require get_template_directory() . '/inc/css-output.php';
require get_template_directory() . '/inc/general.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/markup.php';
require get_template_directory() . '/inc/element-classes.php';
require get_template_directory() . '/inc/typography.php';
require get_template_directory() . '/inc/plugin-compat.php';
require get_template_directory() . '/inc/migrate.php';
require get_template_directory() . '/inc/deprecated.php';

require get_template_directory() . '/inc/wc-template.php';
require get_template_directory() . '/inc/slider.php';

if ( is_admin() ) {
	require get_template_directory() . '/inc/meta-box.php';
	require get_template_directory() . '/inc/dashboard.php';
}

/**
 * Load our theme structure
 */
require get_template_directory() . '/inc/structure/archives.php';
require get_template_directory() . '/inc/structure/comments.php';
require get_template_directory() . '/inc/structure/featured-images.php';
require get_template_directory() . '/inc/structure/footer.php';
require get_template_directory() . '/inc/structure/header.php';
require get_template_directory() . '/inc/structure/navigation.php';
require get_template_directory() . '/inc/structure/post-meta.php';
require get_template_directory() . '/inc/structure/sidebars.php';


Dokanee_Slider::init();