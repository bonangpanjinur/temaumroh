<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header>
    <div class="container">
        <div class="header-content" style="display: flex; justify-content: space-between; align-items: center;">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title">
                <?php bloginfo( 'name' ); ?>
            </a>
            <nav class="main-navigation">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'main-menu',
                    'menu_class'     => 'nav-menu',
                    'container'      => false,
                ) );
                ?>
            </nav>
        </div>
    </div>
</header>
