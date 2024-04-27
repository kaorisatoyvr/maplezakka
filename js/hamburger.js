// Use jQuery(document).ready() instead of document.addEventListener('DOMContentLoaded')
jQuery(document).ready(function($) {
  const menu_btn = $('.hamburger');
  const mobile_menu = $('.mobile-nav');

  menu_btn.on('click', function() {
      menu_btn.toggleClass('is-active');
      mobile_menu.toggleClass('is-active');
  });
});

// Get the button element
let goToTopBtn = document.getElementById("goToTopBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
    if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
        goToTopBtn.style.display = "block";
    } else {
        goToTopBtn.style.display = "none";
    }
};

// When the user clicks on the button, scroll to the top of the document smoothly
goToTopBtn.onclick = function () {
  scrollToTop();
};

function scrollToTop() {
  window.scrollTo({
      top: 0,
      behavior: 'smooth'
  });
}
