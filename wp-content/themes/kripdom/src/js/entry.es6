require("../sass/style.scss");
require("../../assets/fonts/fontello/css/fontello.css");
require("../../assets/fonts/fontello/css/animation.css");

require("./custom/menu.es6");
require("./custom/load_more_posts.es6");


(function ($) {

    $(window).on('load', function () {
        $('body').addClass('load');
    });

})(jQuery);

