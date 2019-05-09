require("../sass/style.scss");
require("../../assets/fonts/fontello/css/fontello.css");


import {TweenLite, CSSPlugin} from "gsap";
import {parallax_background} from "parallax_background";


require("./custom/menu.es6");
require("./custom/load_more_posts.es6");


(function ($) {

    $(window).on('load', function () {
        $('body').addClass('load');
    });

})(jQuery);

