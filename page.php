<?php
/**
 * The template for displaying all pages
 */
get_header(); ?>

<div class="site-content-wrapper">
    
    <!-- Hero Section -->
    <div class="page-hero" style="background: #f4f4f4; padding: 60px 0; margin-bottom: 40px; text-align: center;">
        <div class="container">
            <h1 style="font-size: 2.5rem; color: #333;"><?php the_title(); ?></h1>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="container">
        <div class="page-content" style="background: #fff; padding: 40px; border-radius: 8px; shadow: 0 2px 15px rgba(0,0,0,0.05);">
            <?php
            while ( have_posts() ) :
                the_post();
                
                // This is where the plugin shortcodes will be rendered
                the_content();

            endwhile; 
            ?>
        </div>
    </div>

</div>

<?php get_footer(); ?>
