<?php $activePage = basename($_SERVER['PHP_SELF'], ".php");
$stmt = $db_connect->prepare("SELECT groupID FROM users WHERE groupID = ? LIMIT 1");
$group_id = '';
if (isset($_SESSION['userFrontGroupID'])) {
    $group_id = $_SESSION['userFrontGroupID'];
}
$stmt->execute(array($group_id));
$total_row = $stmt->rowCount();
if ($total_row > 0) {
    $rows = $stmt->fetch();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap 4.6 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- font-awesome -->
    <script src="https://kit.fontawesome.com/5a0dddbca3.js" crossorigin="anonymous"></script>
    <!-- admin stylesheet  -->
    <link rel="stylesheet" href="<?php echo $css; ?>style.css">
    <title><?php getTitle(); ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand text-capitalize" href="index.php"><?php echo lang("navbar_brand_dashboard"); ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle text-capitalize  <?php if ($activePage == "categories") {
                                                                                echo "active";
                                                                            } ?>" href="#" id="categoriesDropDown"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo lang("navbar_categories_dashboard"); ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="categoriesDropDown">
                            <?php
                            if ($rows['groupID'] == 1) {
                                foreach (getRecordFrom("*", "categories", "ID", "", "", "ASC") as $category) {
                            ?>
                            <a class="dropdown-item text-capitalize"
                                href="categories.php?cateID=<?php echo $category["ID"]; ?>&cateName=<?php echo str_replace(" ", "-", $category['name']); ?>">
                                <?php echo $category['name'] ?></a>
                            <?php
                                }
                            } else {
                                foreach (getRecordFrom("*", "categories", "ID", "WHERE visibility = 0", "", "ASC") as $category) { ?>
                            <a class="dropdown-item text-capitalize"
                                href="categories.php?cateID=<?php echo $category["ID"]; ?>&cateName=<?php echo str_replace(" ", "-", $category['name']); ?>">
                                <?php echo $category['name'] ?></a>
                            <?php  }
                            } ?>
                        </div>
                    </li>


                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle text-capitalize" href="#" id="itemsFilter" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Filter items
                        </a>
                        <div class="dropdown-menu" aria-labelledby="itemsFilter">
                            <a class="dropdown-item text-capitalize" href="categories.php?item_status=1">
                                New
                            </a>
                            <a class="dropdown-item text-capitalize" href="categories.php?item_status=2">
                                Like New
                            </a>
                            <a class="dropdown-item text-capitalize" href="categories.php?item_status=3">
                                Second Hand
                            </a>
                            <a class="dropdown-item text-capitalize" href="categories.php?item_status=4">
                                Old
                            </a>
                        </div>
                    </li>

                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['userFront'])) { ?>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle text-capitalize" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar-holder d-inline-block mr-1">
                                <img class="img-fluid position-relative rounded-circle "
                                    src="layout/images/avatar5.png" />
                            </div>
                            <?php echo $userSession; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-capitalize"
                                href="profile.php?profileName=<?php echo $_SESSION['userFront']; ?>">Profile</a>
                            <?php if (isset($_SESSION['userFrontGroupID']) && ($_SESSION['userFrontGroupID'] == 2 || $_SESSION['userFrontGroupID'] == 1)) { ?>
                            <a class="dropdown-item text-capitalize" href="newAdd.php">Add Item</a>
                            <a class="dropdown-item text-capitalize" href="profile.php#userAds">My Items</a>
                            <?php } ?>
                            <a class="dropdown-item text-capitalize"
                                href="#"><?php echo lang("navbar_settings_dashboard"); ?></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-capitalize"
                                href="logout.php"><?php echo lang("navbar_logout_dashboard") ?></a>
                        </div>
                    </li>
                    <?php } else {  ?>
                    <a class="nav-link text-capitalize" href="login.php">Login | Signup</a>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <?php if (isset($_SESSION['userFront'])) {
        if (checkUserStatus($_SESSION['userFront']) == 1) {   ?>
    <p class="activation alert alert-info mb-0">Welcome, <?php echo $_SESSION['userFront'] ?> your account need to be
        activated
        <button type="button" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </p>
    <?php }
    } ?>