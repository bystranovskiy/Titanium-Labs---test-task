<section class="section_posts_list">
    <div class="container">
        <div class="section-title">
            <?php the_sub_field('section_title'); ?>
        </div>
        <div class="section-description">
            <?php the_sub_field('section_description'); ?>
        </div>


        <?php
        $order = get_sub_field('posts_order');
        $posts_count = get_sub_field('posts_count');
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $posts_count,
            'order-by' => 'date',
            'order' => $order
        );

        $the_query = new WP_Query($args);

        if ($the_query->have_posts()) : ?>

            <ul class="post_list posts_count_<?php echo $posts_count; ?>">

                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                    <li class="post">
                        <div class="post_image">
                            <div class="post_image_bg"
                                 style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'large'); ?>)"></div>
                        </div>
                        <div class="post_info">
                            <i class="icon-calendar-empty"></i> <?php the_date('F j, Y'); ?> | <i class="icon-comment-empty"></i> 0 Comments
                        </div>
                        <div class="post_title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </div>
                    </li>

                <?php endwhile; ?>

            </ul>

        <?php endif;
        $found_posts = $the_query->found_posts;

        if ($found_posts > $posts_count) {
            echo '<div class="bttn view-more"><span data-paged="1" data-order="'. $order .'" data-posts_count="'. $posts_count .'" data-found_posts="' . $found_posts . '">View More <i class="icon-spin3"></i></span></div>';
        }

        wp_reset_postdata(); ?>

    </div>
</section>