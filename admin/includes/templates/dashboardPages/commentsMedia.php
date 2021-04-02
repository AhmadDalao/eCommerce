    <div class="row">
        <span class="col-12 col-md-2 col-lg-3 mb-2 mb-md-0 ">
            <a class="font-weight-bold edit_delete_button text-capitalize dashboardComment_username"
                href="members.php?action=edit&userID=<?php echo $comment['userID']; ?>">
                <?php echo $comment['username'] ?>
            </a>
        </span>
        <div class="col-12 col-md-10 col-lg-9">
            <p><?php echo $comment['comment']; ?></p>
        </div>
    </div>