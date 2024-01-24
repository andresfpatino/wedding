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
        slidesToShow: 8,
        swipe: false,
        slidesToScroll: 1,
        swipe: true,
        appendArrows: $('.gallery--slide-navigation'),
        prevArrow: $('.gallery--slide-navigation .prev'),
        nextArrow: $('.gallery--slide-navigation .next'),
        responsive: [
            {
				breakpoint: 1441,
				settings: {
					slidesToShow: 5,
				}
            },
            {
				breakpoint: 1025,
				settings: {
					slidesToShow: 3,
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