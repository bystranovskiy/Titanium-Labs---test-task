<?php
//AJAX MEDIA LOAD MORE

add_action('wp_ajax_nopriv_load_more_posts', 'wpex_metadata_load_more_posts');
add_action('wp_ajax_load_more_posts', 'wpex_metadata_load_more_posts');

function wpex_metadata_load_more_posts()
{

    $paged = (int)$_POST['paged'];
    $posts_count = (int)$_POST['posts_count'];
    $order = $_POST['order'];
    $args = array(
        'paged' => $paged,
        'post_type' => 'post',
        'posts_per_page' => $posts_count,
        'order-by' => 'date',
        'order' => $order
    );

    $the_query = new WP_Query($args);

    if ($the_query->have_posts()) : ?>

        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

            <li class="post" style="display: none;">
                <div class="post_image">
                    <div class="post_image_bg"
                         style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>)"></div>
                </div>
                <div class="post_info">
                    <i class="icon-calendar-empty"></i> <?php the_date('F j, Y'); ?> | <i class="icon-comment-empty"></i> 0 Comments
                </div>
                <div class="post_title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </div>
            </li>

        <?php endwhile ?>

    <?php endif;
    wp_reset_postdata();
}