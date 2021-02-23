<?php
// manage is the main page inside the catagories.php

$action = isset($_GET['action']) ?  $_GET['action'] : "manage";

if ($action == "manage") {
    echo "Welcome to Manage page";
    echo "<a href='?action=add'>Hi add new content</a>";
} elseif ($action == "add") {
    echo " Welcome to add page";
} else if ($action == "edit") {
    echo " Welcome to edit page";
} else {
    echo "error no page 404 found";
}