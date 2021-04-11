    <div class="row">
        <span class="col-12 mb-2 ">
            <a class="font-weight-bold edit_delete_button text-capitalize dashboardComment_username"
                href="members.php?action=edit&userID=<?php echo $comment['userID']; ?>">
                <?php echo $comment['username'] ?>
            </a>
        </span>
        <div class="col-12">
            <p><?php echo $comment['comment']; ?></p>
        </div>
    </div>