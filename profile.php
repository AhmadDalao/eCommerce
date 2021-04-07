<?php
ob_start();
session_start();
$pageTitle = "Profile";
include "init.php";

// if session is registered direct user to dashboard page
// if (isset($_SESSION['userFront'])) {
//     header("Location: index.php");
//     exit();
// }
echo "profile page";

include $template .  "footer.php";
ob_end_flush();