document.addEventListener("DOMContentLoaded", function() {
  const cards = document.querySelectorAll(".card");
  cards.forEach((card, i) => {
    card.style.opacity = "0";
    setTimeout(() => {
      card.style.opacity = "1";
      card.style.transition = "all .6s";
      card.style.transform = "scale(1.05)";
      setTimeout(() => card.style.transform = "scale(1)", 300);
    }, i * 200);
  });
});
