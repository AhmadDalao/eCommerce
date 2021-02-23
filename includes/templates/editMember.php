<section class="edit_section py-5">
    <div class="container">
        <h1 class="text-center header_color text-capitalize mb-5"><?php echo lang("Edit_profile"); ?></h1>
        <form method="POST" action="?action=update" class="row flex-column align-items-center justify-content-center">
            <input type="text" name="userID" value="<?php echo $userID ?>" hidden>
            <!-- Username -->
            <div class="form-group  col-12 col-md-9 col-lg-6 no-gutters">
                <label class=" text-capitalize col-form-labe"
                    for="exampleInputUsername"><?php echo lang("username_profile"); ?></label>
                <input value="<?php echo $row['username']; ?>" type="text" class="form-control form-control-lg"
                    name="username" id=" exampleInputUsername" autocomplete="off">
            </div>
            <!-- Password -->
            <div class="form-group  col-12 col-md-9 col-lg-6">
                <label class=" text-capitalize col-form-labe"
                    for="exampleInputPassword"><?php echo lang("password_profile"); ?></label>
                <input type="password" class="form-control form-control-lg" id=" exampleInputPassword"
                    autocomplete="new-password">
            </div>
            <!-- email -->
            <div class="form-group  col-12 col-md-9 col-lg-6">
                <label class=" text-capitalize col-form-labe"
                    for="exampleInputEmail"><?php echo lang("email_profile"); ?></label>
                <input value="<?php echo $row['email']; ?>" type="email" class="form-control form-control-lg"
                    name="email" id="exampleInputEmail" autocomplete="off">
            </div>
            <!-- FullName -->
            <div class="form-group  col-12 col-md-9 col-lg-6">
                <label class=" text-capitalize col-form-labe"
                    for="exampleInputFullName"><?php echo lang("fullName_profile"); ?></label>
                <input value="<?php echo $row['fullName']; ?>" type="text" class="form-control form-control-lg"
                    name="fullName" id="exampleInputFullName" autocomplete="off">
            </div>
            <div class="form-group col-12 col-md-9 col-lg-6">
                <input type="submit" class="btn btn-primary btn-lg" value="<?php echo lang("save_profile"); ?>">
            </div>
        </form>
    </div>
</section>