<?php
// session is used to make sure the user can't access the page using different pages.
session_start();
// if session is registered direct user to dashboard page
if (isset($_SESSION['username'])) {
    $pageTitle = "Dashboard";
    include "init.php";

    include  $dashboardPages . 'dashboardManage.php';


    include $template . "footer.php";
} else {
    // if users attempt to enter this page
    // without a registered session get him back to the login page.
    header("Location: index.php");
    exit();
}
