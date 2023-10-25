// Run Sticky Menu
window.onscroll = function() {
    stickyMenu()
};

const header = document.querySelector("header");
const headerHight = document.getElementById('masthead').clientHeight;

function stickyMenu() {
    if (window.scrollY >= headerHight) {
        header.classList.add("isSticky")
    } else {
        header.classList.remove("isSticky");
    }
}
