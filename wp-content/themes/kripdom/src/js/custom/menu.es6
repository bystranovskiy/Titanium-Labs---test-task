(function ($) {

    $(document).ready(function () {

        //************************************
        // Mobile Menu Trigger
        //************************************
        $('.menu-trigger').click(function(){
            $('header').toggleClass('menu-open');
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
