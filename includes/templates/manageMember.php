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
        <a class="add__member btn btn-lg btn-primary mt-3" href="members.php?action=add"><i
                class="fas fa-plus mr-1"></i><?php echo lang("manageMember_add"); ?></a>
    </div>
</section>