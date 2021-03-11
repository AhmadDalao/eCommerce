<?php
// session is used to make sure the user can't access the page using different pages.
session_start();
// if session is registered direct user to dashboard page
if (isset($_SESSION['username'])) {
    $pageTitle = "Dashboard";
    include "init.php";


    // function countItemsIN_DB($tableToCount, $tableName)
    // {
    //     global $db_connect;
    // $stmt = $db_connect->prepare("SELECT COUNT(userID) FROM users WHERE groupID != 1");
    // $stmt->execute();
    // echo $stmt->fetchColumn();  // find the column numbers
    //     return $total_row;
    // }

    // $numberOfUsers = countItemsIN_DB("userID", "users");

    // echo $numberOfUsers;


    include  $dashboardPages . 'dashboardManage.php';


    include $template . "footer.php";
} else {
    // if users attempt to enter this page
    // without a registered session get him back to the login page.
    header("Location: index.php");
    exit();
}