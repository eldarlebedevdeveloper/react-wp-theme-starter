<?php
get_header(); ?>

<div class="tag-archive">
    <h1><?php single_tag_title( 'Tag: ' ); ?></h1>
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
        <p>No posts found with this tag.</p>
    <?php endif; ?>
</div>

<?php
get_footer();
