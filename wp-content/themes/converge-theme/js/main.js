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
});
