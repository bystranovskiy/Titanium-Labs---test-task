(function ($) {

    $(document).ready(function () {

        $(".section_posts_list .view-more").on("click", function (e) {
            console.log('view-more');

            var $this = $(this).find('span'),
                ajaxurl = ajaxMeta.ajaxurl,
                $container = $this.closest('.container').find('.post_list'),
                paged = $this.data('paged') + 1,
                posts_count = $this.data('posts_count'),
                order = $this.data('order'),
                found_posts = $this.data('found_posts');

            $this.data('paged', paged);

            $.ajax({
                url: ajaxurl,
                type: 'post',
                data: {
                    action: 'load_more_posts',
                    'paged': paged,
                    'posts_count': posts_count,
                    'order': order,
                    'found_posts': found_posts
                },
                beforeSend: function () {
                    $this.find('i').addClass('animate-spin');
                },
                success: function (data) {
                    var $data = $(data);

                    if ($data.length) {
                        $container.append($data);
                        $container.find('li').fadeIn('slow');

                        if (found_posts <= $container.find('li').length) {
                            $this.css('visibility', 'hidden');
                        }

                        $this.find('i').removeClass('animate-spin');

                    } else {
                        console.log('error');
                    }
                }
            });

            return false;
        });

    });

})(jQuery);