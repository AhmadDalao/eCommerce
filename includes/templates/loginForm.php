<div class="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 ">
                <div class="form__holder vh-100 w-100 d-flex flex-column justify-content-center align-items-center">
                    <h1 class="text-capitalize text-center mb-4"><?php echo lang("admin_login") ?></h1>
                    <form class="login__form w-100" action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
                        <div class="form-group">
                            <input type="text" autocomplete="off" placeholder="username" name="username"
                                class="form-control" id="username">
                        </div>
                        <div class="form-group">
                            <input type="password" autocomplete="current-password" placeholder="password"
                                name="password" class="form-control" id="password">
                        </div>
                        <input type="submit" class="btn btn-primary btn-block" value="Login">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>