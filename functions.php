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
    // Main Stylesheet
    wp_enqueue_style( 'temaumroh-style', get_stylesheet_uri() );
    
    // Google Fonts (Amiri untuk nuansa Islami & Lato untuk modern)
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Lato:wght@400;700&display=swap' );

    // RemixIcon
    wp_enqueue_style( 'remixicon', 'https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css' );

    // Custom CSS for Plugin Integration
    wp_enqueue_style( 'temaumroh-custom', get_template_directory_uri() . '/assets/css/umroh-custom.css', array(), '1.1.0' );

    wp_enqueue_script( 'temaumroh-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'temaumroh_scripts' );

/**
 * --- INTEGRATION HELPER ---
 * Fungsi untuk mengambil data paket langsung dari Plugin UMH Enterprise
 */
function umh_get_featured_packages($limit = 3) {
    // Cek apakah class plugin tersedia (agar tidak error jika plugin mati)
    if ( class_exists( 'UmhMgmt\Repositories\PackageRepository' ) ) {
        $repo = new \UmhMgmt\Repositories\PackageRepository();
        $packages = $repo->all();
        
        // Ambil harga terendah untuk setiap paket
        foreach ($packages as $pkg) {
            $pricing = $repo->getPricing($pkg->id);
            $pkg->start_from = $pricing['quad'] ?? 0;
        }
        
        return array_slice($packages, 0, $limit);
    }
    return [];
}

function umh_get_upcoming_departures($limit = 5) {
    if ( class_exists( 'UmhMgmt\Repositories\OperationalRepository' ) ) {
        $repo = new \UmhMgmt\Repositories\OperationalRepository();
        return $repo->getUpcomingDepartures($limit);
    }
    return [];
}