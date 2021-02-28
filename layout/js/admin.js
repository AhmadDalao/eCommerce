console.log("hello world admin");

/*
 *
 *   find the inputs in login form with placeholder attribute and remove it on focus,
 *   set it back on leave
 *
 */

let inputs = document.querySelectorAll("input[placeholder]");
let edit_fields = document.querySelectorAll(".edit__form input[required]");

console.log(edit_fields);

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
document.body.onload = addElement;

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
