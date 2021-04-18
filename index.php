<?php
ob_start();
session_start();
$pageTitle = "Home page";
include "init.php";
?>
<main id="main" class="main">
    <div id="carouselExampleControls" class="carousel slide carousel-fade position-relative" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="7000">
                <img src="layout/images/slide1.jpg" class="d-block w-100 img-fluid" alt="...">
            </div>
            <div class="carousel-item" data-interval=" 7000">
                <img src="layout/images/slide2.jpg" class="d-block w-100 img-fluid" alt="...">
            </div>
            <div class="carousel-item" data-interval="7000">
                <img src="layout/images/slide3.jpg" class="d-block w-100 img-fluid" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- <section class="hero-section" id="hero-section">
        <div class="container ">
            <div class="row ">
                <div class="heroData align-self-center col-12 col-lg-6 text-center">
                    <h1 class="heading mb-4">eCommerce</h1>
                    <p class="text-capitalize">you can buy everything</p>
                    <a class="hero__more d-inline-block text-center text-capitalize py-2 px-3" href="#">Learn More</a>
                </div>
                <div class="heroData align-self-center d-none d-lg-block col-lg-6">
                    <img class="img-fluid" src="layout/images/placeHolder.png" alt="hero">
                </div>
            </div>
        </div>
    </section> -->

    <?php if (!empty(getItems("cate_id", 14, "AND approve = 1"))) { ?>
    <section class="py-5 latest__handmade">
        <div class="container">
            <h2 class="text-left">hand made</h2>
            <div class="card-holder">
                <div class="row">
                    <?php
                        foreach (getItems("cate_id", 14, "AND approve = 1") as $item) { ?>
                    <!-- echo $item['name']; -->
                    <div class="card-wrapper__user col-12 col-md-6 col-lg-4 p-3">
                        <div class="card ">
                            <img src="./layout/images/placeHolder.png" class="card-img-top img-fluid" alt="placeHolder">
                            <div class="card-body">
                                <h5 class="card-title"><a
                                        href="items.php?item_id=<?php echo $item['item_id'] ?>"><?php echo $item['name']; ?>
                                    </a></h5>
                                <p class="card-text user_card-description">
                                    <?php echo $item['description']; ?></p>
                                <div class="mb-3 d-flex align-items-center price_holder">
                                    <i class="fas fa-tags  fa-xs mr-1"></i>
                                    <span class="d-d-inline-block category_price"><?php echo $item['price']; ?>$</span>
                                </div>
                                <p class="card-text">Add Date:<span class="ml-1"><?php echo $item['add_date']; ?></span>
                                </p>
                                <p class="card-text">Seller<span class="ml-1 text-capitalize"><a class=""
                                            href="profile.php?profileName=<?php echo $item['username']; ?>"><?php echo $item['username']; ?></a></span>
                                </p>
                                <a class="btn btn-primary" href="items.php?item_id=<?php echo $item['item_id'] ?>">Read
                                    More
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if (!empty(getItems("cate_id", 15, "AND approve = 1"))) { ?>
    <section class="py-5 latest__Computers">
        <div class="container">
            <h2 class="text-left">Computers</h2>
            <div class="card-holder">
                <div class="row">
                    <?php
                        foreach (getItems("cate_id", 15, "AND approve = 1") as $item) { ?>
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
                                <p class="card-text">Add Date:<span class="ml-1"><?php echo $item['add_date']; ?></span>
                                </p>
                                <p class="card-text">Seller<span class="ml-1 text-capitalize"><a class=""
                                            href="profile.php?profileName=<?php echo $item['username']; ?>"><?php echo $item['username']; ?></a></span>
                                </p>
                                <a class="btn btn-primary" href="items.php?item_id=<?php echo $item['item_id'] ?>">Read
                                    More
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if (!empty(getItems("cate_id", 16, "AND approve = 1"))) { ?>
    <section class="py-5 latest__PC_parts">
        <div class="container">
            <h2 class="text-left">PC parts</h2>
            <div class="card-holder">
                <div class="row">
                    <?php
                        foreach (getItems("cate_id", 16, "AND approve = 1") as $item) { ?>
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
                                <p class="card-text">Add Date:<span class="ml-1"><?php echo $item['add_date']; ?></span>
                                </p>
                                <p class="card-text">Seller<span class="ml-1 text-capitalize"><a class=""
                                            href="profile.php?profileName=<?php echo $item['username']; ?>"><?php echo $item['username']; ?></a></span>
                                </p>
                                <a class="btn btn-primary" href="items.php?item_id=<?php echo $item['item_id'] ?>">Read
                                    More
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if (!empty(getItems("cate_id", 17, "AND approve = 1"))) { ?>
    <section class="py-5 latest__electronics">
        <div class="container">
            <h2 class="text-left">Electronics</h2>
            <div class="card-holder">
                <div class="row">
                    <?php
                        foreach (getItems("cate_id", 17, "AND approve = 1") as $item) { ?>
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
                                <p class="card-text">Add Date:<span class="ml-1"><?php echo $item['add_date']; ?></span>
                                </p>
                                <p class="card-text">Seller<span class="ml-1 text-capitalize"><a class=""
                                            href="profile.php?profileName=<?php echo $item['username']; ?>"><?php echo $item['username']; ?></a></span>
                                </p>
                                <a class="btn btn-primary" href="items.php?item_id=<?php echo $item['item_id'] ?>">Read
                                    More
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
</main>




<?php include $template .  "footer.php";
ob_end_flush(); ?>