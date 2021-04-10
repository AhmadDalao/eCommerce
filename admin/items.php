<?php
ob_start();
session_start();
$pageTitle = "Items";

if (isset($_SESSION['username'])) {

    include "init.php";

    $action = isset($_GET['action']) ? $_GET['action'] : "manage";

    if ($action == "manage") {
        //do 
        // select all regular users.
        $stmt = $db_connect->prepare("SELECT items.* ,
                                        categories.name AS category_name , 
                                        users.username 
                                    FROM items
                                    INNER JOIN categories ON categories.ID = items.cate_id
                                    INNER JOIN users ON users.userID = items.user_id
                                    ORDER BY item_id DESC");
        // execute the SQL above
        $stmt->execute();
        // assign result from the SQL statement into a variable.
        $rows = $stmt->fetchAll();
        // loop over the $row and print all of it's data
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
            if (strlen($name) > 25) {
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

            if (strlen($description) < 10) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = "Description must be at least <strong>10 Characters</strong>'";
            }

            if (empty($price)) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = lang("itemPriceEmpty");
            }

            if (empty($made_in)) {
                // adding form error to array so I can show it later to user.
                $formErrors[] =  lang("itemMadeInEmpty");
            }

            if (strlen($made_in) < 2) {
                // adding form error to array so I can show it later to user.
                $formErrors[] =  "Country Of origin can't be less than <strong>2 Characters</strong>";
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

        // check if userID is numeric & return the integer value of it
        $item_id = isset($_GET['item_id']) && is_numeric($_GET['item_id']) ?  intval($_GET['item_id']) :  0;
        // select data from database based on the item_id I got from $_GET.
        $stmt = $db_connect->prepare("SELECT * FROM items WHERE item_id = ? LIMIT 1 ");
        // execute query
        $stmt->execute(array($item_id));
        // $row will be an array since fetch retrieve information as an array.
        // fetch data from database.
        $row = $stmt->fetch();
        $total_row = $stmt->rowCount();

        if ($total_row > 0) {
            // include the form with the data.
            include $itemsPages . "editItem.php";
        } else {
            $message =  "<div class='mb-4 alert alert-danger'><div class='container'><div>incorrect item id !</div></div></div>";
            redirectHome($message, null);
        }
    } elseif ($action == "update") {
        // receive request from edit page and update the values in the database.
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $recordChange = '';
            $item_id = $_POST['item_id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $made_in = $_POST['made_in'];
            $status = $_POST['status'];
            $user_id = $_POST['user_id'];
            $cate_id = $_POST['cate_id'];

            // validate the form before updating the database
            $formErrors = array();
            if (strlen($name) > 25) {
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

            // if formErrors is empty connect to the database.
            if (empty($formErrors)) {
                // update the data base with the data I receive from the form in edit page.
                $stmt = $db_connect->prepare('UPDATE items SET name = ? , description = ? , price = ? , made_in = ?, status = ?, cate_id = ?, user_id = ?  WHERE item_id = ?');
                $stmt->execute(array($name, $description, $price, $made_in, $status, $cate_id, $user_id, $item_id));
                // print this message if there was a change in the record
                $recordChange = $stmt->rowCount() . ' ' .  lang("update_recordChangeItem");
                $message =  "<div class='mb-4 alert alert-success'><div class='container'> <div> Item Updated</div>  </div></div>";
                redirectHome($message, "back", 2);
            }
            include $itemsPages . "insertItem.php";
        } else {
            // do
            $message =  "<div class='mb-4 alert alert-danger'><div class='container'><div>you don't access to this page !!</div></div></div>";
            redirectHome($message, null, 2);
        }
    } elseif ($action == "delete") {
        // delete the item from the database

        // check if userID is numeric & return the integer value of it
        $item_id = isset($_GET['item_id']) && is_numeric($_GET['item_id']) ?  intval($_GET['item_id']) :  0;
        // select data from database based on the userID I got from $_GET.

        $checkResult = checkItem("item_id", "items", $item_id);

        if ($checkResult > 0) {
            // delete user
            $stmt = $db_connect->prepare("DELETE FROM items WHERE item_id = ?");
            // $stmt->bindParam(":userID", $userID);
            $stmt->execute(array($item_id));
            $recordChange = $stmt->rowCount() . ' ' .  lang("deleted_recordChangeItem");
            $message =  "<div class='mb-4 alert alert-success'><div class='container'><div>Item Deleted.</div></div></div>";
            include $itemsPages . "deleteItem.php";
        } else {
            $message =  "<div class='mb-4 alert alert-danger'><div class='container'><div>item doesn't exist</div></div></div>";
            redirectHome($message, 'back');
        }
    } elseif ($action == "approve") {
        // approve the request to add an item to the item page.
        // check if userID is numeric & return the integer value of it
        $item_id = isset($_GET['item_id']) && is_numeric($_GET['item_id']) ?  intval($_GET['item_id']) :  0;
        // select data from database based on the item_id I got from $_GET.

        $checkResult = checkItem("item_id", "items", $item_id);

        if ($checkResult > 0) {
            // delete user
            $stmt = $db_connect->prepare("UPDATE items SET approve = 1 WHERE item_id = ?");
            // $stmt->bindParam(":userID", $item_id);
            $stmt->execute(array($item_id));
            $recordChange = $stmt->rowCount() . ' ' .  lang("activate_recordChangeItem");
            $message =  "<div class='mb-4 alert alert-success'><div class='container'><div>Item Activated successfully.</div></div></div>";
            include $itemsPages . 'approveItem.php';
        } else {
            $message =  "<div class='mb-4 alert alert-danger'><div class='container'><div>item doesn't exist</div></div></div>";
            redirectHome($message, "back");
        }
    } else {
        $message =  "<div class='mb-4 alert alert-danger'><div class='container'><div>Error page not found!!</div></div></div>";
        redirectHome($message);
    }
    include $template . "footer.php";
} else {
    header("Location: index.php");
    exit();
}
ob_end_flush();