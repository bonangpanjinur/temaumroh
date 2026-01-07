<?php
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
    // 1. Main Stylesheet (style.css)
    // Menggunakan filemtime agar versi otomatis berubah saat file diedit
    $style_ver = file_exists( get_stylesheet_directory() . '/style.css' ) 
        ? filemtime( get_stylesheet_directory() . '/style.css' ) 
        : '1.0.0';
        
    wp_enqueue_style( 'temaumroh-style', get_stylesheet_uri(), array(), $style_ver );
    
    // 2. Google Fonts (Amiri & Lato)
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Lato:wght@400;700&display=swap' );

    // 3. RemixIcon
    wp_enqueue_style( 'remixicon', 'https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css' );

    // 4. Custom CSS for Plugin Integration (umroh-custom.css)
    // FIX: Menggunakan filemtime untuk Cache Busting (Solusi masalah tampilan)
    $custom_css_path = get_template_directory() . '/assets/css/umroh-custom.css';
    $custom_css_ver  = file_exists( $custom_css_path ) ? filemtime( $custom_css_path ) : '1.1.0';

    wp_enqueue_style( 'temaumroh-custom', get_template_directory_uri() . '/assets/css/umroh-custom.css', array(), $custom_css_ver );

    // 5. Main JS
    wp_enqueue_script( 'temaumroh-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'temaumroh_scripts' );

/**
 * --- INTEGRATION HELPER (DENGAN CACHING) ---
 * Fungsi untuk mengambil data paket dari Plugin dengan performa tinggi
 */

function umh_get_featured_packages($limit = 3) {
    // Cek Cache (Transient)
    $cache_key = 'umh_featured_pkg_' . $limit;
    $cached_data = get_transient( $cache_key );

    if ( false !== $cached_data ) {
        return $cached_data; 
    }

    // Cek Class Plugin
    if ( class_exists( 'UmhMgmt\Repositories\PackageRepository' ) ) {
        try {
            $repo = new \UmhMgmt\Repositories\PackageRepository();
            $packages = $repo->all();
            
            // Proses harga
            foreach ($packages as $pkg) {
                if (method_exists($repo, 'getPricing')) {
                    $pricing = $repo->getPricing($pkg->id);
                    $pkg->start_from = $pricing['quad'] ?? 0;
                } else {
                    $pkg->start_from = 0;
                }
            }
            
            $results = array_slice($packages, 0, $limit);

            // Simpan Cache 1 Jam
            set_transient( $cache_key, $results, 1 * HOUR_IN_SECONDS );

            return $results;

        } catch (Exception $e) {
            return [];
        }
    }

    return [];
}

function umh_get_upcoming_departures($limit = 5) {
    $cache_key = 'umh_upcoming_dep_' . $limit;
    $cached_data = get_transient( $cache_key );

    if ( false !== $cached_data ) {
        return $cached_data; 
    }

    if ( class_exists( 'UmhMgmt\Repositories\OperationalRepository' ) ) {
        try {
            $repo = new \UmhMgmt\Repositories\OperationalRepository();
            $results = $repo->getUpcomingDepartures($limit);
            set_transient( $cache_key, $results, 1 * HOUR_IN_SECONDS );
            return $results;
        } catch (Exception $e) {
            return [];
        }
    }
    return [];
}