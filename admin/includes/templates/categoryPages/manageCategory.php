<section class="manage_category py-5">
    <div class="container">
        <h1 class='text-center header_color text-capitalize my-5'>
            <?php echo lang("category_title"); ?>
        </h1>
        <div class="categories__holder">
            <div class="row">
                <?php
                foreach ($categories as $category) {
                    include $categoryPages . "cardDetail.php";
                }
                ?>
            </div>
        </div>
    </div>
    </div>
</section>