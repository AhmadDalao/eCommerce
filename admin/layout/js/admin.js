// document.body.onload = addElement;
// document.body.onload = textArea;
window.onload = function () {
  addElement();
  addStarToTextArea();
};
/*
 *
 *   find the inputs in login form with placeholder attribute and remove it on focus,
 *   set it back on leave
 *
 */

let inputs = document.querySelectorAll("input[placeholder]");

inputs.forEach((element) => {
  let temp_placeHolder;
  element.addEventListener("focus", function () {
    temp_placeHolder = element.getAttribute("placeholder");
    element.setAttribute("placeholder", "");
  });
  element.addEventListener("blur", function () {
    element.setAttribute("placeholder", temp_placeHolder);
  });
});

/*
 *
 * add * to each field that has required as attribute
 *
 */

let edit_fields = document.querySelectorAll(".edit__form input[required]");
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

let textArea = document.querySelectorAll(".edit__form textarea[required]");

function addStarToTextArea() {
  for (let index = 0; index < textArea.length; index++) {
    var star = document.createElement("span");
    star.className = "textarea";
    star.appendChild(document.createTextNode("*"));
    textArea[index].parentNode.appendChild(star);
  }
}

/*
 *
 * dynamic modal in manage member.
 *
 */

let deleteButton = document.querySelectorAll("a.delete__item");
for (let index = 0; index < deleteButton.length; index++) {
  deleteButton[index].addEventListener("click", function () {
    let delete_id = deleteButton[index].getAttribute("data-delete_id");
    let delete_name = deleteButton[index].getAttribute("data-delete_name");

    // modal in manage member;
    let manage__modal = document.querySelector("[data-targetedModal]");
    manage__modal.setAttribute("id", delete_name + delete_id);

    // manage_modal_ID span add user id text to it.
    let manage_modal_ID = document.querySelector(".manage_modal_ID");
    let myTextNode = document.createTextNode(delete_id);
    manage_modal_ID.textContent = "";
    manage_modal_ID.appendChild(myTextNode);

    // manage_modal_username span add user name text to it.
    let manage_modal_username = document.querySelector(
      ".manage_modal_username"
    );
    let myUserNameNode = document.createTextNode(delete_name);
    manage_modal_username.textContent = "";
    manage_modal_username.appendChild(myUserNameNode);

    // members.php?action=delete&userID=
    let modalDeleteButton = document.querySelector("#modal_deleteButton");
    let url = document
      .querySelector("[data-page_url]")
      .getAttribute("data-page_url");
    modalDeleteButton.setAttribute("href", url + delete_id);
  });
}

/*
 *
 * dashboard plus and minus icon to hide latest section.
 *
 */

let hideListSpan = document.querySelectorAll("span.hideList");
let hideListSpanIcon = document.querySelectorAll("span.hideList > i");
for (let index = 0; index < hideListSpan.length; index++) {
  hideListSpan[index].addEventListener("click", function () {
    let bodyToHide = document.querySelectorAll(".card-body.hideItem");
    let iconMinus = document.createElement("i");
    let iconPlus = document.createElement("i");
    iconMinus.className = "fas fa-minus fa-lg fa-fw";
    iconPlus.className = "fas fa-plus fa-lg fa-fw";

    if (
      bodyToHide[index].classList.contains("hidden_item_transition") == true
    ) {
      while (hideListSpan[index].firstChild) {
        hideListSpan[index].removeChild(hideListSpan[index].firstChild);
      }
      hideListSpan[index].append(iconPlus);
      bodyToHide[index].classList.toggle("hidden_item_transition");
      bodyToHide[index].style.display = "block";
      setTimeout(function () {
        bodyToHide[index].style.opacity = "1";
        bodyToHide[index].style.transition = "all 0.4s";
      }, 200);
    } else {
      while (hideListSpan[index].firstChild) {
        hideListSpan[index].removeChild(hideListSpan[index].firstChild);
      }
      hideListSpan[index].append(iconMinus);
      bodyToHide[index].classList.toggle("hidden_item_transition");
      bodyToHide[index].style.opacity = "0";
      bodyToHide[index].style.transition = "all 0.4s";
      setTimeout(function () {
        bodyToHide[index].style.display = "none";
      }, 200);
    }
  });
}
