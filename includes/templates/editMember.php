<section class="edit_section py-5">
    <div class="container">
        <h1 class="text-center header_color text-capitalize mb-5"><?php echo lang("edit_profile"); ?></h1>
        <form method="POST" action="?action=update"
            class="edit__form row flex-column align-items-center justify-content-center">
            <input type="text" name="edit_userID" value="<?php echo $userID ?>" hidden>
            <!-- Username -->
            <div class="form-group position-relative  col-12 col-md-9 col-lg-6 ">
                <label class=" text-capitalize"
                    for="exampleInputUsername"><?php echo lang("edit_username_profile"); ?></label>
                <input value="<?php echo $row['username']; ?>" type="text" class="form-control form-control-lg"
                    name="edit_username" id=" exampleInputUsername" autocomplete="off" required>
            </div>
            <!-- Password -->
            <div class="form-group col-12 col-md-9 col-lg-6">
                <label class=" text-capitalize "
                    for="exampleInputPassword"><?php echo lang("edit_password_profile"); ?></label>
                <input type="password" class="password form-control form-control-lg" id=" exampleInputPassword"
                    autocomplete="new-password" name="edit_new_password"
                    placeholder="<?php echo lang("edit_password_empty"); ?>">
                <input type="password" hidden name="edit_old_password" autocomplete="new-password"
                    value="<?php echo $row['password']; ?>">
                <span class="show__eye"><i class="fas fa-eye "></i></span>
            </div>
            <!-- email -->
            <div class="form-group position-relative  col-12 col-md-9 col-lg-6">
                <label class=" text-capitalize "
                    for="exampleInputEmail"><?php echo lang("edit_email_profile"); ?></label>
                <input value="<?php echo $row['email']; ?>" type="email" class="form-control form-control-lg"
                    name="edit_email" id="exampleInputEmail" autocomplete="off" required>
            </div>
            <!-- FullName -->
            <div class="form-group  position-relative col-12 col-md-9 col-lg-6">
                <label class=" text-capitalize "
                    for="exampleInputFullName"><?php echo lang("edit_fullName_profile"); ?></label>
                <input value="<?php echo $row['fullName']; ?>" type="text" class="form-control form-control-lg"
                    name="edit_fullName" id="exampleInputFullName" autocomplete="off" required>
            </div>
            <div class="form-group col-12 col-md-9 col-lg-6">
                <input type="submit" class="btn btn-primary btn-lg" value="<?php echo lang("edit_save_profile"); ?>">
            </div>
        </form>
    </div>
</section>