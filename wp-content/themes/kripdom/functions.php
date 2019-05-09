<?php
add_image_size('full_hd', 1920, 1080);
add_image_size('large', 1024, 768);
add_image_size('medium', 300, 300);

/*add_action( 'wp_enqueue_scripts', function(){
    if (is_admin()) return; // don't dequeue on the backend
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery',  get_stylesheet_directory_uri() . '/src/js/vendor/jquery-3.2.1.min.js', array(), null, false );
    wp_enqueue_script( 'jquery');
});*/


function global_scripts() {
    wp_enqueue_style('main-style', get_stylesheet_directory_uri() . '/build/style.css', array());

    wp_enqueue_script('bundle', get_template_directory_uri() . '/build/bundle.js', array('jquery'));

    wp_localize_script('bundle', 'ajaxMeta', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));

}

add_action('wp_enqueue_scripts', 'global_scripts');



add_action( 'wp_enqueue_scripts', 'add_theme_stylesheet' );

function add_theme_stylesheet() {
    wp_enqueue_script( 'wpb_composer_front_js' );
    wp_enqueue_style( 'js_composer_front' );
    wp_enqueue_style( 'js_composer_custom_css' );
}


function remove_head_scripts()
{
    remove_action('wp_head', 'wp_print_scripts');
    remove_action('wp_head', 'wp_print_head_scripts', 9);
    remove_action('wp_head', 'wp_enqueue_scripts', 1);
    remove_action('wp_head', 'wp_print_styles', 99);
    remove_action('wp_head', 'wp_enqueue_style', 99);


    add_action('wp_footer', 'wp_print_scripts', 5);
    add_action('wp_footer', 'wp_enqueue_scripts', 5);
    add_action('wp_footer', 'wp_print_head_scripts', 5);
    add_action('wp_head', 'wp_print_styles', 30);
    add_action('wp_head', 'wp_enqueue_style', 30);
}

add_action('wp_enqueue_scripts', 'remove_head_scripts');


show_admin_bar(false);


add_theme_support('menus');

// SVG support
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['eps'] = 'application/postscript';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


// ACF Options page
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}


function remove_menus(){
    remove_menu_page( 'edit-comments.php' ); //Comments

}
add_action( 'admin_menu', 'remove_menus' );


add_action( 'after_setup_theme', 'wpse_theme_setup' );
function wpse_theme_setup() {
    add_theme_support( 'title-tag' );
}

add_theme_support( 'post-thumbnails' );

function get_excerpt(){
    $excerpt = get_the_content();
    $excerpt = preg_replace(" ([.*?])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, 100);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    $excerpt = $excerpt.'...';
    return $excerpt;
}

require_once( __DIR__ . '/core/core.php');