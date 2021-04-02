<section class="manage_comments py-5">
    <div class="container">
        <h1 class='text-center header_color text-capitalize my-5'>
            <?php echo lang("manageComments_title"); ?>
        </h1>
        <div class="table-responsive ">
            <table class="manage__table table table-bordered table-striped table-dark table-hover">
                <thead>
                    <tr>
                        <th class="text-capitalize" scope="col"><?php echo lang("comment_id"); ?></th>
                        <th class="text-capitalize" scope="col"><?php echo lang("comment_text"); ?></th>
                        <th class="text-capitalize" scope="col"><?php echo lang("comment_itemName"); ?></th>
                        <th class="text-capitalize" scope="col"><?php echo lang("comment_userName"); ?></th>
                        <th class="text-capitalize" scope="col"><?php echo lang("comment_date"); ?></th>
                        <th class="text-capitalize" scope="col"><?php echo lang("comment_control"); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row) {
                        include $commentsPages . "tableDataComments.php";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- Modal -->
        <div class="modal fade manageComments" data-targetedModal='manageComments' id="#manageComments" tabindex="-1"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo lang("manageComment_modalTitle"); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><?php echo lang('manageComment_modalWarning'); ?>
                            <strong><span class="ml-1 manage_modal_username"></span></strong>
                            's comment
                        </p>
                        <p><?php echo lang("manageComment_modalAccount"); ?> <span class="ml-1 manage_modal_ID"></span>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal"><?php echo lang("manageMember_modalClose"); ?></button>
                        <a id="modal_deleteButton" class="btn btn-danger edit_delete_button text-capitalize"
                            data-page_url="comments.php?action=delete&comment_id="
                            href=""><?php echo lang("manageMember_delete") ?></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
    </div>
</section>