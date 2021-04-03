console.log("am working");
// show password once you click on eye icon
let eye_icon = document.querySelector(".form-group .show__eye");

function addEye() {
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
}
addEye();
