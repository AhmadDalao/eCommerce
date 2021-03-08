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
*  @param $formError and it will print the  $formError given to it after validation
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


/*
* ================================================================
* ================================================================
*
*                         redirectHome function
*
*   this function uses an error message and seconds
*   which is used to print the message and redirect user after x amount of seconds
*  @param $errorMsg is the message to be printed
*  @param $seconds is the amount of time the user have to wait before redirection.
*
* ================================================================
* ================================================================
*/

function redirectHome($errorMsg, $pageName = null, $seconds = 3,)
{
    if ($pageName === null) {
        $pageName = "index.php";
        $link = "Home page";
    } elseif ($pageName === "back") {
        if (isset($_SERVER['HTTP_REFERER'])  && $_SERVER['HTTP_REFERER'] !== '') {
            $pageName =   $_SERVER['HTTP_REFERER'];
            $link = "previous page";
        } else {
            $pageName = "index.php";
            $link = "Home page";
        }
    } else {
        $pageName = $pageName;
        $link = "Home page";
    }
    echo "<div class='container py-5'>";
    echo  $errorMsg;
    echo "<div class='alert alert-info'>You Will Be Redirected to $link After $seconds Seconds.</div>";
    echo '</div>';
    header("refresh:$seconds;url=$pageName");
    exit();
}


/*
* ================================================================
* ================================================================
*
*                         checkItem in database function
*
*  this function uses the MYSQL query.
*  which is used to to check if the item does exist in the database or not. It it does show error otherwise keep working.
*  @param $selectItem is the you want to select [ select username , itemName , category]
*  @param $tableName table to select from. [from users , item , category]
*  @param $value [WHERE value = username, groupID ....]
*
* ================================================================
* ================================================================
*/

function checkItem($selectItem, $tableName, $value)
{
    global $db_connect;

    $functionStmt = $db_connect->prepare("SELECT $selectItem FROM $tableName WHERE $selectItem = ? ");
    $functionStmt->execute(array($value));
    $total_row = $functionStmt->rowCount();

    return $total_row;
}