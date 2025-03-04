<?php
get_header(); ?>

<div class="taxonomy-archive">
    <h1>
        <?php
        $taxonomy = get_queried_object();
        echo esc_html( $taxonomy->name ) . ': ' . single_term_title( '', false );
        ?>
    </h1>
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
        <p>No posts found for this taxonomy term.</p>
    <?php endif; ?>
</div>

<?php
get_footer();
