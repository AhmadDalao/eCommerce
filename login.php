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
    if (isset($_POST['login'])) {
        // save data from login form into variables.
        $username = $_POST["username"];
        $password = $_POST["password"];
        // protect the password by censoring it it.
        $hashedPassword = sha1($password);
        // check if user exist in database
        $stmt = $db_connect->prepare("SELECT username, password  FROM users  WHERE  username = ?   AND  password = ?  LIMIT 1 ");

        $stmt->execute(array($username, $hashedPassword));
        $total_row = $stmt->rowCount();
        if ($total_row > 0) {
            $_SESSION["userFront"] = $username;
            header("Location: index.php");
            exit();
        } else {
            echo "<div class='alter alert-danger py-3'><div class='container'><div>Password or username are incorrect" . "<br /></div></div></div>";
        }
    } else {
    }
} ?>

<section class="login-section">
    <div class="container">
        <div class="nav nav-pills justify-content-center" id="nav-tab" role="tablist">
            <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                aria-controls="nav-home" aria-selected="true">Login</a>
            <a class="nav-link sign-up" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                aria-controls="nav-profile" aria-selected="false">Signup</a>
        </div>
        <div class="tab-content" id="nav-tabContent">

            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6 ">
                        <form class="login mt-5" action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
                            <div class="form-group position-relative">
                                <input class="form-control form-control-lg text-capitalize" type="text"
                                    autocomplete="off" name="username" placeholder="username">
                            </div>
                            <div class="form-group position-relative ">
                                <input class="form-control form-control-lg text-capitalize password" type="password"
                                    autocomplete="off" name="password" placeholder="password">
                                <span class="show__eye"><i class="fas fa-eye "></i></span>
                            </div>
                            <input class="btn btn-lg btn-primary text-capitalize" name="login" type="submit"
                                value="login">
                        </form>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6 ">
                        <form class="login mt-5" action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
                            <div class="form-group position-relative">
                                <input class="form-control form-control-lg text-capitalize" required type="text"
                                    autocomplete="off" name="username" placeholder="username">
                            </div>
                            <div class="form-group position-relative ">
                                <input class="form-control form-control-lg text-capitalize password" required
                                    type="password" autocomplete="off" name="password" placeholder="password">
                                <span class="show__eye"><i class="fas fa-eye "></i></span>
                            </div>
                            <div class="form-group position-relative ">
                                <input class="form-control form-control-lg text-capitalize password" required
                                    type="password" autocomplete="off" name="confirm__password"
                                    placeholder="confirm password">
                                <span class="show__eye"><i class="fas fa-eye "></i></span>
                            </div>
                            <div class="form-group position-relative">
                                <input class="form-control form-control-lg text-capitalize" type="email" required
                                    autocomplete="off" name="email" placeholder="email">
                            </div>
                            <input class="btn btn-lg btn-success text-capitalize" name="signup" type="submit"
                                value="signup">
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="row justify-content-center">
            <div class="errorHolder mt-4 text-center col-12 col-md-8 col-lg-6 ">
                <p class="alert alert-dark">alert alert-dark</p>
            </div>
        </div>
    </div>
</section>
<script src="<?php echo $js; ?>showEye.js"></script>

<?php
include $template .  "footer.php";
ob_end_flush();
?>