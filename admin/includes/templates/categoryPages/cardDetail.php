<div class="card__holder col-12 col-xl-6 mb-3">
    <div class="card">
        <div class="card-header position-relative">
            <span> <?php echo $category['name']; ?> Category</span>
            <span class="float-right px-3 card_dots"><i class="fas fa-ellipsis-h"></i></span>
        </div>
        <div class=" card-body position-relative overflow-hidden">
            <div class="card_button--holder position-absolute ">
                <a class="btn btn-success edit_delete_button text-capitalize"
                    href="members.php?action=edit&userID=<?php echo $row['userID']; ?>"><i
                        class="fas fa-edit mr-1"></i><?php echo lang("manageMember_edit"); ?></a>
                <a class="delete__member btn btn-danger edit_delete_button text-capitalize"
                    href="members.php?action=delete&userID=<?php echo $row['userID']; ?>"><i
                        class="fas fa-times mr-1"></i><?php echo lang('manageMember_delete'); ?></a>
            </div>
            <h5 class="card-title"><?php echo $category['name']; ?></h5>
            <h6 class="card-subtitle mb-3 text-muted">
                <?php if ($category['description'] == '') {
                    echo "information not provided";
                } else {
                    echo   $category['description'];
                } ?></h6>

            <div class="my-3 py-2 pl-0 card__info" style="<?php
                                                            if ($category['visibility'] == 0 && $category['allow_comment'] == 0 && $category['allow_ads'] == 0) {
                                                                echo 'display: none;';
                                                            } ?>">
                <?php
                if ($category['visibility'] == 1) {
                    echo '<span class="visibility p-2 m-1 rounded text-capitalize"><i class="fas fa-eye-slash mr-1 ml-0"></i>Hidden</span>';
                }
                if ($category['allow_comment'] == 1) {
                    echo '<span class="allow_comment p-2 m-1 rounded text-capitalize"><i class="fas fa-comment-slash mr-1 ml-0"></i>Comments Disabled</span>';
                }
                if ($category['allow_ads'] == 1) {
                    echo '<span class="allow_ads p-2 m-1 ml-0 rounded text-capitalize p-2 m-1"><i class="fas fa-ad mr-1"></i>Ads Disabled</span>';
                }
                ?>
            </div>
            <!-- <div class="category__linkHolder mt-4">
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div> -->
        </div>
    </div>
</div>