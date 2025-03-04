<?php
// Exit if accessed directly.
// if (!defined('ABSPATH')) {
//     exit;
// }

get_header(); // Include the header template.
?>

<main id="main" class="site-main">
    <header class="archive-header">
        <h1 class="archive-title">
            <?php
            // Display the archive title.
            the_archive_title();
            ?>
        </h1>
        <?php
        // Display the archive description, if available.
        the_archive_description('<div class="archive-description">', '</div>');
        ?>
    </header>

    <?php if (have_posts()) : ?>
        <div class="archive-posts">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h2 class="entry-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <div class="entry-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>

        <?php
        // Display pagination if available.
        the_posts_pagination([
            'mid_size' => 2,
            'prev_text' => __('&laquo; Previous', 'textdomain'),
            'next_text' => __('Next &raquo;', 'textdomain'),
        ]);
        ?>
    <?php else : ?>
        <p><?php _e('No posts found.', 'textdomain'); ?></p>
    <?php endif; ?>
</main>

<?php get_footer(); // Include the footer template. ?>
