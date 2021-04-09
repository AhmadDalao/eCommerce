<?php
ob_start();
session_start();
$pageTitle = "Profile";
include "init.php";
if (isset($_SESSION['userFront'])) {
    $stat = $db_connect->prepare("SELECT * FROM users WHERE username = ?");
    $stat->execute(array($userSession));
    $row = $stat->fetch();

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
            <div class="userAds col-12 mb-5">
                <div class="card">
                    <div class="card-header">
                        <span class="text-capitalize"><i class="fas fa-ad mr-2"></i>User Advertisements</span>
                        <span class="hideList float-right px-3">
                            <i class="fas fa-plus fa-lg fa-fw"></i>
                        </span>
                    </div>
                    <div class="card-body hideItem">
                        <div class="row">
                            <?php
                                if (!empty(getItems("user_id", $row['userID']))) {
                                    foreach (getItems("user_id", $row['userID']) as $item) { ?>
                            <!-- echo $item['name']; -->
                            <div class="card-wrapper__user col-12 col-md-6 col-lg-4 p-3">
                                <div class="card ">
                                    <img src="./layout/images/placeHolder.png" class="card-img-top img-fluid"
                                        alt="placeHolder">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $item['name']; ?></h5>
                                        <p class="card-text user_card-description"><?php echo $item['description']; ?>
                                        </p>
                                        <div class="mb-3 d-flex align-items-center price_holder">
                                            <i class="fas fa-tags  fa-xs mr-1"></i>
                                            <span
                                                class="d-d-inline-block category_price"><?php echo $item['price']; ?></span>
                                        </div>
                                        <p class="card-text text-right"><?php echo $item['add_date']; ?></p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
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
                            $stmt = $db_connect->prepare("SELECT comment FROM comments  WHERE user_id = ?");
                            // execute the SQL above
                            $stmt->execute(array($row['userID']));
                            // assign result from the SQL statement into a variable.
                            $comments = $stmt->fetchAll();
                            if (!empty($comments)) {
                                foreach ($comments as $comment) {
                                    echo "<p>" . $comment['comment'] . "</p>";
                                }
                            } else {
                                echo "<p class='alert alert-info'>No comments to show</p>";
                            } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php } else {
    header('Location: login.php');
    exit();
}
include $template .  "footer.php";
ob_end_flush(); ?>