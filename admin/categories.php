<?php

/*
* ================================================================
* ================================================================
*
*                      Manage Categories Page
*
*            You can Add | Edit | update | Activate | Delete members from here
*
* ================================================================
* ================================================================
*/

// session is used to make sure the user can't access the page using different pages.
session_start();
$pageTitle = "Categories";

// if session is registered direct user to dashboard page
if (isset($_SESSION['username'])) {

    include "init.php";

    $action = isset($_GET['action']) ? $_GET['action'] : "manage";

    if ($action == "manage") {
        //do 
        $sort = 'ASC';
        $orderingItem = "ordering";
        $sort_array = array("ASC", "DESC", "ordering", "name");
        if (isset($_GET['sort']) && in_array($_GET['sort'], $sort_array)) {
            $sort = $_GET['sort'];
        }
        if (isset($_GET['orderby']) && in_array($_GET['orderby'], $sort_array)) {
            $orderingItem = $_GET['orderby'];
        }

        $categories =  orderBy("*", "categories", $orderingItem, $sort);

        include $categoryPages . "manageCategory.php";
    } elseif ($action == "add") {
        // do
        include $categoryPages . "categoryAdd.php";
    } elseif ($action == "insert") {
        // do
        // insert page

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $recordChange = '';
            $name = $_POST['name'];
            $description = $_POST['description'];
            $ordering = $_POST['ordering'];
            $visibility = $_POST['visibility'];
            $commenting = $_POST['commenting'];
            $advertisement = $_POST['advertisement'];

            // validate the form before updating the database
            $formErrors = array();
            if (strlen($name) > 25) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = lang("insert_category_name");
            }

            if (empty($name)) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = lang("update_username_empty");
            }

            // find errors in the form sent to you by add member page.
            formErrorsPrint($formErrors);
            // if formErrors is empty connect to the database.
            if (empty($formErrors)) {

                // check if username exist in the database before running the insert query.
                $checkResult = checkItem("name", "categories", $name);
                if ($checkResult == 1) {
                    $message =  "<div class='mb-4 alert alert-danger'><div class='container'><div>Sorry!, category name is already in use</div></div></div>";
                    redirectHome($message, "back", 4);
                } else {
                    // insert the data base with the data I receive from the form in add page.
                    $stmt = $db_connect->prepare('INSERT INTO categories (name ,description ,ordering ,visibility ,allow_comment ,allow_ads) 
                    VALUES (:name, :description ,:ordering ,:visibility, :commenting, :advertisement)');
                    $stmt->execute(array(
                        "name" => $name,
                        "description" => $description,
                        "ordering" => $ordering,
                        "visibility" => $visibility,
                        'commenting' => $commenting,
                        'advertisement' => $advertisement
                    ));
                    // print this message if there was a change in the record
                    $recordChange = $stmt->rowCount() . ' ' .  lang("inserted_recordChangeCategory");
                    $message = "<div class='mb-4 alert alert-success'><div class='container'><div>Category Created</div></div></div>";
                    include $categoryPages . "insertCategory.php";
                }
            } else {
                $message = "<div class='mb-4 alert alert-danger'><div class='container'><div>Fix the above errors:</div></div></div>";
                redirectHome($message, "back", 7);
            }
        } else {
            $message =  "<div class='mb-4 alert alert-danger'><div class='container'><div>you don't access to this page !!</div></div></div>";
            redirectHome($message);
        }
    } elseif ($action == "edit") {
        // edit page section
        // check if cateID is numeric & return the integer value of it
        $cateID = isset($_GET['cateID']) && is_numeric($_GET['cateID']) ?  intval($_GET['cateID']) :  0;
        // select data from database based on the cateID I got from $_GET.
        $stmt = $db_connect->prepare("SELECT * FROM categories  WHERE  ID = ? LIMIT 1 ");
        // execute query
        $stmt->execute(array($cateID));
        // $row will be an array since fetch retrieve information as an array.
        // fetch data from database.
        $row = $stmt->fetch();
        $total_row = $stmt->rowCount();

        if ($total_row > 0) {
            // include the form with the data.
            include $categoryPages . "editCategory.php";
        } else {
            $message =  "<div class='mb-4 alert alert-danger'><div class='container'><div>incorrect category ID !</div></div></div>";
            redirectHome($message, null);
        }
    } elseif ($action == "update") {

        // update page section
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $recordChange = '';
            $cateID = $_POST['cateID'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $ordering = $_POST['ordering'];
            $visibility = $_POST['visibility'];
            $commenting = $_POST['commenting'];
            $advertisement = $_POST['advertisement'];

            // validate the form before updating the database
            $formErrors = array();
            if (strlen($name) > 25) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = lang("insert_category_name");
            }

            if (empty($name)) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = lang("update_username_empty");
            }

            // if formErrors is empty connect to the database.
            if (empty($formErrors)) {
                // update the data base with the data I receive from the form in edit page.
                $stmt = $db_connect->prepare('UPDATE
                categories
                SET
                    name = ? ,
                    description = ? , 
                    ordering = ? ,
                    visibility = ? ,
                    allow_comment = ? ,
                    allow_ads = ?
                WHERE ID = ?');
                $stmt->execute(array($name, $description, $ordering, $visibility, $commenting, $advertisement, $cateID));
                // print this message if there was a change in the record
                $recordChange = $stmt->rowCount() . ' ' .  lang("update_recordChange");
                $message =  "<div class='mb-4 alert alert-success'><div class='container'> <div> Category Updated</div>  </div></div>";
                redirectHome($message, "back", 2);
            }
            include $categoryPages . "categoryUpdate.php";
        } else {
            // do
            $message =  "<div class='mb-4 alert alert-danger'><div class='container'><div>you don't access to this page !!</div></div></div>";
            redirectHome($message, null, 2);
        }
    } elseif ($action == "delete") {
        // check if userID is numeric & return the integer value of it
        $cateID = isset($_GET['cateID']) && is_numeric($_GET['cateID']) ?  intval($_GET['cateID']) :  0;
        // select data from database based on the cateID I got from $_GET.

        $checkResult = checkItem("ID", "categories", $cateID);

        if ($checkResult > 0) {
            // delete user
            $stmt = $db_connect->prepare("DELETE FROM categories WHERE ID = ?");
            // $stmt->bindParam(":userID", $userID);
            $stmt->execute(array($cateID));
            $recordChange = $stmt->rowCount() . ' ' .  lang("deleted_recordChangeCategory");
            $message =  "<div class='mb-4 alert alert-success'><div class='container'><div class='text-capitalize'>Category Deleted.</div></div></div>";
            $pageName = "categories.php";
            include $categoryPages . 'categoryDelete.php';
        } else {
            $message =  "<div class='mb-4 alert alert-danger'><div class='container'><div class='text-capitalize'>Category doesn't exist</div></div></div>";
            redirectHome($message, 'back');
        };
    }
?>
    <script src="<?php echo $js; ?>showButtons.js"></script>
<?php
    include $template . "footer.php";
} else {
    // if users attempt to enter this page
    // without a registered session get him back to the login page.
    header("Location: index.php");
    exit();
}
?>
<!--  end of php tag -->