<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <h3>Menu</h3>
        <nav>
            <ul>
                <li><h3><a href="/">Home</a></р></li>
                <li><h3><a href="/about">About</a></h3></li>
                <li><h3><a href="/contact">Contact</a></h3></li>
            </ul>
        </nav>
        <div id="authors">
            <h3>Users</h3>
           <?php 
            // Fetch all users
            $users = get_users();

            // Loop through each user and display their information
            foreach ($users as $user) {
                $user_id = $user->ID;
                $user_name = $user->display_name;
                $user_url = get_author_posts_url($user_id);
                ?>
                <a href="<?= esc_url($user_url) ?>"><?= esc_html($user_name) ?></a><br>
                <?php
            }
        ?>

        </div>
    </header>
