<?php
get_header(); ?>

<div class="category-archive">
    <h1><?php single_cat_title( 'Category: ' ); ?></h1>
    <?php if ( have_posts() ) : ?>
        <ul>
            <?php while ( have_posts() ) : the_post(); ?>
                <li>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </li>
            <?php endwhile; ?>
        </ul>
        <?php the_posts_pagination(); ?>
    <?php else : ?>
        <p>No posts found in this category.</p>
    <?php endif; ?>
</div>

<?php
get_footer();
