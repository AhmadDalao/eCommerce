<section class="category_add_section py-5">
    <div class="container">
        <h1 class="text-center header_color text-capitalize mb-5"><?php echo lang("edit_itemTitle"); ?></h1>
        <form method="POST" action="?action=update"
            class="edit__form row flex-column align-items-center justify-content-center">
            <input type="text" name="item_id" value="<?php echo $item_id ?>" hidden>

            <!-- itemName -->
            <div class="form-group position-relative  col-12 col-md-9 col-lg-6 ">
                <label class=" text-capitalize" for="itemName"><?php echo lang("itemName"); ?></label>
                <input type="text" class="form-control form-control-lg" name="name" id="itemName"
                    value="<?php echo $row['name'] ?>" required>
            </div>

            <!-- description -->
            <div class="form-group col-12 col-md-9 col-lg-6">
                <label class=" text-capitalize " for="description"><?php echo lang("itemDescription"); ?></label>
                <input type="text" class="password form-control form-control-lg" id="description" name="description"
                    value="<?php echo $row['description'] ?>" required>
            </div>

            <!-- price  -->
            <div class="form-group col-12 col-md-9 col-lg-6">
                <label class=" text-capitalize " for="price"><?php echo lang("itemPrice"); ?></label>
                <input type="text" class="password form-control form-control-lg" id="price" name="price"
                    value="<?php echo $row['price'] ?>" required>
            </div>

            <!-- country of origin( made in)  -->
            <div class="form-group col-12 col-md-9 col-lg-6">
                <label class=" text-capitalize " for="made_in"><?php echo lang("itemMadeIn"); ?></label>
                <input type="text" class="password form-control form-control-lg" id="made_in" name="made_in"
                    value="<?php echo $row['made_in'] ?>" required>
            </div>

            <!-- item status -->
            <div class="form-group col-12 col-md-9 col-lg-6">
                <label class="text-capitalize" for="status"><?php echo lang("itemStatus"); ?></label>
                <select class="form-control" name="status">
                    <option class="text-capitalize" value="1" <?php if ($row['status'] == 1) {
                                                                    echo "selected";
                                                                } ?>> <?php echo lang("itemNew") ?> </option>
                    <option class="text-capitalize" value="2" <?php if ($row['status'] == 2) {
                                                                    echo "selected";
                                                                } ?>> <?php echo lang("itemLikeNew") ?> </option>
                    <option class="text-capitalize" value="3" <?php if ($row['status'] == 3) {
                                                                    echo "selected";
                                                                } ?>> <?php echo lang("itemSecondHand") ?> </option>
                    <option class="text-capitalize" value="4" <?php if ($row['status'] == 4) {
                                                                    echo "selected";
                                                                } ?>> <?php echo lang("itemOld") ?> </option>
                </select>
            </div>

            <!-- member who added the item -->
            <div class="form-group col-12 col-md-9 col-lg-6">
                <label class="text-capitalize" for="user_id"><?php echo lang("itemMember"); ?></label>
                <select class="form-control" name="user_id">
                    <?php
                    $stmt = $db_connect->prepare('SELECT * FROM users ');
                    $stmt->execute();
                    $users = $stmt->fetchAll();
                    foreach ($users as $user) {
                        echo "<option value='" .  $user['userID'] . "'";
                        if ($row['user_id'] == $user['userID']) {
                            echo "selected";
                        }
                        echo ">" .  $user['username']  . "</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- add item to category -->
            <div class="form-group col-12 col-md-9 col-lg-6">
                <label class="text-capitalize" for="cate_id"><?php echo lang("itemCategory"); ?></label>
                <select class="form-control" name="cate_id">
                    <?php
                    $stmt = $db_connect->prepare('SELECT * FROM categories ');
                    $stmt->execute();
                    $categories = $stmt->fetchAll();
                    foreach ($categories as $category) {
                        echo "<option value='" .  $category['ID'] . "'";
                        if ($row['cate_id'] == $category['ID']) {
                            echo "selected";
                        }
                        echo ">" .  $category['name']  . "</option>";
                    }
                    ?>
                </select>
            </div>


            <div class="form-group col-12 col-md-9 col-lg-6">
                <input type="submit" class="btn btn-primary btn-lg text-capitalize"
                    value="<?php echo lang("save_item"); ?>">
            </div>

            <?php
            // select all comments.
            $stmt = $db_connect->prepare("SELECT comments.* ,
                                        users.userID as userID,
                                        users.username As username
                                    FROM comments
                                    INNER JOIN users ON users.userID = comments.user_id
                                    WHERE item_id = ? ORDER BY comment_id DESC");
            // execute the SQL above
            $stmt->execute(array($item_id));
            // assign result from the SQL statement into a variable.
            $rows = $stmt->fetchAll();
            // loop over the $row and print all of it's data
            if (!empty($rows)) {
            ?>
            <h1 class='text-center header_color text-capitalize my-5'>
                Manage [ <?php echo $row['name'] ?> ] comments
            </h1>
            <div class="table-responsive ">
                <table class="manage__table table table-bordered table-striped table-dark table-hover">
                    <thead>
                        <tr>
                            <th class="text-capitalize" scope="col"><?php echo lang("comment_text"); ?></th>
                            <th class="text-capitalize" scope="col"><?php echo lang("comment_userName"); ?></th>
                            <th class="text-capitalize" scope="col"><?php echo lang("comment_date"); ?></th>
                            <th class="text-capitalize" scope="col"><?php echo lang("comment_control"); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $row) { ?>
                        <tr>
                            <td colspan='1' class="text-capitalize"><?php echo $row['comment']; ?></td>
                            <td class="text-capitalize "><?php echo $row['username']; ?></td>
                            <td class="text-capitalize "><?php echo $row['comment_date']; ?></td>
                            <td class="text-capitalize text-center">
                                <a class="btn btn-success edit_delete_button text-capitalize"
                                    href="comments.php?action=edit&comment_id=<?php echo $row['comment_id']; ?>"><i
                                        class="fas fa-edit mr-1"></i><?php echo lang("manageMember_edit"); ?></a>
                                <a class="delete__item btn btn-danger edit_delete_button text-capitalize"
                                    data-toggle="modal" data-delete_id="<?php echo $row['comment_id']; ?>"
                                    data-delete_name='<?php echo $row['username']; ?>'
                                    data-target="#<?php echo $row['username'];
                                                                                                                                                                                                                                                            echo $row['comment_id']; ?>"
                                    href="comments.php?action=delete&comment_id=<?php echo $row['comment_id']; ?>"><i
                                        class="fas fa-times mr-1"></i><?php echo lang('manageMember_delete'); ?></a>
                                <?php if ($row['status'] == 0) { ?>
                                <a class="btn btn-info edit_delete_button text-capitalize"
                                    href="comments.php?action=approve&comment_id=<?php echo $row['comment_id']; ?>"><i
                                        class="fas fa-check mr-1"></i><?php echo lang("manageMember_approve"); ?></a>
                                <?php  } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- Modal -->
            <div class="modal fade manageComments" data-targetedModal='manageComments' id="#manageComments"
                tabindex="-1" aria-hidden="true">
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
                            <p><?php echo lang("manageComment_modalAccount"); ?> <span
                                    class="ml-1 manage_modal_ID"></span>
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
            <?php } ?>
        </form>
    </div>
</section>