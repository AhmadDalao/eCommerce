<?php

/*
* ================================================================
* ================================================================
*
* the included page below contains the code that connects to the database
*
* ================================================================
* ================================================================
*/


include "config.php";

/*
* ================================================================
* ================================================================
*
*                              routes
*
* ================================================================
* ================================================================
*/

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
// check if page doesn't have the variable no_navbar include navbar
if (!isset($no_navbar)) {
    include $template . "navbar.php";
}