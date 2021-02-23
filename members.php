<?php

/*
* ================================================================
* ================================================================
*
*                      Manage Members Page
*
*            You can Add | Edit | Delete members from here
*
* ================================================================
* ================================================================
*/

// session is used to make sure the user can't access the page using different pages.
session_start();
// if session is registered direct user to dashboard page
if (isset($_SESSION['username'])) {

    $pageTitle = "Members";
    include "init.php";

    $action = isset($_GET['action']) ? $_GET['action'] : "manage";

    if ($action == "manage") {
        // manage page
    } elseif ($action == "add") {
        // add page
    } else if ($action == "edit") {
        // edit page

        // check if userID is numeric & return the integer value of it
        $userID = isset($_GET['userID']) && is_numeric($_GET['userID']) ?  intval($_GET['userID']) :  0;
        // select data from database based on the userID I got from $_GET.
        $stmt = $db_connect->prepare("SELECT * FROM users  WHERE  userID = ? LIMIT 1 ");
        // execute query
        $stmt->execute(array($userID));
        // $row will be an array since fetch retrieve information as an array.
        // fetch data from database.
        $row = $stmt->fetch();
        $_total_row = $stmt->rowCount();

        if ($_total_row > 0) {
?>
<!--  end of php tag -->

<!--
* ================================================================
* ================================================================
*
*                     start  edit section form
*
* ================================================================
* ================================================================
-->

<section class="edit_section py-5">
    <div class="container">
        <h1 class="text-center text-capitalize mb-5"><?php echo lang("Edit_profile"); ?></h1>
        <form class="row flex-column align-items-center justify-content-center">
            <!-- Username -->
            <div class="form-group  col-12 col-md-9 col-lg-6 no-gutters">
                <label class=" text-capitalize col-form-labe"
                    for="exampleInputUsername"><?php echo lang("username_profile"); ?></label>
                <input value="<?php echo $row['username']; ?>" type="text" class="form-control form-control-lg"
                    id=" exampleInputUsername" autocomplete="off">
            </div>
            <!-- Password -->
            <div class="form-group  col-12 col-md-9 col-lg-6">
                <label class=" text-capitalize col-form-labe"
                    for="exampleInputPassword"><?php echo lang("password_profile"); ?></label>
                <input type="password" class="form-control form-control-lg" id=" exampleInputPassword"
                    autocomplete="new-password">
            </div>
            <!-- email -->
            <div class="form-group  col-12 col-md-9 col-lg-6">
                <label class=" text-capitalize col-form-labe"
                    for="exampleInputEmail"><?php echo lang("email_profile"); ?></label>
                <input value="<?php echo $row['email']; ?>" type="email" class="form-control form-control-lg"
                    id="exampleInputEmail" autocomplete="off">
            </div>
            <!-- FullName -->
            <div class="form-group  col-12 col-md-9 col-lg-6">
                <label class=" text-capitalize col-form-labe"
                    for="exampleInputFullName"><?php echo lang("fullName_profile"); ?></label>
                <input value="<?php echo $row['fullName']; ?>" type="text" class="form-control form-control-lg"
                    id="exampleInputFullName" autocomplete="off">
            </div>
            <div class="form-group col-12 col-md-9 col-lg-6">
                <input type="submit" class="btn btn-primary btn-lg" value="<?php echo lang("save_profile"); ?>">
            </div>
        </form>
    </div>
</section>

<!--
* ================================================================
* ================================================================
*
*                       end of edit section form
*
* ================================================================
* ================================================================
-->

<?php
        } else {
            echo "incorrect userID";
        }
    } elseif ($action == "delete") {
        // delete page
    } else {
        echo "Error page not found";
    }

    include $_template . "footer.php";
} else {
    // if users attempt to enter this page
    // without a registered session get him back to the login page.
    header("Location: index.php");
    exit();
}
?>
<!--  end of php tag -->