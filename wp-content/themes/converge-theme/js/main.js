document.addEventListener("DOMContentLoaded", function () {
  const items = document.querySelectorAll(".item");

  // Reveal onClick
  items.forEach(item => {
    item.addEventListener('mouseenter', () => {
      item.classList.add('active');
    });

    item.addEventListener('mouseleave', () => {
      item.classList.remove('active');
    });
  });

  // Scroll to top
  let scrollToTop = document.querySelector(".scroll-top");

  window.onscroll = function () {
    scroll();
  };

  function scroll() {
    if (
      document.body.scrollTop > 100 ||
      document.documentElement.scrollTop > 100
    ) {
      scrollToTop.classList.add("active");
    } else {
      scrollToTop.classList.remove("active");
    }
  }
});
