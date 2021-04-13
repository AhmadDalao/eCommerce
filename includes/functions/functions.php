<?php


/*
* ================================================================
* ================================================================
*
*                         getAllFrom function
*
*  this function uses the MYSQL query.
*  which is used to get latest items from any database table
*
* ================================================================
* ================================================================
*/

function getAllFrom($tableName)
{
    global $db_connect;
    $stmt = $db_connect->prepare("SELECT * FROM $tableName");
    $stmt->execute();
    $rows = $stmt->fetchAll();
    return $rows;
}
/*
* ================================================================
* ================================================================
*
*                         getCategories function
*
*  this function uses the MYSQL query.
*  which is used to get latest categories from database
*
* ================================================================
* ================================================================
*/

function getCategories()
{
    global $db_connect;
    $stmt = $db_connect->prepare("SELECT * FROM categories  ORDER BY ID ASC");
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
    $stmt = $db_connect->prepare("SELECT items.* , categories.name AS category_name , categories.ID AS category_id FROM items INNER JOIN categories ON categories.ID = items.cate_id  WHERE $where = ? $and  ORDER BY item_id DESC");
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


/*
* ================================================================
* ================================================================
*
*                         countItemsIN_DB function
*
*  this function uses the MYSQL query.
*  which is used to to check if the item does exist in the database or not. And return the count of it.
*  @param $itemToCount the table you want to count [ select Count(userID || username || items)] and so on
*  @param $tableName table to select from. [from users , item , category]
*
* ================================================================
* ================================================================
*/

function countItemsIN_DB($itemToCount, $tableName)
{
    global $db_connect;
    $stmt = $db_connect->prepare("SELECT COUNT($itemToCount) FROM $tableName");
    $stmt->execute();
    return $stmt->fetchColumn();  // find the numbers of column
}


/*
* ================================================================
* ================================================================
*
*                         getLatestRecord function
*
*  this function uses the MYSQL query.
*  which is used to get latest items from database [users , items ,comments].
*  @param $select_item item to select from the database
*  @param $table  the table to select the item from
*  @param $order  the ORDER for the selected items
*  @param $limiter number of items you want to get.
*  @param $whereCondition is the condition you use such as [Where groupID != 0]
*
* ================================================================
* ================================================================
*/

function getLatestRecord($select_item, $table, $order, $limiter = 5, $whereCondition = Null)
{
    global $db_connect;
    if ($whereCondition == Null) {
        $stmt = $db_connect->prepare("SELECT $select_item FROM $table  ORDER BY $order DESC LIMIT $limiter");
    } else {
        $stmt = $db_connect->prepare("SELECT $select_item FROM $table WHERE $whereCondition ORDER BY $order DESC LIMIT $limiter");
    }
    $stmt->execute();
    $rows = $stmt->fetchAll();
    return $rows;
}


/*
* ================================================================
* ================================================================
*
*                         orderBy order items based on query
*
*  this function uses the MYSQL query.
*  which is used to make a query to order and order it according to the user request.
*  @param $selectItem is the you want to select [ select username , itemName , category]
*  @param $tableName table to select from. [from users , item , category]
*  @param $ordering [WHERE ordering = username, groupID ....]
*  @param $sort [WHERE sort = ASC , DESC]
*
* ================================================================
* ================================================================
*/

function orderBy($selectItem, $tableName, $ordering, $sort)
{
    global $db_connect;
    $stmt = $db_connect->prepare("SELECT $selectItem FROM $tableName ORDER BY $ordering $sort");
    $stmt->execute();
    $categories = $stmt->fetchAll();
    return $categories;
}