<?php
/**
 * Sets up the Artistry Showcase theme.
 *
 * This function sets up various theme features including localization, title tag support, post thumbnails support, HTML5 support, and navigation menus registration.
 *
 * @return void
 * @since 1.0.0
 *
 */
function artistry_showcase_setup() {
	load_theme_textdomain('artistry-showcase', get_template_directory() . '/languages');

	add_theme_support('title-tag');

	add_theme_support('post-thumbnails');

	add_theme_support('html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption'
	));

	register_nav_menus(array(
		'main-menu' => __('Main Menu', 'artistry-showcase'),
		'footer-menu' => __('Footer Menu', 'artistry-showcase')
	));
}
add_action('after_setup_theme', 'artistry_showcase_setup');

/**
 * Enqueues the styles and scripts for the Artistry Showcase theme.
 *
 * This function registers and enqueues the main stylesheet and custom scripts for the theme.
 *
 * @return void
 * @since 1.0.0
 *
 */
function artistry_showcase_scripts() {
	wp_enqueue_style('artistry-showcase-style', get_stylesheet_uri());
	wp_enqueue_script('artistry-showcase-scripts', get_template_directory_uri() . '/assets/js/custom-scripts.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'artistry_showcase_scripts');

/**
 * Initializes the widgets for the Artistry Showcase theme.
 *
 * This function registers a sidebar widget area for the theme. It sets the name, ID, description, and HTML markup for the widget area.
 *
 * @return void
 * @since 1.0.0
 *
 */
function artistry_showcase_widgets_init() {
	register_sidebar(array(
		'name' => __('Sidebar', 'artistry-showcase'),
		'id' => 'sidebar-1',
		'description' => __('Add widgets here to appear in your sidebar.', 'artistry-showcase'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
}
add_action('widgets_init', 'artistry_showcase_widgets_init');

/**
 * Sets up the custom header for the Artistry Showcase theme.
 *
 * This function adds support for a custom header to the theme. It sets the default header image, width, height, flexibility, and header text visibility.
 *
 * @return void
 * @since 1.0.0
 *
 */
function artistry_showcase_custom_header_setup() {
	add_theme_support('custom-header', apply_filters('artistry_showcase_custom_header_args', array(
		'default-image' => get_template_directory_uri() . '/assets/images/header.jpg',
		'width' => 2000,
		'height' => 1200,
		'flex-height' => true,
		'flex-width' => true,
		'header-text' => false,
	)));
}
add_action('after_setup_theme', 'artistry_showcase_custom_header_setup');

/**
 * Sets up the custom background for the Artistry Showcase theme.
 *
 * This function adds support for a custom background to the theme. It sets the default background color and image.
 *
 * @return void
 * @since 1.0.0
 *
 */
function artistry_showcase_custom_background_setup() {
	add_theme_support('custom-background', apply_filters('artistry_showcase_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	)));
}
add_action('after_setup_theme', 'artistry_showcase_custom_background_setup');

/**
 * Registers a custom post type for showcasing portfolios.
 *
 * @return void
 */
function artistry_showcase_custom_post_type() {
	$labels = array(
		'name' => __('Portfolios', 'artistry-showcase'),
		'singular_name' => __('Portfolio', 'artistry-showcase'),
		'menu_name' => __('Portfolios', 'artistry-showcase'),
		'name_admin_bar' => __('Portfolio', 'artistry-showcase'),
		'add_new' => __('Neues Portfolio hinzufügen', 'artistry-showcase'),
		'add_new_item' => __('Neues Portfolio hinzufügen', 'artistry-showcase'),
		'new_item' => __('Neues Portfolio', 'artistry-showcase'),
		'edit_item' => __('Portfolio bearbeiten', 'artistry-showcase'),
		'view_item' => __('Portfolio anzeigen', 'artistry-showcase'),
		'all_items' => __('Alle Portfolios', 'artistry-showcase'),
		'search_items' => __('Portfolios durchsuchen', 'artistry-showcase'),
		'parent_item_colon' => __('Übergeordnetes Portfolio:', 'artistry-showcase'),
		'not_found' => __('Keine Portfolios gefunden.', 'artistry-showcase'),
		'not_found_in_trash' => __('Keine Portfolios im Papierkorb gefunden.', 'artistry-showcase')
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'portfolio'),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
		'show_in_rest' => true
	);

	register_post_type('portfolio', $args);
}
add_action('init', 'artistry_showcase_custom_post_type');