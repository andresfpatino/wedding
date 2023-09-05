//Run Functions Theme
import $ from "jquery";
window.$ = window.jQuery = $;
import "slick-carousel";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";

(function ($) {

    // Run Sticky Menu
    window.onscroll = function() {
        stickyMenu()
    };
    const header = document.querySelector("header");
    const headerHight = document.getElementById('masthead').clientHeight;
    function stickyMenu() {
        if (window.pageYOffset >= headerHight) {
            header.classList.add("isSticky")
        } else {
            header.classList.remove("isSticky");
        }
    }


    $(".gallery--slide").slick({
        infinite: true,
        arrows: false,
        dots: false,
        autoplay: true,
        cssEase: "linear",
        initialSlide: 0,
        speed: 8000,
        autoplaySpeed: 0,
        slidesToShow: 5,
        slidesToScroll: 1,
        draggable: true,
        responsive: [
/*             {
				breakpoint: 1440,
				settings: {
					slidesToShow: 5,
				}
            }, */
            {
				breakpoint: 721,
				settings: {
					slidesToShow: 2,
				}
            },
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 1,
				}
			}
        ]
    });
    
})(jQuery);