<?php
/**
 * Template Name: Page with Sidebar
 * Template Post Type: page
 */
get_header(); ?>

<div class="site-content-wrapper">
    <div class="container">
        <div class="content-with-sidebar" style="display: grid; grid-template-columns: 3fr 1fr; gap: 40px; padding: 40px 0;">
            <main class="site-main">
                <?php
                while ( have_posts() ) :
                    the_post();
                    the_content();
                endwhile; 
                ?>
            </main>
            <aside class="site-sidebar">
                <?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
                    <?php dynamic_sidebar( 'main-sidebar' ); ?>
                <?php else : ?>
                    <div class="widget">
                        <h4 class="widget-title">Sidebar Widget</h4>
                        <p>Silakan tambahkan widget di Dashboard > Appearance > Widgets.</p>
                    </div>
                <?php endif; ?>
            </aside>
        </div>
    </div>
</div>

<?php get_footer(); ?>
