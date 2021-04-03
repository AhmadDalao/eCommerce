/*
 *
 * view classic and compact in manageCategory.
 *
 */
let spanCompact = document.querySelector(".manage_category .spanCompact");
let spanClassic = document.querySelector(".manage_category .spanClassic");

spanCompact.addEventListener("click", function () {
  spanClassic.setAttribute("style", "background: #343a40 !important");
  spanCompact.setAttribute("style", "background: #6c757d !important");

  let card_details_wrapper = document.querySelectorAll(".card_details-wrapper");
  card_details_wrapper.forEach((element) => {
    element.style.opacity = "0";
    element.style.transition = "all 0.4s";
    setTimeout(function () {
      element.style.display = "none";
    }, 300);
  });
});

spanClassic.addEventListener("click", function () {
  spanCompact.setAttribute("style", "background: #343a40 !important");
  spanClassic.setAttribute("style", "background: #6c757d !important");

  let card_details_wrapper = document.querySelectorAll(".card_details-wrapper");
  card_details_wrapper.forEach((element) => {
    element.style.display = "block";
    setTimeout(function () {
      element.style.opacity = "1";
      element.style.transition = "all 0.4s";
    }, 200);
  });
});
