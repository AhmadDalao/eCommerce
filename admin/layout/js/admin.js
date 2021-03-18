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

let deleteButton = document.querySelectorAll("tr > td a.delete__member");

for (let index = 0; index < deleteButton.length; index++) {
  deleteButton[index].addEventListener("click", function () {
    let deleteAttribute = deleteButton[index].getAttribute("data-customModal");
    let modalName = deleteButton[index].getAttribute("data-modalName");

    // modal in manage member;
    let manage_member_modal = document.querySelector(".manage_member_modal");
    manage_member_modal.setAttribute(
      "id",
      "manage_member_modal" + deleteAttribute
    );

    // manage_modal_userID span add user id text to it.
    let manage_modal_userID = document.querySelector(".manage_modal_userID");
    let myTextNode = document.createTextNode(deleteAttribute);
    manage_modal_userID.textContent = "";
    manage_modal_userID.appendChild(myTextNode);

    // manage_modal_userID span add user id text to it.
    let manage_modal_username = document.querySelector(
      ".manage_modal_username"
    );
    let myUserNameNode = document.createTextNode(modalName);
    manage_modal_username.textContent = "";
    manage_modal_username.appendChild(myUserNameNode);

    // members.php?action=delete&userID=
    let modalDeleteButton = document.querySelector("#modal_deleteButton");
    modalDeleteButton.setAttribute(
      "href",
      "members.php?action=delete&userID=" + deleteAttribute
    );
  });
}
