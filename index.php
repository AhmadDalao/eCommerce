<?php
// session is used to make sure the user can't access the page using different pages.
session_start();
$no_navbar = '';
$pageTitle = "Login";
// if session is registered direct user to dashboard page
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

include "init.php";

// check in login data is coming throw post method.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // save data from login form into variables.
    $username = $_POST["username"];
    $password = $_POST["password"];
    // protect the password by censoring it it.
    $hashedPassword = sha1($password);
    // check if user exist in database
    $stmt = $db_connect->prepare("SELECT username, password , groupID , userID FROM users 
    WHERE 
    username = ? 
    AND 
    password = ? 
    AND 
    groupID = 1 
    LIMIT 1 ");

    $stmt->execute(array($username, $hashedPassword));
    // $row will be an array since fetch retrieve information as an array.
    $row = $stmt->fetch();
    // how many rows are there, meaning how many results exists in the database
    // it should be one based on the limiter but just in case.
    // rowCount return an integer
    $total_row = $stmt->rowCount();
    // if the total_row > 0 it means the user does exist in the database.
    if ($total_row > 0) {
        // if there is an account in the database add it to the session.
        $_SESSION["username"] = $username;
        // register the userID taken from the array $row and save it in a session to be used later on.
        $_SESSION['userID'] = $row['userID'];
        //   redirect admin to the dashboard page 
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<div class='alter alert-danger py-3'><div class='container'><div>Password or username are incorrect" . "<br /></div></div></div>";
    }
}

/*<!--
* ================================================================
* ================================================================
*
*                       loginForm section
*
* ================================================================
* ================================================================
--> */

include $template . "loginForm.php";

include $template .  "footer.php";