<section class="manage_member py-5">
    <div class="container">
        <h1 class='text-center header_color text-capitalize my-5'>
            <?php echo lang("manageMember_title"); ?>
        </h1>
        <div class="table-responsive ">
            <table class="manage__table table table-bordered table-striped table-dark table-hover">
                <thead>
                    <tr>
                        <th class="text-capitalize" scope="col"><?php echo lang("table_id"); ?></th>
                        <th class="text-capitalize" scope="col"><?php echo lang("table_username"); ?></th>
                        <th class="text-capitalize" scope="col"><?php echo lang("table_email"); ?></th>
                        <th class="text-capitalize" scope="col"><?php echo lang("table_fullName"); ?></th>
                        <th class="text-capitalize" scope="col"><?php echo lang("table_registeredDate"); ?></th>
                        <th class="text-capitalize" scope="col"><?php echo lang("table_control"); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row) {
                        include $template . "tableData.php";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- Modal -->
        <div class="modal fade manage_member_modal" id="#45" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this account:<span class="ml-1 manage_modal_username"></span>
                        </p>
                        <p>account ID:<span class="ml-1 manage_modal_userID"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a id="modal_deleteButton" class="btn btn-danger edit_delete_button text-capitalize"
                            href="">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <a class="add__member btn btn-lg btn-primary mt-3" href="members.php?action=add"><i
                class="fas fa-plus mr-1"></i><?php echo lang("manageMember_add"); ?></a>
    </div>
</section>