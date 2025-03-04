<?php get_header(); ?>
<main>
    <h1>Attachment page tesst 12312</h1>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="attachment-content">
            <div class="attachment-file">
                <?php echo wp_get_attachment_image(get_the_ID(), 'large'); ?>
            </div>
            <div class="attachment-details">
                <p><strong>Description:</strong> <?php echo wpautop(get_the_content()); ?></p>
                <p><strong>Uploaded on:</strong> <?php echo get_the_date(); ?></p>
                <p><strong>File URL:</strong> <a href="<?php echo wp_get_attachment_url(); ?>"><?php echo wp_get_attachment_url(); ?></a></p>
            </div>
        </div>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>