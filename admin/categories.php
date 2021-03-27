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
        $stmt = $db_connect->prepare("SELECT * FROM categories");
        $stmt->execute();
        $categories = $stmt->fetchAll();

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
        // do
        echo "welcome edit";
    } elseif ($action == "update") {
        // do
        echo "welcome update";
    } elseif ($action == "delete") {
        // do
        echo "welcome delete";
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