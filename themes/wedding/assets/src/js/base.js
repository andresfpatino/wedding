//Run Functions Theme
import $ from "jquery";
window.$ = window.jQuery = $;
import "slick-carousel";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";

(function ($) {

    $(".gallery--slide").slick({
        arrows: true,
        autoplay: true,
        slidesToShow: 5,
        swipe: false,
        slidesToScroll: 1,
        appendArrows: $('.gallery--slide-navigation'),
        prevArrow: $('.gallery--slide-navigation .prev'),
        nextArrow: $('.gallery--slide-navigation .next'),
        responsive: [
            {
				breakpoint: 1440,
				settings: {
					slidesToShow: 3,
				}
            },
            {
				breakpoint: 721,
				settings: {
					slidesToShow: 2,
				}
            },
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
				}
			}
        ]
    });

})(jQuery);