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

/*
* ================================================================
* ================================================================
*
*                         formErrorsPrint function
*
*   this function uses an array $formErrors sent from 
*   which is used to print the error name after the form validation
*   this function is called in the updateMember.php
*   and it will print the  $formError given to it after validation
*   this function will work only in case of failure in the validation process 
*
* ================================================================
* ================================================================
*/

function formErrorsPrint($formErrors)
{
    foreach ($formErrors as $key) {
        // print the error message
        echo '<p class="text-left text-danger h4 py-2 text-capitalize alert alert-danger"><i class="fas fa-times-circle mr-2"></i>' . $key . '</p>';
    }
}