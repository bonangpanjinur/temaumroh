<?php
/**
 * Tema Umroh Enterprise functions and definitions
 */

function temaumroh_setup() {
    // Add support for title tag
    add_theme_support( 'title-tag' );

    // Add support for post thumbnails
    add_theme_support( 'post-thumbnails' );

    // Register navigation menus
    register_nav_menus( array(
        'main-menu' => esc_html__( 'Main Menu', 'temaumroh' ),
    ) );
}
add_action( 'after_setup_theme', 'temaumroh_setup' );

function temaumroh_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style( 'temaumroh-style', get_stylesheet_uri() );

    // Enqueue custom UMH styles
    wp_enqueue_style( 'temaumroh-umroh-custom', get_template_directory_uri() . '/assets/css/umroh-custom.css', array(), '1.0.0' );

    // Enqueue main JS
    wp_enqueue_script( 'temaumroh-main-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'temaumroh_scripts' );
