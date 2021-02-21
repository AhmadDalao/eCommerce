console.log("hello world admin");

/*
 *
 *   find the inputs in login form with placeholder attribute and remove it on focus,
 *   set it back on leave
 *
 */

let inputs = document.querySelectorAll(".login__form input[placeholder]");
console.log(inputs);

for (let index = 0; index < inputs.length; index++) {
  let temp_placeHolder;
  inputs[index].addEventListener("focus", function () {
    temp_placeHolder = inputs[index].getAttribute("placeholder");
    inputs[index].setAttribute("placeholder", "");
  });
  inputs[index].addEventListener("blur", function () {
    inputs[index].setAttribute("placeholder", temp_placeHolder);
  });
}
