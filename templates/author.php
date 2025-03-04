<?php get_header(); ?>

<div class="author-archive">
    <div class="author-info">
        <h1><?php echo get_the_author(); ?></h1>
        <?php echo get_avatar(get_the_author_meta('ID'), 120); ?>
        
        <?php if (get_the_author_meta('description')) : ?>
            <div class="author-bio">
                <?php echo wpautop(get_the_author_meta('description')); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="author-posts">
        <h2>Posts by  <?php echo get_the_author(); ?></h2>
        
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="post">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="post-meta">
                        <span class="date"><?php the_time('F j, Y'); ?></span>
                    </div>
                    <div class="post-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
            
            <?php the_posts_pagination(); ?>
        <?php else : ?>
            <p>No posts found for this author.</p>
        <?php endif; ?>
    </div>
</div>

<div id="app-author"></div>

<?php get_footer(); ?>
