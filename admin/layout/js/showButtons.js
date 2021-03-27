let card_dots = document.querySelectorAll(".card__holder .card_dots");
let myButtons__holder = document.querySelectorAll(
  ".card__holder .card_button--holder"
);

card_dots.forEach((value, i) => {
  console.log(value);
  value.addEventListener("click", function (e) {
    console.log("you clicked me");
    console.log(value);
    myButtons__holder[i].classList.toggle("show");
  });
});
