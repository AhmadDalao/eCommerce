<?php

/*
* ================================================================
* ================================================================
*
*                      Manage Members Page
*
*            You can Add | Edit | update | Delete members from here
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

        // select all regular users.
        $stmt = $db_connect->prepare("SELECT * FROM users WHERE groupID != 1");
        // execute the SQL above
        $stmt->execute();
        // assign result from the SQL statement into a variable.
        $rows = $stmt->fetchAll();
        // loop over the $row and print all of it's data
        include $template . "manageMember.php";
    } elseif ($action == "add") {
        // add member section
        // include the form with the data.
        include $template . "addMember.php";
    } elseif ($action == "insert") {
        // insert page

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $recordChange = '';
            $insert_username = $_POST['add_username'];
            $insert_email = $_POST['add_email'];
            $insert_fullName = $_POST['add_fullName'];
            $insert_password = $_POST['add_password'];
            $hashPassword = sha1($insert_password);

            // validate the form before updating the database
            $formErrors = array();
            if (strlen($insert_username) > 15) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = lang("update_username_greater");
            }

            if (strlen($insert_username) < 4) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = lang("update_username_less");
            }

            if (empty($insert_username)) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = lang("update_username_empty");
            }

            if (empty($insert_fullName)) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = lang("update_fullName_empty");
            }
            if (empty($insert_password)) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = lang("insert_password_empty");
            }
            if (strlen($insert_fullName) < 4) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = lang("update_fullName_less");
            }

            if (empty($insert_email)) {
                // adding form error to array so I can show it later to user.
                $formErrors[] =  lang("update_email_empty");
            }
            // find errors in the form sent to you by add member page.
            formErrorsPrint($formErrors);
            // if formErrors is empty connect to the database.
            if (empty($formErrors)) {
                // insert the data base with the data I receive from the form in add page.
                $stmt = $db_connect->prepare('INSERT INTO users (username ,password ,email,fullName) VALUES (:username, :password ,:email ,:fullName)');
                $stmt->execute(array("username" => $insert_username, "password" => $hashPassword, "email" => $insert_email, "fullName" => $insert_fullName));
                // print this message if there was a change in the record
                $recordChange = $stmt->rowCount() . ' ' .  lang("inserted_recordChange");
                $message = "Account Created";
                $pageName = "members.php";
                $alertType = "alert-success";
            }
            include $template . "insertMember.php";
        } else {
            $error = "you don't access to this page !!";
            redirectHome($error);
        }
        // add the section to display the data.
        //  include $template . "updateMember.php";
    } elseif ($action == "edit") {
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
            $message = "incorrect userID !";
            redirectHome($message);
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
                $formErrors[] = lang("update_username_greater");
            }

            if (strlen($update_username) < 4) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = lang("update_username_less");
            }

            if (empty($update_username)) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = lang("update_username_empty");
            }

            if (empty($update_fullName)) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = lang("update_fullName_empty");
            }
            if (strlen($update_fullName) < 4) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = lang("update_fullName_less");
            }

            if (empty($update_email)) {
                // adding form error to array so I can show it later to user.
                $formErrors[] =  lang("update_email_empty");
            }

            // if formErrors is empty connect to the database.
            if (empty($formErrors)) {
                // update the data base with the data I receive from the form in edit page.
                $stmt = $db_connect->prepare('UPDATE users SET username = ? , email = ? , fullName = ? , password = ? WHERE userID = ?');
                $stmt->execute(array($update_username, $update_email, $update_fullName, $update_password, $update_userID));
                // print this message if there was a change in the record
                $recordChange = $stmt->rowCount() . ' ' .  lang("update_recordChange");
                $message = "Profile updated";
                $alertType = "alert-success";
                redirectHome($message, 2, "index.php", $alertType);
            }
            include $template . "updateMember.php";
        } else {
            // do
            $message = "you don't access to this page !!";
            redirectHome($message, 2);
        }
        // add the section to display the data.
    } elseif ($action == "delete") {
        // check if userID is numeric & return the integer value of it
        $userID = isset($_GET['userID']) && is_numeric($_GET['userID']) ?  intval($_GET['userID']) :  0;
        // select data from database based on the userID I got from $_GET.
        $stmt = $db_connect->prepare("SELECT * FROM users  WHERE  userID = ? LIMIT 1 ");
        // execute query
        $stmt->execute(array($userID));
        // check if the account exist
        $total_row = $stmt->rowCount();

        if ($total_row > 0) {
            // delete user
            $stmt = $db_connect->prepare("DELETE FROM users WHERE userID = ?");
            // $stmt->bindParam(":userID", $userID);
            $stmt->execute(array($userID));
            $recordChange = $stmt->rowCount() . ' ' .  lang("deleted_recordChange");
            $message = "Account Deleted.";
            $pageName = "members.php";
            $alertType = "alert-success";
            include $template . 'delete.php';
        } else {
            $message = "account doesn't exist";
            redirectHome($message);
        }
    } else {
        // echo "<div class='alert alert-danger'><div class='container'><div>Error page not found</div></div></div>";
        $message = "Error page not found!!";
        redirectHome($message);
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