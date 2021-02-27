<?php

/*
* ================================================================
* ================================================================
*
*                      Manage Members Page
*
*            You can Add | Edit | Delete members from here
*
* ================================================================
* ================================================================
*/

// session is used to make sure the user can't access the page using different pages.
session_start();
// if session is registered direct user to dashboard page
if (isset($_SESSION['username'])) {

    $pageTitle = "Members";
    include "init.php";

    $action = isset($_GET['action']) ? $_GET['action'] : "manage";

    if ($action == "manage") {
        // manage page section
    } elseif ($action == "add") {
        // add page section
    } else if ($action == "edit") {
        // edit page section

        // check if userID is numeric & return the integer value of it
        $userID = isset($_GET['userID']) && is_numeric($_GET['userID']) ?  intval($_GET['userID']) :  0;
        // select data from database based on the userID I got from $_GET.
        $stmt = $db_connect->prepare("SELECT * FROM users  WHERE  userID = ? LIMIT 1 ");
        // execute query
        $stmt->execute(array($userID));
        // $row will be an array since fetch retrieve information as an array.
        // fetch data from database.
        $row = $stmt->fetch();
        $total_row = $stmt->rowCount();

        if ($total_row > 0) {
            // include the form with the data.
            include $template . "editMember.php";
        } else {
            echo "<div class='alter alert-danger py-3'><div class='container'><p>incorrect userID</p></div></div> ";
        }
    } elseif ($action == "update") {
        // update page section
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $recordChange = '';
            $update_userID = $_POST['edit_userID'];
            $update_username = $_POST['edit_username'];
            $update_email = $_POST['edit_email'];
            $update_fullName = $_POST['edit_fullName'];
            $update_old_password = $_POST['edit_old_password'];
            $update_new_password = $_POST['edit_new_password'];
            $update_password = '';

            // check if password from updateMember form is not empty
            // if it is give set the $update_password to the old password
            // if it wasn't empty set the $update_password the new password after encrypting it.
            // then send the data to the database.
            $update_password = empty($update_new_password)  ?  $update_old_password :  sha1($update_new_password);

            // validate the form before updating the database
            $formErrors = array();
            if (strlen($update_username) > 15) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = "username can't be <strong>more than 15 letters</strong>";
            }

            if (strlen($update_username) < 4) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = "username can't be <strong>less than 4 letters</strong>";
            }

            if (empty($update_username)) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = "username can't be <strong>empty</strong>";
            }

            if (empty($update_fullName)) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = "fullName can't be <strong>empty</strong>";
            }
            if (strlen($update_fullName) < 4) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = "fullName can't be <strong>less than 4 letters</strong>";
            }

            if (empty($update_email)) {
                // adding form error to array so I can show it later to user.
                $formErrors[] =  "email can't be <strong>empty</strong>";
            }

            // if formErrors is empty connect to the database.

            if (empty($formErrors)) {
                // update the data base with the data I receive from the form in edit page.
                $stmt = $db_connect->prepare('UPDATE users SET username = ? , email = ? , fullName = ? , password = ? WHERE userID = ?');
                $stmt->execute(array($update_username, $update_email, $update_fullName, $update_password, $update_userID));
                // print this message if there was a change in the record
                $recordChange = $stmt->rowCount() . ' ' . 'Record Updated';
            }
        } else {
            // do
            $recordChange = "<div class='alert alert-danger'><div class='container'><div >you don't access to this page !!</div></div></div>";
        }
        // add the section to display the data.
        include $template . "updateMember.php";
    } elseif ($action == "delete") {
        // delete page
    } else {
        echo "<div class='alert alert-danger'><div class='container'><div>Error page not found</div></div></div>";
    }

    include $template . "footer.php";
} else {
    // if users attempt to enter this page
    // without a registered session get him back to the login page.
    header("Location: index.php");
    exit();
}
?>
<!--  end of php tag -->