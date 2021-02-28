console.log("hello world admin");

/*
 *
 *   find the inputs in login form with placeholder attribute and remove it on focus,
 *   set it back on leave
 *
 */
document.body.onload = addElement;

let inputs = document.querySelectorAll("input[placeholder]");
let edit_fields = document.querySelectorAll(".edit__form input[required]");
let eye_icon = document.querySelector(".form-group .show__eye");

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

// add * to each field that has required as attribute
function addElement() {
  for (let index = 0; index < edit_fields.length; index++) {
    //  var tree = document.createDocumentFragment();
    var star = document.createElement("span");
    star.className = "hidden";
    star.appendChild(document.createTextNode("*"));
    //  tree.appendChild(star);
    edit_fields[index].parentNode.appendChild(star);
  }
}

// show password once you click on eye icon
eye_icon.addEventListener("click", function () {
  let password_field = document.querySelector("input.password");
  let tempHolder = password_field.getAttribute("type");
  if (tempHolder == "password") {
    password_field.setAttribute("type", "text");
  }
  if (tempHolder == "text") {
    password_field.setAttribute("type", "password");
  }
});
