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
        <!-- Modal -->
        <div class="modal fade manageCategory" data-targetedModal='manageCategory' id="#manageCategory" tabindex="-1"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo lang("manageCategory_modalTitle"); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><?php echo lang('manageCategory_modalWarning'); ?><span
                                class="ml-1 manage_modal_username"></span>
                        </p>
                        <p><?php echo lang('manageCategory_modalAccount'); ?> <span class="ml-1 manage_modal_ID"></span>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal"><?php echo lang('manageMember_modalClose'); ?></button>
                        <a id="modal_deleteButton" class="btn btn-danger edit_delete_button text-capitalize"
                            data-page_url="categories.php?action=delete&cateID="
                            href=""><?php echo lang("manageMember_delete") ?></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
    </div>
    </div>
</section>