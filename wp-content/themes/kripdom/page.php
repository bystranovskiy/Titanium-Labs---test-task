<?php get_header(); ?>

<?php
// Start the Loop.
while (have_posts()) :
    the_post(); ?>

    <div class="main-page-wrap">

        <div class="container">

            <h1 class="post-title"><?php the_title(); ?></h1>

            <div class="content">
                <?php the_content(); ?>
            </div>

        </div>

    </div>
<?php endwhile; ?>

<?php get_footer(); ?>