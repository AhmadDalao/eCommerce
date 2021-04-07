// show password once you click on eye icon
let eye_icon = document.querySelectorAll(".form-group .show__eye");
function addEye() {
  for (let index = 0; index < eye_icon.length; index++) {
    eye_icon[index].addEventListener("click", function () {
      let password_field = document.querySelectorAll("input.password");
      let tempHolder = password_field[index].getAttribute("type");
      if (tempHolder == "password") {
        password_field[index].setAttribute("type", "text");
      }
      if (tempHolder == "text") {
        password_field[index].setAttribute("type", "password");
      }
    });
  }
}
addEye();
let loginForm = document.querySelectorAll(".login-section input[required]");
function addElement() {
  for (let index = 0; index < loginForm.length; index++) {
    var star = document.createElement("span");
    star.className = "hidden";
    star.appendChild(document.createTextNode("*"));
    loginForm[index].parentNode.appendChild(star);
  }
}

addElement();
