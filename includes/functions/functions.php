<?php


/*
* ================================================================
* ================================================================
*
*                              title function
*
*   this function uses global variable $pageTitle
*   which is used to set the page title name in the top of each page
*   this function is called in the header <title>getTitle()</title>
*   and it will print the name given to the $pageTitle 
*   in case the variable wasn't provided it will print eCommerce.
*
* ================================================================
* ================================================================
*/
function getTitle()
{
    global $pageTitle;
    if (isset($pageTitle)) {
        echo $pageTitle;
    } else {
        echo "eCommerce";
    }
}