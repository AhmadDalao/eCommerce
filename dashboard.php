<?php
// session is used to make sure the user can't access the page using different pages.
session_start();
$welcomeMessage = '';
// if session is registered direct user to dashboard page
if (isset($_SESSION['username'])) {
    $pageTitle = "Dashboard";
    $welcomeMessage = "Welcome in Dashboard   " .  $_SESSION['username'] . "<br/>";
    include "init.php";
    echo $welcomeMessage;
    echo $_SESSION['userID'];
    include $_template . "footer.php";
} else {
    // if users attempt to enter this page
    // without a registered session get him back to the login page.
    header("Location: index.php");
    exit();
}