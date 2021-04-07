<?php
ob_start();
session_start();
$pageTitle = "Categories";
include "init.php"; ?>


<section class="userCategory py-5">
    <div class="container">
        <h1 class='text-center header_color text-capitalize my-5'>
            <?php echo str_replace("-", " ", $_GET['cateName']); ?>
        </h1>
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
                            <h5 class="card-title"><?php echo $item['name']; ?></h5>
                            <p class="card-text user_card-description"><?php echo $item['description']; ?></p>
                            <div class="mb-3 d-flex align-items-center price_holder">
                                <i class="fas fa-tags  fa-xs mr-1"></i>
                                <span class="d-d-inline-block category_price"><?php echo $item['price']; ?></span>
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
</section>


<?php include $template .  "footer.php";
ob_end_flush(); ?>