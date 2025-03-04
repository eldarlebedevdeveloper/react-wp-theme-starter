<?php
/**
 * Template Name: Custom Post Template
 * Template Post Type: post
 */
get_header(); ?>

<main>
    <h1><?php the_title(); ?></h1>
    <div>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
