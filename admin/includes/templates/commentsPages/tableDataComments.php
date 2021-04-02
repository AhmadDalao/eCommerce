  <tr>
      <th scope="row"><?php echo $row['comment_id']; ?></th>
      <td colspan='1' class="text-capitalize"><?php echo $row['comment']; ?></td>
      <td class="text-capitalize "><?php echo $row['item_name'] ?></td>
      <td class="text-capitalize "><?php echo $row['username']; ?></td>
      <td class="text-capitalize "><?php echo $row['comment_date']; ?></td>
      <td class="text-capitalize text-center">
          <a class="btn btn-success edit_delete_button text-capitalize"
              href="comments.php?action=edit&comment_id=<?php echo $row['comment_id']; ?>"><i
                  class="fas fa-edit mr-1"></i><?php echo lang("manageMember_edit"); ?></a>
          <a class="delete__item btn btn-danger edit_delete_button text-capitalize" data-toggle="modal"
              data-delete_id="<?php echo $row['comment_id']; ?>" data-delete_name='<?php echo $row['username']; ?>'
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