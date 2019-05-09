<?php
//AJAX MEDIA LOAD MORE

add_action('wp_ajax_nopriv_load_more_posts', 'wpex_metadata_load_more_posts');
add_action('wp_ajax_load_more_posts', 'wpex_metadata_load_more_posts');

function wpex_metadata_load_more_posts()
{

    $paged = (int)$_POST['paged'];
    $args = array(
        'paged' => $paged,
        'posts_per_page' => 3,
        'post_type' => 'post',
    );

    $the_query = new WP_Query($args);

    if ($the_query->have_posts()) : ?>

        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

            <li style="display: none;">
                <?php if (!empty(get_the_post_thumbnail_url())) {
                    $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                } else {
                    $thumbnail = get_bloginfo('stylesheet_directory') . '/assets/imgs/' . $category_name . '-icon.svg';
                } ?>

                <img src="<?php echo $thumbnail; ?>" alt="image-file">
                <a href="<?php echo get_permalink(); ?>">
                    <div class="title-post"><?php the_title(); ?></div>
                    <div class="date"><?php the_date('F j, Y'); ?></div>
                    <div class="content">
                        <?php /*echo get_excerpt(); */?>
                        <?= kc_excerpt(); ?>
                    </div>
                </a>
            </li>

        <?php endwhile ?>

    <?php endif;
    wp_reset_postdata();
}