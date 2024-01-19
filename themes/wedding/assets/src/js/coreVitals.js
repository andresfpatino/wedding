// Use passive listeners to improve scrolling performance error
jQuery.event.special.touchstart = {
    setup: function( _, ns, handle ) {
        this.addEventListener("touchstart", handle, { passive: !ns.includes("noPreventDefault") });
    }
};
jQuery.event.special.touchmove = {
    setup: function( _, ns, handle ) {
        this.addEventListener("touchmove", handle, { passive: !ns.includes("noPreventDefault") });
    }
};
jQuery.event.special.wheel = {
    setup: function( _, ns, handle ){
        this.addEventListener("wheel", handle, { passive: true });
    }
};
jQuery.event.special.mousewheel = {
    setup: function( _, ns, handle ){
        this.addEventListener("mousewheel", handle, { passive: true });
    }
};


// Then check the browser's user agent for iPhone and add the maximum-scale parameter by replacing the content:
if(navigator.userAgent.indexOf('iPhone') > -1 ){
    document
        .querySelector("[name=viewport]")
        .setAttribute("content","width=device-width, initial-scale=1, maximum-scale=1");
}