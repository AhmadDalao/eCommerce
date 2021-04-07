<?php

// display error messages for debugging

ini_set('display_errors', 'On');
error_reporting(E_ALL);

/*
* ================================================================
* ================================================================
*
* the included page below contains the code that connects to the database
*
* ================================================================
* ================================================================
*/


include "admin/config.php";

/*
* ================================================================
* ================================================================
*
*                              routes
*
* ================================================================
* ================================================================
*/

$userSession = '';
if (isset($_SESSION['userFront'])) {
    $userSession = $_SESSION['userFront'];
}


$template = 'includes/templates/';
$memberPages = 'includes/templates/membersPages/';
$func = "includes/functions/";
$css = "layout/css/";
$js = "layout/js/";
$lang = "includes/lang/";

/*
* ================================================================
* ================================================================
*
*                              includes
*
* ================================================================
* ================================================================
*/

// language include must be top always.
include $func . "functions.php";
include $lang . "eng.php";
include $template . "header.php";