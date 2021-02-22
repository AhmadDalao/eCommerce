<?php
// session is used to make sure the user can't access the page using different pages.
session_start();
$no_navbar = '';
$pageTitle = "Login";
// if session is registered direct user to dashboard page
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

include "init.php";

// check in login data is coming throw post method.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // save data from login form into variables.
    $username = $_POST["username"];
    $password = $_POST["password"];
    // protect the password by censoring it it.
    $hashedPassword = sha1($password);
    // check if user exist in database
    $stmt = $db_connect->prepare("SELECT username, password , groupID FROM users 
    WHERE 
    username = ? 
    AND 
    password = ? 
    AND groupID = 1 ");
    $stmt->execute(array($username, $hashedPassword));
    $_total_row = $stmt->rowCount();
    // if the total_row > 0 it means the user does exist in the database.
    if ($_total_row > 0) {
        // if there is an account in the database add it to the session.
        $_SESSION["username"] = $username;
        // redirect admin to the dashboard page
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Password or username are incorrect";
    }
}


?>

<!--
* ================================================================
* ================================================================
*
*                       login-section
*
* ================================================================
* ================================================================
-->

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

<?php
include $_template .  "footer.php";
?>