<?php
// session is used to make sure the user can't access the page using different pages.
ob_start();
session_start();
$pageTitle = "Login";
// if session is registered direct user to dashboard page
if (isset($_SESSION['userFront'])) {
    header("Location: index.php");
    exit();
}
include "init.php";

// check in login data is coming throw post method.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // check if user clicked on login or submit button
    if (isset($_POST['signupSeller'])) {
        $formErrors = array();

        $username     = $_POST['username'];
        $password     = $_POST['password'];
        $confirm__password     = $_POST['confirm__password'];
        $email         = $_POST['email'];

        // filter the data and validate the data
        if (isset($username)) {

            if (strlen($username) > 15) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = lang("update_username_greater");
            }

            $filteredUsername = filter_var($username, FILTER_SANITIZE_STRING);

            if (empty($filteredUsername)) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = lang("update_username_empty");
            }

            if (strlen($filteredUsername) < 4) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = lang("update_username_less");
            }
        }

        if (isset($password) && isset($confirm__password)) {

            if (empty($password)) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = lang("insert_password_empty");
            }

            if (sha1($password) !== sha1($confirm__password)) {
                $formErrors[] = lang("passwords_no_match");
            }
        }

        // filter the data and validate the data
        if (isset($email)) {
            $filteredEmail = filter_var($email, FILTER_SANITIZE_EMAIL);

            if (empty($filteredEmail)) {
                // adding form error to array so I can show it later to user.
                $formErrors[] = lang("update_email_empty");
            }

            if (filter_var($filteredEmail, FILTER_VALIDATE_EMAIL) != true) {
                $formErrors[] = lang("email_not_valid");
            }
        }

        if (empty($formErrors)) {
            $successMessage = '';
            // check if username exist in the database before running the insert query.
            $checkResult = checkItem("username", "users", $username);
            if ($checkResult == 1) {
                $formErrors[] =  "<div class='mb-4 alert alert-danger'><div class='container'><div>Sorry!, username is already in use</div></div></div>";
            } else {
                // insert the data base with the data I receive from the form in add page.
                $stmt = $db_connect->prepare('INSERT INTO users (username ,password ,email , groupID ,register_status ,Date) VALUES (:username, :password ,:email , 2 , 0, now())');
                $stmt->execute(array(
                    "username" => $username,
                    "password" => sha1($password),
                    "email" => $email
                ));
                // print this message if there was a change in the record
                $successMessage = "<div class='mb-4 alert alert-success'><div class='container'><div>Account Created</div></div></div>";
            }
        }
    }
} ?>

<section class="login-section">
    <div class="container">
        <div class="nav nav-pills justify-content-center" id="nav-tab" role="tablist">
            <a class="nav-link sign-up sign-up-seller text-capitalize active" id="nav-profile-tab" data-toggle="tab"
                href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Seller Signup</a>
        </div>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6 ">
                        <form class="login mt-5" action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
                            <div class="form-group star-fix position-relative">
                                <input class="form-control form-control-lg " required type="text"
                                    title="Username must be at least 4 character" pattern=".{4,}" autocomplete="off"
                                    name="username" placeholder="Username">
                            </div>
                            <div class="form-group star-fix position-relative ">
                                <input minlength="4" class="form-control form-control-lg  password" required
                                    type="password" autocomplete="off" name="password" placeholder="Password">
                                <span class="show__eye"><i class="fas fa-eye "></i></span>
                            </div>
                            <div class="form-group star-fix position-relative ">
                                <input minlength="4" class="form-control form-control-lg  password" required
                                    type="password" autocomplete="off" name="confirm__password"
                                    placeholder="Confirm Password">
                                <span class="show__eye"><i class="fas fa-eye "></i></span>
                            </div>
                            <div class="form-group star-fix position-relative">
                                <input class="form-control form-control-lg" type="email" required autocomplete="off"
                                    name="email" placeholder="Email">
                            </div>
                            <input class="btn btn-block btn-lg btn-success text-capitalize" name="signupSeller"
                                type="submit" value="signup">
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <?php if (!empty($formErrors)) { ?>
        <div class="row justify-content-center">
            <div class="errorHolder mt-4 text-center col-12 col-md-8 col-lg-6 ">
                <?php formErrorsPrint($formErrors); ?>
            </div>
        </div>
        <?php } ?>

        <?php if (!empty($successMessage)) { ?>
        <div class="row justify-content-center">
            <div class="errorHolder mt-4 text-center col-12 col-md-8 col-lg-6 ">
                <?php echo $successMessage; ?>
            </div>
        </div>
        <?php } ?>


    </div>
</section>
<script src="<?php echo $js; ?>showEye.js"></script>

<?php
include $template .  "footer.php";
ob_end_flush();
?>