let card_dots = document.querySelectorAll(".card__holder .card_dots");
let myButtons__holder = document.querySelectorAll(
  ".card__holder .card_button--holder"
);

card_dots.forEach((value, i) => {
  value.addEventListener("click", function (e) {
    myButtons__holder[i].classList.toggle("show");
  });
});
