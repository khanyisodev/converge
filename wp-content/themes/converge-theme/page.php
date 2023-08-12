<?php get_header(); ?>

<main id="main-content">
    <div class="container">
        <?php
        while (have_posts()) :
            the_post();
            // Display the page title
            the_title('<h1>', '</h1>');

            // Display the page content
            the_content();

            // If comments are allowed on the page, display the comment section
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
        endwhile;
        ?>
    </div>
</main>

<?php get_footer(); ?>
