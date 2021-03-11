  <tr>
      <th scope="row"><?php echo $row['userID']; ?></th>
      <td colspan='1' class="text-capitalize"><?php echo $row['username']; ?></td>
      <td class="text-capitalize "><?php echo $row['email'] ?></td>
      <td class="text-capitalize "><?php echo $row['fullName']; ?></td>
      <td class="text-capitalize "><?php echo $row['Date']; ?></td>
      <td class="text-capitalize text-center">
          <a class="btn btn-success edit_delete_button text-capitalize"
              href="members.php?action=edit&userID=<?php echo $row['userID']; ?>"><i
                  class="fas fa-edit mr-1"></i><?php echo lang("manageMember_edit"); ?></a>
          <a class="delete__member btn btn-danger edit_delete_button text-capitalize" data-toggle="modal"
              data-customModal="<?php echo $row['userID']; ?>" data-modalName='<?php echo $row['username']; ?>'
              data-target="#manage_member_modal<?php echo $row['userID']; ?>"
              href="members.php?action=delete&userID=<?php echo $row['userID']; ?>"><i
                  class="fas fa-times mr-1"></i><?php echo lang('manageMember_delete'); ?></a>
          <?php if ($row['register_status'] == 0) { ?>
          <a class="btn btn-info edit_delete_button text-capitalize"
              href="members.php?action=activate&userID=<?php echo $row['userID']; ?>"><i
                  class="fas fa-check mr-1"></i><?php echo lang("manageMember_approve"); ?></a>
          <?php  } ?>
      </td>
  </tr>