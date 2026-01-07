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

function temaumroh_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Main Sidebar', 'temaumroh' ),
        'id'            => 'main-sidebar',
        'description'   => esc_html__( 'Add widgets here.', 'temaumroh' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'temaumroh_widgets_init' );

function temaumroh_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style( 'temaumroh-style', get_stylesheet_uri() );

    // Enqueue custom UMH styles
    wp_enqueue_style( 'temaumroh-umroh-custom', get_template_directory_uri() . '/assets/css/umroh-custom.css', array(), '1.0.0' );

    // Enqueue main JS
    wp_enqueue_script( 'temaumroh-main-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true );

    // Enqueue RemixIcon for icons as recommended in the guide
    wp_enqueue_style( 'remixicon', 'https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css' );
}
add_action( 'wp_enqueue_scripts', 'temaumroh_scripts' );
