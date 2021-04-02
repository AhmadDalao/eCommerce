    <?php if ($comment['status'] == 0) { ?>
    <a class="btn btn-info edit_delete_button text-capitalize float-right "
        href="comments.php?action=approve&comment_id=<?php echo $comment['comment_id']; ?>"><i
            class="fas fa-check mr-1"></i><?php echo lang("manageMember_approve"); ?></a>
    <?php  } ?>
    <a class="delete__member btn btn-danger edit_delete_button text-capitalize float-right mr-1"
        href="comments.php?action=delete&comment_id=<?php echo $comment['comment_id']; ?>"><i
            class="fas fa-times mr-1"></i><?php echo lang('manageMember_delete'); ?></a>
    <a class="btn btn-success edit_delete_button text-capitalize float-right mr-1"
        href="comments.php?action=edit&comment_id=<?php echo $comment['comment_id']; ?>"><i
            class="fas fa-edit mr-1"></i><?php echo lang("manageMember_edit"); ?></a>