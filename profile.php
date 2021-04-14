<?php
ob_start();
session_start();
$pageTitle = "Profile";
include "init.php";
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
                                                                                                        } ?>" data-register="<?php if ($row['register_status'] == 1) {
                                                                                                                                    echo "Active";
                                                                                                                                } else {
                                                                                                                                    echo "Not Active";
                                                                                                                                } ?>" style="max-width: 18rem;">
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

                                    <div class="dataContainer text-center card-text">
                                        <?php echo $row['email']; ?>
                                        <p class="mb-0">Member Since <span class="ml-1"><?php echo $row['Date']; ?></span>
                                        </p>
                                    </div>
                                    <!-- <p class="mb-0">favorite to be added later </p> -->
                                </div>
                                <a class="editProfile-link text-capitalize d-inline-block" href="">
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
                                                                                                    } ?>" data-itemIsApprove="<?php if ($item['approve'] == 0) {
                                                                                                                                    echo "Waiting Approval";
                                                                                                                                } ?>">
                                                    <img src="./layout/images/placeHolder.png" class="card-img-top img-fluid" alt="placeHolder">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><a href="items.php?item_id=<?php echo $item['item_id'] ?>"><?php echo $item['name']; ?>
                                                            </a></h5>
                                                        <p class="card-text user_card-description"><?php echo $item['description']; ?>
                                                        </p>
                                                        <div class="mb-3 d-flex align-items-center price_holder">
                                                            <i class="fas fa-tags  fa-xs mr-1"></i>
                                                            <span class="d-d-inline-block category_price"><?php echo $item['price']; ?>$</span>
                                                        </div>
                                                        <p class="card-text">Add Date:<span class="ml-1"><?php echo $item['add_date']; ?></span></p>
                                                        <p class="card-text text-left ">Category
                                                            <a class="font-weight-bold text-capitalize" href="categories.php?cateID=<?php echo $item["category_id"]; ?>&cateName=<?php echo str_replace(" ", "-", $item['category_name']); ?>">
                                                                <?php echo $item['category_name'] ?></a>
                                                        </p>
                                                        <a class="btn btn-primary" href="items.php?item_id=<?php echo $item['item_id'] ?>">Read More
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
                                                                                                            } ?>" data-register="<?php if ($row['register_status'] == 1) {
                                                                                                                                        echo "Active";
                                                                                                                                    } else {
                                                                                                                                        echo "Not Active";
                                                                                                                                    } ?>" style="max-width: 18rem;">
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
                                                                                                    } ?>" data-itemIsApprove="<?php if ($item['approve'] == 0) {
                                                                                                                                    echo "Waiting Approval";
                                                                                                                                } ?>">
                                                    <img src="./layout/images/placeHolder.png" class="card-img-top img-fluid" alt="placeHolder">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><a href="items.php?item_id=<?php echo $item['item_id'] ?>"><?php echo $item['name']; ?>
                                                            </a></h5>
                                                        <p class="card-text user_card-description"><?php echo $item['description']; ?>
                                                        </p>
                                                        <div class="mb-3 d-flex align-items-center price_holder">
                                                            <i class="fas fa-tags  fa-xs mr-1"></i>
                                                            <span class="d-d-inline-block category_price"><?php echo $item['price']; ?>$</span>
                                                        </div>
                                                        <p class="card-text">Add Date:<span class="ml-1"><?php echo $item['add_date']; ?></span></p>
                                                        <p class="card-text text-left ">Category
                                                            <a class="font-weight-bold text-capitalize" href="categories.php?cateID=<?php echo $item["category_id"]; ?>&cateName=<?php echo str_replace(" ", "-", $item['category_name']); ?>">
                                                                <?php echo $item['category_name'] ?></a>
                                                        </p>
                                                        <a class="btn btn-primary" href="items.php?item_id=<?php echo $item['item_id'] ?>">Read More
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
} else {
    header('Location: login.php');
    exit();
}
include $template .  "footer.php";
ob_end_flush(); ?>