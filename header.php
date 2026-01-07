<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="masthead" class="site-header">
    <div class="container header-container">
        <!-- 1. Logo Area -->
        <div class="site-branding">
            <?php
            if ( has_custom_logo() ) {
                the_custom_logo();
            } else {
                ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="text-logo">
                    <span class="brand-umroh">Umroh</span><span class="brand-corp">Enterprise</span>
                </a>
                <?php
            }
            ?>
        </div>

        <!-- 2. Desktop Navigation -->
        <nav id="site-navigation" class="main-navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'main-menu',
                'menu_id'        => 'primary-menu',
                'container'      => false,
            ) );
            ?>
        </nav>

        <!-- 3. Action Buttons (Role Jemaah) -->
        <div class="header-actions">
            <?php if ( is_user_logged_in() ) : ?>
                <?php $current_user = wp_get_current_user(); ?>
                <a href="<?php echo site_url('/dashboard-jemaah'); ?>" class="umh-btn umh-btn-primary btn-sm">
                    <i class="ri-user-line"></i> Halo, <?php echo esc_html($current_user->display_name); ?>
                </a>
            <?php else : ?>
                <a href="<?php echo site_url('/login'); ?>" class="umh-btn umh-btn-outline-dark btn-sm">Masuk</a>
                <a href="https://wa.me/62812345678" class="umh-btn umh-btn-primary btn-sm"><i class="ri-whatsapp-line"></i> Konsultasi</a>
            <?php endif; ?>
            
            <!-- Mobile Menu Toggle -->
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <i class="ri-menu-line"></i>
            </button>
        </div>
    </div>
</header>

<div class="site-content">