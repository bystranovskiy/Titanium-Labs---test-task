(function ($) {

    $(document).ready(function () {

        //************************************
        // Mobile Menu Trigger
        //************************************
        $('.menu-trigger').click(function(){
            $('header').toggleClass('menu-open');
        });

        $('.mainmenu .menu-item-has-children').hover(function(){
            console.log('hover');
            $(this).find('.sub-menu').slideDown();
        }, function(){
            $(this).find('.sub-menu').slideUp();
        });


        //************************************
        // Fixed header when scroll
        //************************************

        $(window).on('scroll load', function () {
            if ($(window).scrollTop() >= 50) {
                $('header').addClass('fixed');
            }
            else $('header').removeClass('fixed');
        });
    });

})(jQuery);
