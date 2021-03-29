console.log("hello world admin");
document.body.onload = addElement;

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
