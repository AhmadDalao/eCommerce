<?php
session_start();
$pageTitle = "Items";

if (isset($_SESSION['username'])) {

    include "init.php";

    $action = isset($_GET['action']) ? $_GET['action'] : "manage";

    if ($action == "manage") {
        //do 

        include  $itemsPages . "manageItems.php";
    } elseif ($action == "add") {
        // start by sending request to the database and insert will handle it
        include  $itemsPages . "addItems.php";
    } elseif ($action == "insert") {
        // insert to the database

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $recordChange = '';
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $made_in = $_POST['made_in'];
            $status = $_POST['status'];
            $user_id = $_POST['user_id'];
            $cate_id = $_POST['cate_id'];

            // validate the form before updating the database
            $formErrors = array();
            if (strlen($name) > 15) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = lang("itemName_greater");
            }

            if (strlen($name) < 4) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = lang("itemName_less");
            }

            if (empty($name)) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = lang("itemName_empty");
            }

            if (empty($description)) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = lang("itemDescriptionEmpty");
            }
            if (empty($price)) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = lang("itemPriceEmpty");
            }

            if (empty($made_in)) {
                // adding form error to array so I can show it later to user.
                $formErrors[] =  lang("itemMadeInEmpty");
            }

            if ($status == 0) {
                // adding form error to array so I can show it later to user.
                $formErrors[] =  lang("itemStatusEmpty");
            }
            if ($user_id == 0) {
                // adding form error to array so I can show it later to user.
                $formErrors[] =  lang("itemMemberEmpty");
            }
            if ($cate_id == 0) {
                // adding form error to array so I can show it later to user.
                $formErrors[] =  lang("itemCategoryEmpty");
            }
            // find errors in the form sent to you by add member page.
            formErrorsPrint($formErrors);
            // if formErrors is empty connect to the database.
            if (empty($formErrors)) {
                // insert the data base with the data I receive from the form in add page.
                $stmt = $db_connect->prepare('INSERT INTO items (name ,description ,price ,made_in ,status ,add_date ,cate_id, user_id) VALUES (:name, :description ,:price ,:made_in, :status, now(), :cate_id ,:user_id )');
                $stmt->execute(array("name" => $name, "description" => $description, "price" => $price, "made_in" => $made_in, 'status' => $status, "cate_id" => $cate_id, "user_id" => $user_id));
                // print this message if there was a change in the record
                $recordChange = $stmt->rowCount() . ' ' .  lang("inserted_recordChangeItem");
                $message = "<div class='mb-4 alert alert-success'><div class='container'><div>Item Created</div></div></div>";
                include $itemsPages . "insertItem.php";
            } else {
                $message = "<div class='mb-4 alert alert-danger'><div class='container'><div>Fix the above errors:</div></div></div>";
                redirectHome($message, "back", 7);
            }
        } else {
            $message =  "<div class='mb-4 alert alert-danger'><div class='container'><div>you don't access to this page !!</div></div></div>";
            redirectHome($message);
        }
    } elseif ($action == "edit") {
        //  edit page to change the values of the item
        echo "welcome edit";
    } elseif ($action == "update") {
        // receive request from edit page and update the values in the database.
        echo "welcome update";
    } elseif ($action == "delete") {
        // delete the item from the database
        echo "welcome delete";
    } elseif ($action == "approve") {
        // approve the request to add an item to the item page.
        echo "welcome approve";
    }
    include $template . "footer.php";
} else {
    header("Location: index.php");
    exit();
}