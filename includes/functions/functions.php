<?php

/*
* ================================================================
* ================================================================
*
*                         getRecordFrom function
*
*  this function uses the MYSQL query.
*  which is used to get latest items from any database table with flexible query
*
*  @param $field is the field you want to select like [username, userID .... description]
*  @param $table is the table you want to select the data from such as [users, categories .... items]
*  @param $where is the condition you want to add to the data during the selection such as [approve = 1 , status = 1 .... groupID = 1]
*  @param $orderingByField is the field you want to use to order your query such as [username, userID .... description]
*  @param $ordering the order method whether is is ASC or DESC
*
*
* ================================================================
* ================================================================
*/

function getRecordFrom($field,  $table,  $orderingByField, $where = null, $and = null, $ordering = "DESC")
{
    // SELECT comment FROM comments WHERE user_id = 62 ORDER BY comment_id DESC

    global $db_connect;
    $stmt = $db_connect->prepare("SELECT $field FROM $table $where $and ORDER BY  $orderingByField  $ordering");
    $stmt->execute();
    $rows = $stmt->fetchAll();
    return $rows;
}

/*
* ================================================================
* ================================================================
*
*                         getItems function
*
*  this function uses the MYSQL query.
*  which is used to get latest items from database
*  @param $where the condition to select
*  @param $value is the value of the where which is going to be executed
* ================================================================
* ================================================================
*/

function getItems($where, $value, $and = null)
{
    if ($and === null) {
        $and = '';
    }
    global $db_connect;
    $stmt = $db_connect->prepare("SELECT items.* , categories.name AS category_name 
    , categories.ID AS category_id ,
    categories.allow_ads ,
    categories.visibility,
    users.username ,
    users.groupID AS g_id
     FROM items 
     INNER JOIN categories ON categories.ID = items.cate_id  
     INNER JOIN users ON users.userID = items.user_id
     WHERE $where = ? $and  ORDER BY item_id DESC");
    $stmt->execute(array($value));
    $rows = $stmt->fetchAll();
    return $rows;
}

/*
* ================================================================
* ================================================================
*
*                         checkUserStatus function
*
*  this function uses the MYSQL query.
*  to check if the user is registered and activated or not
*  @param $user to check if the user exist in database or not.
*
* ================================================================
* ================================================================
*/

function checkUserStatus($user)
{
    global $db_connect;
    $stmt = $db_connect->prepare("SELECT username, register_status  FROM users  WHERE  username = ?   AND  register_status = 0 ");
    $stmt->execute(array($user));
    $total_row = $stmt->rowCount();
    return $total_row;
}


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

    $stmt = $db_connect->prepare("SELECT $selectItem FROM $tableName WHERE $selectItem = ? ");
    $stmt->execute(array($value));
    $total_row = $stmt->rowCount();

    return $total_row;
}
