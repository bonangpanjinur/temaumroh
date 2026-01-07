<?php
/**
 * The main template file
 */
get_header(); ?>

<div class="site-content-wrapper">
    <div class="container">
        <div class="main-content" style="padding: 40px 0;">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin-bottom: 40px;">
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        </header>
                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                        </div>
                    </article>
                    <?php
                endwhile;
            else :
                echo '<p>No content found</p>';
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
