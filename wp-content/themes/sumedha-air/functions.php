<?php
/**
 * Sumedha Air Theme Functions
 *
 * @package Sumedha_Air
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Theme Setup
 */
function sumedha_air_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support( 'post-thumbnails' );

    // Add custom image sizes for service images
    add_image_size( 'service-image', 800, 600, true );
    add_image_size( 'hero-image', 1920, 1080, true );

    // Register navigation menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'sumedha-air' ),
        'footer'  => __( 'Footer Menu', 'sumedha-air' ),
    ) );

    // Switch default core markup to output valid HTML5
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
    ) );

    // Add theme support for selective refresh for widgets
    add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'sumedha_air_setup' );

/**
 * Enqueue scripts and styles
 */
function sumedha_air_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style(
        'sumedha-air-style',
        get_stylesheet_uri(),
        array(),
        '1.0.0'
    );

    // Enqueue mobile menu script
    wp_enqueue_script(
        'sumedha-air-menu',
        get_template_directory_uri() . '/js/menu.js',
        array(),
        '1.0.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'sumedha_air_scripts' );

/**
 * Clean up WordPress head
 */
function sumedha_air_cleanup_head() {
    // Remove WordPress version number
    remove_action( 'wp_head', 'wp_generator' );

    // Remove Windows Live Writer manifest link
    remove_action( 'wp_head', 'wlwmanifest_link' );

    // Remove RSD link
    remove_action( 'wp_head', 'rsd_link' );

    // Remove shortlink
    remove_action( 'wp_head', 'wp_shortlink_wp_head' );
}
add_action( 'init', 'sumedha_air_cleanup_head' );

/**
 * Excerpt length for services
 */
function sumedha_air_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'sumedha_air_excerpt_length' );

/**
 * Custom excerpt more link
 */
function sumedha_air_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'sumedha_air_excerpt_more' );

/**
 * Add Contact Form 7 support
 */
function sumedha_air_wpcf7_support() {
    if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
        // Contact Form 7 is active
        return true;
    }
    return false;
}

/**
 * Disable emojis for performance
 */
function sumedha_air_disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'sumedha_air_disable_emojis' );

/**
 * Add emergency phone number to theme
 */
function sumedha_air_emergency_phone() {
    return apply_filters( 'sumedha_air_emergency_phone', '+977-XXX-XXXX' );
}

/**
 * Add emergency email to theme
 */
function sumedha_air_emergency_email() {
    return apply_filters( 'sumedha_air_emergency_email', 'info@sumedhaair.com' );
}

/**
 * Add company address to theme
 */
function sumedha_air_address() {
    return apply_filters( 'sumedha_air_address', 'Kathmandu, Nepal' );
}

/**
 * Content width
 */
if ( ! isset( $content_width ) ) {
    $content_width = 1200;
}
