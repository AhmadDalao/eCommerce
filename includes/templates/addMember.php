<section class="edit_section py-5">
    <div class="container">
        <h1 class="text-center header_color text-capitalize mb-5"><?php echo lang("add_profile"); ?></h1>
        <form method="POST" action="?action=insert"
            class="edit__form row flex-column align-items-center justify-content-center">
            <!-- Username -->
            <div class="form-group position-relative  col-12 col-md-9 col-lg-6 ">
                <label class=" text-capitalize"
                    for="exampleInputUsername"><?php echo lang("edit_username_profile"); ?></label>
                <input type="text" class="form-control form-control-lg" name="add_username" id=" exampleInputUsername"
                    autocomplete="off" required>
            </div>
            <!-- Password -->
            <div class="form-group col-12 col-md-9 col-lg-6">
                <label class=" text-capitalize "
                    for="exampleInputPassword"><?php echo lang("edit_password_profile"); ?></label>
                <input type="password" class="password form-control form-control-lg" id="exampleInputPassword"
                    autocomplete="new-password" name="add_password" required>
                <span class="show__eye"><i class="fas fa-eye "></i></span>
            </div>
            <!-- email -->
            <div class="form-group position-relative  col-12 col-md-9 col-lg-6">
                <label class=" text-capitalize "
                    for="exampleInputEmail"><?php echo lang("edit_email_profile"); ?></label>
                <input type="email" class="form-control form-control-lg" name="add_email" id="exampleInputEmail"
                    autocomplete="off" required>
            </div>
            <!-- FullName -->
            <div class="form-group  position-relative col-12 col-md-9 col-lg-6">
                <label class=" text-capitalize "
                    for="exampleInputFullName"><?php echo lang("edit_fullName_profile"); ?></label>
                <input type="text" class="form-control form-control-lg" name="add_fullName" id="exampleInputFullName"
                    autocomplete="off" required>
            </div>
            <div class="form-group col-12 col-md-9 col-lg-6">
                <input type="submit" class="btn btn-primary btn-lg text-capitalize"
                    value="<?php echo lang("add_member"); ?>">
            </div>
        </form>
    </div>
</section>