<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\bundle;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    bundle('app')->enqueue();
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    bundle('editor')->enqueue();
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from the Soil plugin if activated.
     *
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil', [
        'clean-up',
        'nav-walker',
        'nice-search',
        'relative-urls',
    ]);

    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */

     
register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'footer_navigation_left' => __('Footer Navigation - Left', 'sage'),
        'footer_navigation_right' => __('Footer Navigation - Right', 'sage')
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary',
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer',
    ] + $config);
});


//  Register CPT Movies


// add_action( 'init', function() {
// 	register_extended_post_type( 'movie', [

// 		# Add the post type to the site's main RSS feed:
// 		'show_in_feed' => true,
// 		'show_in_rest' => true,

// 		# Show all posts on the post type archive:
// 		'archive' => [
// 			'nopaging' => true,
// 		],

// 		# Add some custom columns to the admin screen:
// 		'admin_cols' => [
// 			'movie_featured_image' => [
// 				'title'          => 'Illustration',
// 				'featured_image' => 'thumbnail'
// 			],
// 			// 'movie_published' => [
// 			// 	'title_icon'  => 'dashicons-calendar-alt',
// 			// 	'meta_key'    => 'published_date',
// 			// 	'date_format' => 'd/m/Y'
// 			// ],
// 			'movie_genre' => [
// 				'taxonomy' => 'Horror',
// 				'taxonomy' => 'Comedie',
// 				'taxonomy' => 'TV show',
// 				'taxonomy' => 'Drama'
				
// 			],
// 		],

// 		# Add some dropdown filters to the admin screen:
// 		'admin_filters' => [
// 			'movie_genre' => [
// 				'taxonomy' => 'genre'
// 			],
// 			'movie_rating' => [
// 				'meta_key' => 'star_rating',
// 			],
// 		],

// 	], [

// 		# Override the base names used for labels:
// 		'singular' => 'movie',
// 		'plural'   => 'Movies',
// 		'slug'     => 'Movies',

// 	] );

// 	register_extended_taxonomy( 'genre', 'movie', [

// 		# Use radio buttons in the meta box for this taxonomy on the post editing screen:
// 		'meta_box' => 'radio',

// 		# Add a custom column to the admin screen:
// 		'admin_cols' => [
// 			'updated' => [
// 				'title_cb'    => function() {
// 					return '<em>Last</em> Updated';
// 				},
// 				'meta_key'    => 'updated_date',
// 				'date_format' => 'd/m/Y'
// 			],
// 		],

// 	] );
// } );





