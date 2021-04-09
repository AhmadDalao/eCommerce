<?php
ob_start();
session_start();
$pageTitle = "Login";
include "init.php"; // if session is registered direct user to dashboard page
// if (isset($_SESSION['userFront'])) {
// header("Location: index.php");
// exit();
// }
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

    <section class="py-5">
        <div class="container">
            <h2 class="text-center"></h2>
            <div class="row">

            </div>
        </div>
    </section>
</main>




<?php include $template .  "footer.php";
ob_end_flush(); ?>