<?php
get_header(); ?>

<div class="date-archive">
    <h1>Posts from: <?php echo get_the_date(); ?></h1>
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
        <p>No posts found for this date.</p>
    <?php endif; ?>
</div>

<?php
get_footer();
