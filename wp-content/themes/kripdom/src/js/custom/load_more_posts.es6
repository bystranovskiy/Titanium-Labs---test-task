(function ($) {

    $(document).ready(function () {

        $(".page-template-page_media .load-more span").on("click", function (e) {

            var $this = $(this),
            paged = $this.data('paged') + 1;

            $this.data('paged', paged);


            var ajaxurl = ajaxMeta.ajaxurl,
                category_name = $this.data('category_name'),
                $container = $this.closest('.column').find('ul'),
                found_posts = $this.data('found_posts');

            $.ajax({
                url: ajaxurl,
                type: 'post',
                data: {
                    action: 'media_load_more',
                    'paged': paged,
                    'category_name': category_name
                },
                success: function (data) {
                    var $data = $(data);

                    if ($data.length) {
                        $container.append($data);
                        $container.find('li').fadeIn('slow');

                        if (found_posts <= $container.find('li').length) {
                            $this.css('visibility','hidden');
                        }

                    } else {
                        console.log('error');
                    }
                }
            });

            return false;
        });

    });

})(jQuery);