'''<?php
/**
 * Template Name: Fullwidth Page
 * Template Post Type: page
 */
get_header(); ?>

<div class="site-content-wrapper fullwidth-wrapper">
    <div class="container-fluid" style="max-width: 100%; padding: 0;">
        <div class="page-content-fullwidth">
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
'''
