<?php
ob_start();
// session is used to make sure the user can't access the page using different pages.
session_start();
$pageTitle = "Dashboard";
// if session is registered direct user to dashboard page
if (isset($_SESSION['username'])) {
    include "init.php";
    $latestUsersLimiter = 6;
    $latestUsers = getLatestRecord("*", "users", "userID", $latestUsersLimiter, "groupID != 1");
    $latestItem = getLatestRecord("*", "items", "item_id", $latestUsersLimiter);
    include  $dashboardPages . 'dashboardManage.php';


    include $template . "footer.php";
} else {
    // if users attempt to enter this page
    // without a registered session get him back to the login page.
    header("Location: index.php");
    exit();
}
ob_end_flush();
