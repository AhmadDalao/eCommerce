<?php
// manage is the main page inside the catagories.php

$do = isset($_GET["action"]) ?  $_GET['action'] :  "Manage";
echo $do;

// if $do is equal to the main page.

if ($do == "Manage") {
    echo "Welcome , you are in manage categories page ";
    echo "<a href='?action=insert'>add new category ++ </a>";
} elseif ($do == "Add") {
    echo "Welcome , you are in add categories page ";
} elseif ($do == "insert") {
    echo "Welcome, you are in insert categories page";
} else {
    echo "error page doesn't exist";
}