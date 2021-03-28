<section class="manage_category py-5">
    <div class="container">
        <h1 class='text-center header_color text-capitalize my-5'>
            <?php echo lang("category_title"); ?>
        </h1>
        <div class="order_holder mb-4">
            <span class="text-left text-capitalize font-weight-bold mr-2"><?php echo lang("order_by"); ?></span>
            <a class="btn btn-dark <?php if ($sort == "ASC") {
                                        echo "bg-secondary";
                                    } ?>" href="?sort=ASC">ASC</a>
            <a class="btn btn-dark <?php if ($sort == "DESC") {
                                        echo "bg-secondary";
                                    } ?>" href="?sort=DESC">DESC</a>
            <a class="btn btn-dark <?php if ($orderingItem == "name") {
                                        echo "bg-secondary";
                                    } ?>" href="?orderby=name">name</a>
        </div>
        <div class="categoryAdd_button-holder text-right mb-3">
            <a class="add__member btn btn-lg btn-primary mt-3" href="?action=add"><i
                    class="fas fa-plus mr-1"></i><?php echo lang("Add_category"); ?></a>
        </div>
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