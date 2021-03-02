  <tr>
      <th scope="row"><?php echo $row['userID']; ?></th>
      <td colspan='1' class="text-capitalize"><?php echo $row['username']; ?></td>
      <td class="text-capitalize "><?php echo $row['email'] ?></td>
      <td class="text-capitalize "><?php echo $row['fullName']; ?></td>
      <td class="text-capitalize ">registeredDate</td>
      <td class="text-capitalize text-center">
          <a class="btn btn-success edit_delete_button text-capitalize"
              href="members.php?action=edit&userID=<?php echo $row['userID']; ?>">Edit</a>
          <!-- <a class="btn btn-danger edit_delete_button" data-toggle="modal" data-target="#exampleModal">Delete</a> -->
          <a class="btn btn-danger edit_delete_button text-capitalize" data-toggle="modal"
              data-target="#model<?php echo $row['userID']; ?>"
              href="members.php?action=delete&userID=<?php echo $row['userID']; ?>">Delete</a>
      </td>
  </tr>

  <!-- Modal -->
  <div class="modal fade" id="model<?php echo $row['userID']; ?>" tabindex="-1"
      aria-labelledby="exampleModalLabel<?php echo $row['userID']; ?>" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel<?php echo $row['userID']; ?>">Delete Account</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <p>Are you sure you want to delete this account:<span class="ml-1">
                          <?php echo $row['username']; ?></span>
                  </p>
                  <p>account ID:<span class="ml-1"><?php echo $row['userID']; ?></span></p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-danger">Delete</button>
              </div>
          </div>
      </div>
  </div>
  <!-- Modal -->