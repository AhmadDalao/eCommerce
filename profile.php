<?php
ob_start();
session_start();
$pageTitle = "Profile";
include "init.php";
$action = isset($_GET['action']) ? $_GET['action'] : "manage";
if ($action == "manage") {
    if (isset($_SESSION['userFront']) && ($_GET['profileName'] == $_SESSION['userFront'])) {

        $stat = $db_connect->prepare("SELECT * FROM users WHERE username = ? ");
        $stat->execute(array($userSession));
        $row = $stat->fetch();
        $user_id = $row['userID'];
?>
<section class="profile-info py-5">
    <div class="container">
        <h1 class="text-center mb-4 text-capitalize header_color"><?php echo $row['username'] . '\'s'; ?> Profile</h1>
        <div class="row">
            <div class="userInfo col-12 mb-5">
                <div class="card">
                    <div class="card-header">
                        <span class="text-capitalize"><i class="fas fa-user mr-2"></i>User Information</span>
                        <span class="hideList float-right px-3">
                            <i class="fas fa-plus fa-lg fa-fw"></i>
                        </span>
                    </div>
                    <div class="card-body py-5 hideItem">
                        <div class=" card  mx-auto profile__data position-relative overflow-hidden <?php if ($row['register_status'] == 1) {
                                                                                                                echo "strapProfile";
                                                                                                            } else {
                                                                                                                echo "strapProfileNotActive";
                                                                                                            } ?>"
                            data-register="<?php if ($row['register_status'] == 1) {
                                                                                                                                        echo "Active";
                                                                                                                                    } else {
                                                                                                                                        echo "Not Active";
                                                                                                                                    } ?>"
                            style="max-width: 18rem;">
                            <div class="profile-header-img">
                                <img class="img-fluid position-relative" src="layout/images/avatar5.png" />
                            </div>
                            <div class="card-body">
                                <h5 class="text-center">
                                    <p class="mb-0"><?php echo $row['username']; ?></p>
                                </h5>
                                <?php if (!empty($row['fullName'])) {  ?>
                                <h6 class="card-subtitle mb-3 text-center text-muted">
                                    <?php echo $row['fullName']; ?>
                                </h6>
                                <?php } ?>

                                <div class="dataContainer text-center card-text">
                                    <?php echo $row['email']; ?>
                                    <p class="mb-0">Member Since <span class="ml-1"><?php echo $row['Date']; ?></span>
                                    </p>
                                </div>
                                <!-- <p class="mb-0">favorite to be added later </p> -->
                            </div>
                            <a class="editProfile-link text-capitalize d-inline-block"
                                href="profile.php?action=edit&profile_id=<?php echo $_SESSION['frontUserID']; ?>">
                                <div class="edit-profile text-center py-3">
                                    <p class="text-capitalize mb-0">Edit profile</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (isset($_SESSION['userFrontGroupID']) && ($_SESSION['userFrontGroupID'] == 2 || $_SESSION['userFrontGroupID'] == 1)) { ?>
            <div class="userAds col-12 mb-5" id="userAds">
                <div class="card">
                    <div class="card-header">
                        <span class="text-capitalize"><i class="fas fa-ad mr-2"></i>User items</span>
                        <span class="hideList float-right px-3">
                            <i class="fas fa-plus fa-lg fa-fw"></i>
                        </span>
                    </div>
                    <div class="card-body hideItem">
                        <div class="row">
                            <?php
                                        if (!empty(getItems("user_id", $user_id))) {
                                            foreach (getItems("user_id", $row['userID']) as $item) { ?>
                            <div class="card-wrapper__user col-12 col-md-6 col-lg-4 p-3">
                                <div class="card position-relative overflow-hidden <?php if ($item['approve'] == 0) {
                                                                                                            echo "strapItem";
                                                                                                        } ?>"
                                    data-itemIsApprove="<?php if ($item['approve'] == 0) {
                                                                                                                                        echo "Waiting Approval";
                                                                                                                                    } ?>">
                                    <img src="./layout/images/placeHolder.png" class="card-img-top img-fluid"
                                        alt="placeHolder">
                                    <div class="card-body">
                                        <h5 class="card-title"><a
                                                href="items.php?item_id=<?php echo $item['item_id'] ?>"><?php echo $item['name']; ?>
                                            </a></h5>
                                        <p class="card-text user_card-description"><?php echo $item['description']; ?>
                                        </p>
                                        <div class="mb-3 d-flex align-items-center price_holder">
                                            <i class="fas fa-tags  fa-xs mr-1"></i>
                                            <span
                                                class="d-d-inline-block category_price"><?php echo $item['price']; ?>$</span>
                                        </div>
                                        <p class="card-text">Add Date:<span
                                                class="ml-1"><?php echo $item['add_date']; ?></span></p>
                                        <p class="card-text text-left ">Category
                                            <a class="font-weight-bold text-capitalize"
                                                href="categories.php?cateID=<?php echo $item["category_id"]; ?>&cateName=<?php echo str_replace(" ", "-", $item['category_name']); ?>">
                                                <?php echo $item['category_name'] ?></a>
                                        </p>
                                        <a class="btn btn-primary"
                                            href="items.php?item_id=<?php echo $item['item_id'] ?>">Read More
                                        </a>
                                        <a class="btn btn-danger"
                                            href="profile.php?action=delete&item_id=<?php echo $item['item_id']; ?>">Delete
                                            item</a>
                                    </div>
                                </div>
                            </div>
                            <?php }
                                        } else { ?>
                            <div class="col-12 alert alert-info">There are no items to show</div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

            <div class="userComments col-12">
                <div class="card">
                    <div class="card-header">
                        <span class="text-capitalize"><i class="fas fa-comment mr-2"></i>User latest comments</span>
                        <span class="hideList float-right px-3">
                            <i class="fas fa-plus fa-lg fa-fw"></i>
                        </span>
                    </div>
                    <div class="card-body hideItem">
                        <?php
                                $comments = getRecordFrom("comment", "comments", "comment_id", "WHERE user_id = $user_id ", "");
                                if (!empty($comments)) { ?>
                        <ul class="comments-list list-group list-group-flush">
                            <?php
                                    foreach ($comments as $comment) {
                                        echo "<li class='list-group-item'>" . $comment['comment'] . "</li>";
                                    }
                                } else {
                                    echo "<p class='alert alert-info'>No comments to show</p>";
                                } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- what a profile visiter  will see -->
<?php } elseif (!isset($_SESSION['userFront']) ||  $_SESSION['userFront'] != $_GET['profileName']) {
        $stat = $db_connect->prepare("SELECT * FROM users WHERE username = ?");
        $stat->execute(array($_GET['profileName']));
        $row = $stat->fetch();
        $user_id = $row['userID'];
        if ($row['groupID'] != 1) {
        ?>
<section class="profile-info py-5">
    <div class="container">
        <h1 class="text-center mb-4 text-capitalize header_color"><?php echo $row['username'] . '\'s'; ?> Profile</h1>
        <div class="row">
            <div class="userInfo col-12 mb-5">
                <div class="card">
                    <div class="card-header">
                        <span class="text-capitalize"><i class="fas fa-user mr-2"></i>User Information</span>
                        <span class="hideList float-right px-3">
                            <i class="fas fa-plus fa-lg fa-fw"></i>
                        </span>
                    </div>
                    <div class="card-body py-5 hideItem">
                        <div class=" card  mx-auto profile__data position-relative overflow-hidden <?php if ($row['register_status'] == 1) {
                                                                                                                    echo "strapProfile";
                                                                                                                } else {
                                                                                                                    echo "strapProfileNotActive";
                                                                                                                } ?>"
                            data-register="<?php if ($row['register_status'] == 1) {
                                                                                                                                            echo "Active";
                                                                                                                                        } else {
                                                                                                                                            echo "Not Active";
                                                                                                                                        } ?>"
                            style="max-width: 18rem;">
                            <div class="profile-header-img">
                                <img class="img-fluid position-relative" src="layout/images/avatar5.png" />
                            </div>
                            <div class="card-body">
                                <h5 class="text-center">
                                    <p class="mb-0"><?php echo $row['username']; ?></p>
                                </h5>
                                <h6 class="card-subtitle mb-3 text-center text-muted">
                                    <?php echo $row['fullName']; ?>
                                </h6>

                                <div class="dataContainer text-center card-text pb-3">
                                    <?php echo $row['email']; ?>
                                    <p class="mb-0">Member Since <span class="ml-1"><?php echo $row['Date']; ?></span>
                                    </p>
                                </div>
                                <!-- <p class="mb-0">favorite to be added later </p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="userAds col-12 mb-5" id="userAds">
                <div class="card">
                    <div class="card-header">
                        <span class="text-capitalize"><i class="fas fa-ad mr-2"></i>User items</span>
                        <span class="hideList float-right px-3">
                            <i class="fas fa-plus fa-lg fa-fw"></i>
                        </span>
                    </div>
                    <div class="card-body hideItem">
                        <div class="row">
                            <?php
                                        if (!empty(getItems("user_id", $user_id, "AND approve = 1"))) {
                                            foreach (getItems("user_id", $row['userID'], "AND approve = 1") as $item) { ?>
                            <div class="card-wrapper__user col-12 col-md-6 col-lg-4 p-3">
                                <div class="card position-relative overflow-hidden <?php if ($item['approve'] == 0) {
                                                                                                            echo "strapItem";
                                                                                                        } ?>"
                                    data-itemIsApprove="<?php if ($item['approve'] == 0) {
                                                                                                                                        echo "Waiting Approval";
                                                                                                                                    } ?>">
                                    <img src="./layout/images/placeHolder.png" class="card-img-top img-fluid"
                                        alt="placeHolder">
                                    <div class="card-body">
                                        <h5 class="card-title"><a
                                                href="items.php?item_id=<?php echo $item['item_id'] ?>"><?php echo $item['name']; ?>
                                            </a></h5>
                                        <p class="card-text user_card-description"><?php echo $item['description']; ?>
                                        </p>
                                        <div class="mb-3 d-flex align-items-center price_holder">
                                            <i class="fas fa-tags  fa-xs mr-1"></i>
                                            <span
                                                class="d-d-inline-block category_price"><?php echo $item['price']; ?>$</span>
                                        </div>
                                        <p class="card-text">Add Date:<span
                                                class="ml-1"><?php echo $item['add_date']; ?></span></p>
                                        <p class="card-text text-left ">Category
                                            <a class="font-weight-bold text-capitalize"
                                                href="categories.php?cateID=<?php echo $item["category_id"]; ?>&cateName=<?php echo str_replace(" ", "-", $item['category_name']); ?>">
                                                <?php echo $item['category_name'] ?></a>
                                        </p>
                                        <a class="btn btn-primary"
                                            href="items.php?item_id=<?php echo $item['item_id'] ?>">Read More
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php }
                                        } else { ?>
                            <div class="col-12 alert alert-info">There are no items to show</div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>


            <div class="userComments col-12">
                <div class="card">
                    <div class="card-header">
                        <span class="text-capitalize"><i class="fas fa-comment mr-2"></i>User latest comments</span>
                        <span class="hideList float-right px-3">
                            <i class="fas fa-plus fa-lg fa-fw"></i>
                        </span>
                    </div>
                    <div class="card-body hideItem">
                        <?php
                                    $comments = getRecordFrom("comment", "comments", "comment_id", "WHERE user_id = $user_id ", "");
                                    if (!empty($comments)) { ?>
                        <ul class="comments-list list-group list-group-flush">
                            <?php
                                        foreach ($comments as $comment) {
                                            echo "<li class='list-group-item'>" . $comment['comment'] . "</li>";
                                        }
                                    } else {
                                        echo "<p class='alert alert-info'>No comments to show</p>";
                                    } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
        } else {
            $message = "<div class='mb-4 alert alert-danger'><div class='container'><div>Access denied</div></div></div>";
            redirectHome($message, "back", 2);
        }
    }
} elseif ($action == "edit") {
    // edit profile data

    // check if userID is numeric & return the integer value of it
    $userID = isset($_GET['profile_id']) && is_numeric($_GET['profile_id']) ?  intval($_GET['profile_id']) :  0;
    // select data from database based on the userID I got from $_GET.
    $stmt = $db_connect->prepare("SELECT * FROM users  WHERE  userID = ? AND username = ? LIMIT 1 ");
    // execute query
    $stmt->execute(array($userID, $_SESSION['userFront']));
    // $row will be an array since fetch retrieve information as an array.
    // fetch data from database.
    $row = $stmt->fetch();
    $total_row = $stmt->rowCount();

    if ($total_row > 0) { ?>

<section class="edit_section py-5">
    <div class="container">
        <h1 class="text-center header_color text-capitalize mb-5">Edit <?php echo $_SESSION['userFront']; ?> Profile
        </h1>
        <form method="POST" action="?action=update"
            class="edit__form row flex-column align-items-center justify-content-center">
            <input type="text" name="edit_userID" value="<?php echo $userID ?>" hidden>
            <!-- Username -->
            <div class="form-group edit_fix position-relative  col-12 col-md-9 col-lg-6 ">
                <label class=" text-capitalize"
                    for="exampleInputUsername"><?php echo lang("edit_username_profile"); ?></label>
                <input value="<?php echo $row['username']; ?>" type="text" class="form-control form-control-lg"
                    name="edit_username" id=" exampleInputUsername" autocomplete="off" required>
            </div>
            <!-- Password -->
            <div class="form-group edit_fix col-12 col-md-9 col-lg-6">
                <label class=" text-capitalize "
                    for="exampleInputPassword"><?php echo lang("edit_password_profile"); ?></label>
                <input type="password" class="password form-control form-control-lg" id=" exampleInputPassword"
                    autocomplete="new-password" name="edit_new_password"
                    placeholder="<?php echo lang("edit_password_empty"); ?>">
                <input type="password" hidden name="edit_old_password" autocomplete="new-password"
                    value="<?php echo $row['password']; ?>">
                <span class="show__eye"><i class="fas fa-eye "></i></span>
            </div>
            <!-- email -->
            <div class="form-group edit_fix position-relative  col-12 col-md-9 col-lg-6">
                <label class=" text-capitalize "
                    for="exampleInputEmail"><?php echo lang("edit_email_profile"); ?></label>
                <input value="<?php echo $row['email']; ?>" type="email" class="form-control form-control-lg"
                    name="edit_email" id="exampleInputEmail" autocomplete="off" required>
            </div>
            <!-- FullName -->
            <div class="form-group  edit_fix position-relative col-12 col-md-9 col-lg-6">
                <label class=" text-capitalize "
                    for="exampleInputFullName"><?php echo lang("edit_fullName_profile"); ?></label>
                <input value="<?php echo $row['fullName']; ?>" type="text" class="form-control form-control-lg"
                    name="edit_fullName" id="exampleInputFullName" autocomplete="off" required>
            </div>
            <div class="form-group col-12 col-md-9 col-lg-6">
                <input type="submit" class="btn btn-primary btn-lg" value="<?php echo lang("edit_save_profile"); ?>">
            </div>
        </form>
    </div>
</section>
<script src="<?php echo $js; ?>showEye.js"></script>

<?php } else {
        $message =  "<div class='mb-4 alert alert-danger'><div class='container'><div>incorrect userID !</div></div></div>";
        redirectHome($message, null);
    }
} elseif ($action == "update") {
    // update the profile after edit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $recordChange = '';
        $update_userID = $_POST['edit_userID'];
        $update_username = $_POST['edit_username'];
        $update_email = $_POST['edit_email'];
        $update_fullName = $_POST['edit_fullName'];
        $update_old_password = $_POST['edit_old_password'];
        $update_new_password = $_POST['edit_new_password'];
        $update_password = '';

        $update_password = empty($update_new_password)  ?  $update_old_password :  sha1($update_new_password);

        // validate the form before updating the database
        $formErrors = array();
        if (strlen($update_username) > 15) {
            // adding form error to array so I can show it later to user.
            $formErrors[] = lang("update_username_greater");
        }

        if (strlen($update_username) < 4) {
            // adding form error to array so I can show it later to user.
            $formErrors[] = lang("update_username_less");
        }

        if (empty($update_username)) {
            // adding form error to array so I can show it later to user.
            $formErrors[] = lang("update_username_empty");
        }

        if (empty($update_fullName)) {
            // adding form error to array so I can show it later to user.
            $formErrors[] = lang("update_fullName_empty");
        }
        if (strlen($update_fullName) < 4) {
            // adding form error to array so I can show it later to user.
            $formErrors[] = lang("update_fullName_less");
        }

        if (empty($update_email)) {
            // adding form error to array so I can show it later to user.
            $formErrors[] =  lang("update_email_empty");
        }

        // if formErrors is empty connect to the database.
        if (empty($formErrors)) {

            $stmt2 = $db_connect->prepare('SELECT * FROM users WHERE username = ? AND userID != ? ');
            $stmt2->execute(array($update_username, $update_userID));
            $count = $stmt2->rowCount();

            if ($count == 1) {
                echo '<div class="container mt-5"><p class="alert alert-danger">user already exist</p></div>';
                $message = "";
                redirectHome($message, "back", 2);
            } else {
                // update the data base with the data I receive from the form in edit page.
                $stmt = $db_connect->prepare('UPDATE users SET username = ? , email = ? , fullName = ? , password = ? WHERE userID = ?');
                $stmt->execute(array($update_username, $update_email, $update_fullName, $update_password, $update_userID));
                // print this message if there was a change in the record
                $recordChange = $stmt->rowCount() . ' ' .  lang("update_recordChange");
                $message =  "<div class='mb-4 alert alert-success'><div class='container'> <div> Profile Updated</div>  </div></div>";
                redirectHome($message, "back", 2);
            }
        } else {
            formErrorsPrint($formErrors);
            redirectHome($message, "back", 5);
        }
        // include $memberPages . "updateMember.php";
    } else {
        // do
        $message =  "<div class='mb-4 alert alert-danger'><div class='container'><div>you don't access to this page !!</div></div></div>";
        redirectHome($message, null, 2);
    }
} elseif ($action == "delete") {
    // delete item from user items
    // check if userID is numeric & return the integer value of it
    $item_id = isset($_GET['item_id']) && is_numeric($_GET['item_id']) ?  intval($_GET['item_id']) :  0;
    // select data from database based on the userID I got from $_GET.

    $checkResult = checkItem("item_id", "items", $item_id);

    if ($checkResult > 0) {
        // delete user
        $stmt = $db_connect->prepare("DELETE FROM items WHERE item_id = ?");
        // $stmt->bindParam(":userID", $userID);
        $stmt->execute(array($item_id));
        $message =  "<div class='mb-4 alert alert-success'><div class='container'><div>Item Deleted.</div></div></div>";
        redirectHome($message, 'back');
    } else {
        $message =  "<div class='mb-4 alert alert-danger'><div class='container'><div>item doesn't exist</div></div></div>";
        redirectHome($message, 'back');
    }
} else {
    header('Location: login.php');
    exit();
}
include $template .  "footer.php";
ob_end_flush(); ?>