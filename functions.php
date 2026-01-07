<?php
// Folder: temaumroh/
// File: functions.php

/**
 * Tema Umroh Enterprise functions and definitions
 */

function temaumroh_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    register_nav_menus( array(
        'main-menu' => esc_html__( 'Main Menu', 'temaumroh' ),
        'footer-menu' => esc_html__( 'Footer Menu', 'temaumroh' ),
    ) );
}
add_action( 'after_setup_theme', 'temaumroh_setup' );

function temaumroh_scripts() {
    // 1. Main Stylesheet
    $style_ver = file_exists( get_stylesheet_directory() . '/style.css' ) 
        ? filemtime( get_stylesheet_directory() . '/style.css' ) 
        : '1.0.0';
    wp_enqueue_style( 'temaumroh-style', get_stylesheet_uri(), array(), $style_ver );
    
    // 2. Fonts & Icons
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Lato:wght@400;700&display=swap' );
    wp_enqueue_style( 'remixicon', 'https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css' );

    // 3. Custom CSS for Plugin Integration
    $custom_css_path = get_template_directory() . '/assets/css/umroh-custom.css';
    $custom_css_ver  = file_exists( $custom_css_path ) ? filemtime( $custom_css_path ) : '1.1.0';
    wp_enqueue_style( 'temaumroh-custom', get_template_directory_uri() . '/assets/css/umroh-custom.css', array(), $custom_css_ver );

    // 4. JS
    wp_enqueue_script( 'temaumroh-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'temaumroh_scripts' );

/**
 * --- INTEGRATION HELPER ---
 * Mengambil data paket & jadwal dari Plugin dengan aman.
 */

function umh_get_featured_packages($limit = 3) {
    // Cek apakah class plugin tersedia
    if ( ! class_exists( 'UmhMgmt\Repositories\PackageRepository' ) ) {
        return []; // Return array kosong agar tidak fatal error
    }

    try {
        $repo = new \UmhMgmt\Repositories\PackageRepository();
        // Menggunakan Transient API (Cache) untuk performa
        $cache_key = 'umh_featured_pkg_' . $limit;
        $packages = get_transient( $cache_key );

        if ( false === $packages ) {
            $all_packages = $repo->all();
            
            // Limitasi manual karena repo->all() mengambil semua
            $packages = array_slice($all_packages, 0, $limit);
            
            // Enrich data dengan harga
            foreach ($packages as $pkg) {
                if (method_exists($repo, 'getPricing')) {
                    $pricing = $repo->getPricing($pkg->id);
                    $pkg->start_from = $pricing['quad'] ?? $pkg->base_price; // Fallback ke base_price
                } else {
                    $pkg->start_from = 0;
                }
            }
            
            // Simpan cache selama 1 jam
            set_transient( $cache_key, $packages, HOUR_IN_SECONDS );
        }

        return $packages;

    } catch (Exception $e) {
        error_log('UMH Error: ' . $e->getMessage());
        return [];
    }
}

function umh_get_upcoming_departures($limit = 5) {
    if ( ! class_exists( 'UmhMgmt\Repositories\OperationalRepository' ) ) {
        return [];
    }

    try {
        $repo = new \UmhMgmt\Repositories\OperationalRepository();
        $cache_key = 'umh_upcoming_dep_' . $limit;
        $departures = get_transient( $cache_key );

        if ( false === $departures ) {
            $departures = $repo->getUpcomingDepartures($limit);
            set_transient( $cache_key, $departures, HOUR_IN_SECONDS );
        }
        
        return $departures;
    } catch (Exception $e) {
        return [];
    }
}

// Flush cache saat ada perubahan data (Hook opsional jika plugin support action hook)
add_action('umh_package_saved', function() {
    delete_transient('umh_featured_pkg_3');
    delete_transient('umh_featured_pkg_6');
});