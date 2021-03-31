   <!-- <?php if ($user['register_status'] == 0) { ?>
   <a class="btn btn-info edit_delete_button text-capitalize float-right "
       href="members.php?action=activate&userID=<?php echo $user['userID']; ?>"><i
           class="fas fa-check mr-1"></i><?php echo lang("manageMember_approve"); ?></a>
   <?php  } ?> -->
   <a class="delete__member btn btn-danger edit_delete_button text-capitalize float-right mr-1"
       href="items.php?action=delete&item_id=<?php echo $item['item_id']; ?>"><i
           class="fas fa-times mr-1"></i><?php echo lang('manageMember_delete'); ?></a>
   <a class="btn btn-success edit_delete_button text-capitalize float-right mr-1"
       href="items.php?action=edit&item_id=<?php echo $item['item_id']; ?>"><i
           class="fas fa-edit mr-1"></i><?php echo lang("manageMember_edit"); ?></a>