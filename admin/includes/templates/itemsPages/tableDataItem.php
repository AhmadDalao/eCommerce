  <tr>
      <th scope="row"><?php echo $row['item_id']; ?></th>
      <td colspan='1' class="text-capitalize"><?php echo $row['name']; ?></td>
      <td class="text-capitalize ">
          <p class="m-0 p-0"><?php echo $row['description'] ?></p>
      </td>
      <td class="text-capitalize "><?php echo $row['price']; ?>$</td>
      <td class="text-capitalize "><?php echo $row['add_date']; ?></td>
      <td class="text-capitalize "><?php echo $row['category_name']; ?></td>
      <td class="text-capitalize "><?php echo $row['username']; ?></td>
      <td class="text-capitalize "><?php echo $row['made_in']; ?></td>
      <td class="text-capitalize text-center">
          <a class="btn btn-success edit_delete_button text-capitalize"
              href="items.php?action=edit&item_id=<?php echo $row['item_id']; ?>"><i
                  class="fas fa-edit mr-1"></i><?php echo lang("manageMember_edit"); ?></a>
          <a class="delete__item btn btn-danger edit_delete_button text-capitalize" data-toggle="modal"
              data-delete_id="<?php echo $row['item_id']; ?>" data-delete_name='<?php echo $row['name']; ?>'
              data-target="#<?php echo $row['name'];
                                                                                                                                                                                                                        echo $row['item_id']; ?>"
              href="items.php?action=delete&item_id=<?php echo $row['item_id']; ?>"><i
                  class="fas fa-times mr-1"></i><?php echo lang('manageMember_delete'); ?></a>
          <?php if ($row['approve'] == 0) { ?>
          <a class="btn btn-info edit_delete_button text-capitalize"
              href="items.php?action=approve&item_id=<?php echo $row['item_id']; ?>"><i
                  class="fas fa-check mr-1"></i><?php echo lang("manageMember_approve"); ?></a>
          <?php  } ?>
      </td>
  </tr>