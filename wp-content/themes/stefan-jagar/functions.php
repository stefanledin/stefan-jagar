<?php
/**
 * Theme setup
 */
function setup_theme() {
    /**
     * Title
     */
    add_theme_support('title-tag');

    /**
     * Thumbnails
     */
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'setup_theme' );

/**
 * Handle styles and scripts
 */
function enqueue_styles_and_scripts() {
    $themeDir = get_template_directory_uri();
    $assetsDir = $themeDir . '/assets';

    /**
     * CSS
     */
    wp_enqueue_style( 'stylesheet', $assetsDir . '/css/style.css', null, bust_cache('/css/style.css'), null );

    /**
     * Scripts
     */
    wp_deregister_script('wp-embed');
    wp_deregister_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'enqueue_styles_and_scripts' );

function bust_cache( $file_name ) {
    $assetsPath = get_stylesheet_directory() . '/assets';
    return filemtime($assetsPath . $file_name);
}

/**
 * Remove emojis
 */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/**
 * Helpers
 */
function asset( $path ) {
    return get_bloginfo('template_directory') . '/assets/' . $path;
}