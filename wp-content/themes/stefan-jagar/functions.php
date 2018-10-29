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

add_action( 'pre_get_posts', function( $query ) {
    if ( is_home() )  {
        $query->set('year', 2018);
    }
} );

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

    wp_enqueue_script( 'app', $assetsDir.'/js/dist/main.bundle.js', null, bust_cache('/js/dist/bundle.js'), true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_styles_and_scripts' );

function bust_cache( $file_name ) {
    $assetsPath = get_stylesheet_directory() . '/assets';
    return filemtime($assetsPath . $file_name);
}

/**
 * Custom image sizes
 */
add_image_size( 'placeholder', 100, null, false );
/**
 * Breakpoints
 * ===
 * 320 (Thumbnail)
 * 480
 * 540 
 * 639
 * 760 (Medium)
 * 1110 (large)
 * 1520 (medium x2)
 * 2220 (large x2)
 */
add_image_size('width_480', 480, null);
add_image_size('width_540', 540, null);
add_image_size('width_639', 639, null);
add_image_size('width_1520', 1520, null);
add_image_size('width_2220', 2220, null);

add_filter('wp_calculate_image_sizes', function ($sizes, $size, $image_src, $image_meta, $attachment_id) {
    return '(min-width: 1200px) 760px, (min-width: 992px) 639px, (min-width: 767px) 600px, (min-width: 567px) 540px, 100vw';
}, 10, 5);

add_filter('wp_get_attachment_image_attributes', function ( $attr, $attachment, $size ) {
    var_dump($attr);
    return $attr;
}, 10, 3 );

/**
 * ACF Options Page
 */
acf_add_options_page( array(
    'page_title' => 'Live',
    'menu_slug' => 'Live',
    'icon_url' => 'dashicons-clock'
) );
acf_add_options_page( array(
    'page_title' => 'Statistik',
    'menu_slug' => 'statistik',
    'icon_url' => 'dashicons-media-spreadsheet'
) );

register_post_type( 'hunting_day', array(
    'labels' => array(
        'name' => 'Jaktdag',
        'singular_name' => 'Jaktdag',
        'add_new' => 'Lägg till jaktdag',
        'add_new_item' => 'Lägg till jaktdag'
    ),
    'public' => true,
    'menu_icon' => 'dashicons-calendar-alt',
    'supports' => array('title')
) );

/**
 * Remove emojis
 */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/**
 * Removes Comments from the backend
 */
function remove_comments_from_menu() {
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'remove_comments_from_menu');

/**
 * Helpers
 */
function asset( $path ) {
    return get_bloginfo('template_directory') . '/assets/' . $path;
}

/**
 * Helper for getting the URL to a thumbnail
 */
function get_thumbnail_url( $post_id, $size = null ) {
    $imageObject = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size );
    return $imageObject[0];
}

/**
 * Wrappar YouTube-embeds med div.embed.
 */
function wrap_embed_with_div( $html, $url, $attr ) {
    return '<div class="embed">' . $html . '</div>';
}
add_filter('embed_oembed_html', 'wrap_embed_with_div', 10, 3);