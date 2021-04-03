<?php
session_start();
$pageTitle = "Logs";

if (isset($_SESSION['username'])) {

    include "init.php";

    $action = isset($_GET['action']) ? $_GET['action'] : "manage";

    if ($action == "manage") {
        //do 
        echo "welcome Logs page";
    } elseif ($action == "add") {
        // do
        echo "welcome add";
    } elseif ($action == "insert") {
        // do
        echo "welcome insert";
    } elseif ($action == "edit") {
        // do
        echo "welcome edit";
    } elseif ($action == "update") {
        // do
        echo "welcome update";
    } elseif ($action == "delete") {
        // do
        echo "welcome delete";
    } elseif ($action == "activate") {
        // do
        echo "welcome activate";
    }
    include $template . "footer.php";
} else {
    header("Location: index.php");
    exit();
}