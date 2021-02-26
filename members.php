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
            echo "incorrect userID";
        }
    } elseif ($action == "update") {
        // update page section
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //do
            $recordChange = '';
            $update_userID = $_POST['edit_userID'];
            $update_username = $_POST['edit_username'];
            $update_email = $_POST['edit_email'];
            $update_fullName = $_POST['edit_fullName'];
            // update the data base with the data I receive from the form in edit page.
            $stmt = $db_connect->prepare('UPDATE users SET username = ? , email = ? , fullName = ? WHERE userID = ?');
            $stmt->execute(array($update_username, $update_email, $update_fullName, $update_userID));
            // print this message if there was a change in the record
            $recordChange = $stmt->rowCount() . ' ' . 'Record Updated';
        } else {
            // do
            $recordChange = "you don't access to this page !!";
        }
        // add the section to display the data.
        include $template . "updateMember.php";
    } elseif ($action == "delete") {
        // delete page
    } else {
        echo "Error page not found";
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