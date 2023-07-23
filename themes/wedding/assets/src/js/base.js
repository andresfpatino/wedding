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

    // Slick
    $(".slickDemo").slick({
        arrows: true,
        infinite: true,
        slidesToShow: 1,
        dots: true,
        slidesToScroll: 1,
        mobileFirst: true,
        autoplaySpeed: 3000,
        autoplay: true,
        speed: 500,
    });
})(jQuery);
