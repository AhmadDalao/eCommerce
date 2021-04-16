<?php
ob_start();
session_start();
$pageTitle = "Categories";
include "init.php";

// select data from database based on the item_id I got from $_GET.
$stmt = $db_connect->prepare("SELECT * FROM categories  WHERE ID = ? AND allow_ads = 1 LIMIT 1 ");
// execute query
$stmt->execute(array($_GET['cateID']));
// $row will be an array since fetch retrieve information as an array.

$total_row = $stmt->rowCount();
if ($total_row > 0) {
    $row = $stmt->fetch();
}
?>


<section class="userCategory py-5">
    <div class="container">
        <h1 class='text-center header_color text-capitalize my-5'>
            <?php echo str_replace("-", " ", $_GET['cateName']); ?>
        </h1>
        <?php if (!empty($row)) {
            echo "<p class='alert alert-info'>adding items to this category is disabled </p>";
        } ?>
        <div class="card-holder">
            <div class="row">
                <?php
                if (!empty(getItems("cate_id", $_GET['cateID'], "AND approve = 1"))) {
                    foreach (getItems("cate_id", $_GET['cateID'], "AND approve = 1") as $item) { ?>
                <!-- echo $item['name']; -->
                <div class="card-wrapper__user col-12 col-md-6 col-lg-4 p-3">
                    <div class="card ">
                        <img src="./layout/images/placeHolder.png" class="card-img-top img-fluid" alt="placeHolder">
                        <div class="card-body">
                            <h5 class="card-title"><a
                                    href="items.php?item_id=<?php echo $item['item_id'] ?>"><?php echo $item['name']; ?>
                                </a></h5>
                            <p class="card-text user_card-description"><?php echo $item['description']; ?></p>
                            <div class="mb-3 d-flex align-items-center price_holder">
                                <i class="fas fa-tags  fa-xs mr-1"></i>
                                <span class="d-d-inline-block category_price"><?php echo $item['price']; ?>$</span>
                            </div>
                            <p class="card-text">Add Date:<span class="ml-1"><?php echo $item['add_date']; ?></span></p>
                            <p class="card-text">Seller<span class="ml-1 text-capitalize"><a class=""
                                        href="profile.php?profileName=<?php echo $item['username']; ?>"><?php echo $item['username']; ?></a></span>
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
</section>


<?php include $template .  "footer.php";
ob_end_flush(); ?>