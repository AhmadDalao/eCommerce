<?php if (!empty($rows)) { ?>
    <section class="manage_item py-5">
        <div class="container">
            <h1 class='text-center header_color text-capitalize my-5'>
                <?php echo lang("items__title"); ?>
            </h1>
            <div class="table-responsive ">
                <table class="manage__table item__description table table-bordered table-striped table-dark table-hover">
                    <thead>
                        <tr>
                            <th class="text-capitalize" scope="col"><?php echo lang("item_id"); ?></th>
                            <th class="text-capitalize" scope="col"><?php echo lang("item_name"); ?></th>
                            <th class="text-capitalize" scope="col"><?php echo lang("item_description"); ?></th>
                            <th class="text-capitalize" scope="col"><?php echo lang("item_price"); ?></th>
                            <th class="text-capitalize" scope="col"><?php echo lang("item_addDate"); ?></th>
                            <th class="text-capitalize" scope="col"><?php echo lang("item_category"); ?></th>
                            <th class="text-capitalize" scope="col"><?php echo lang("item_username"); ?></th>
                            <th class="text-capitalize" scope="col"><?php echo lang("item_madeIn"); ?></th>
                            <th class="text-capitalize" scope="col"><?php echo lang("item_control"); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $row) {
                            include $itemsPages . "tableDataItem.php";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- Modal -->
            <div class="modal fade manageItem" data-targetedModal='manageItem' id="#manageItem" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><?php echo lang("manageItem_modalTitle"); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p><?php echo lang('manageItem_modalWarning'); ?><span class="ml-1 manage_modal_username"></span>
                            </p>
                            <p><?php echo lang('manageItem_modalAccount'); ?> <span class="ml-1 manage_modal_ID"></span>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo lang('manageMember_modalClose'); ?></button>
                            <a id="modal_deleteButton" class="btn btn-danger edit_delete_button text-capitalize" data-page_url="items.php?action=delete&item_id=" href=""><?php echo lang("manageMember_delete") ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <a class="add__member btn  btn-primary mt-3" href="items.php?action=add"><i class="fas fa-plus mr-1"></i><?php echo lang("add_item"); ?></a>
        </div>
    </section>
<?php } else {
    echo "<div class='container'>
        <p class='alert alert-info'>there are no items to display</p>" ?>
    <a class="add__member btn  btn-primary mt-3" href="items.php?action=add"><i class="fas fa-plus mr-1"></i><?php echo lang("add_item"); ?></a>
<?php "</div>";
} ?>