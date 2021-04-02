<?php

/*
* ================================================================
* ================================================================
*
*                      Manage comments Page
*
*            You can  Edit | Delete | approve  comments from here
*
* ================================================================
* ================================================================
*/

ob_start();
// session is used to make sure the user can't access the page using different pages.
session_start();
$pageTitle = "Comments";
// if session is registered direct user to dashboard page
if (isset($_SESSION['username'])) {

    include "init.php";

    $action = isset($_GET['action']) ? $_GET['action'] : "manage";

    if ($action == "manage") {

        // select all comments.
        $stmt = $db_connect->prepare("SELECT comments.* ,
                                        items.name AS item_name , 
                                        users.username As username
                                    FROM comments
                                    INNER JOIN items ON items.item_id = comments.item_id
                                    INNER JOIN users ON users.userID = comments.user_id;");
        // execute the SQL above
        $stmt->execute();
        // assign result from the SQL statement into a variable.
        $rows = $stmt->fetchAll();
        // loop over the $row and print all of it's data
        include $commentsPages . "manageComments.php";
    } elseif ($action == "edit") {
        // edit page section

        // check if userID is numeric & return the integer value of it
        $comment_id = isset($_GET['comment_id']) && is_numeric($_GET['comment_id']) ?  intval($_GET['comment_id']) :  0;
        // select data from database based on the userID I got from $_GET.
        $stmt = $db_connect->prepare("SELECT * FROM comments  WHERE  comment_id = ? LIMIT 1 ");
        // execute query
        $stmt->execute(array($comment_id));
        // $row will be an array since fetch retrieve information as an array.
        // fetch data from database.
        $row = $stmt->fetch();
        $total_row = $stmt->rowCount();

        if ($total_row > 0) {
            // include the form with the data.
            include $commentsPages . "editComment.php";
        } else {
            $message =  "<div class='mb-4 alert alert-danger'><div class='container'><div>incorrect comment_id !</div></div></div>";
            redirectHome($message);
        }
    } elseif ($action == "update") {
        // update page section
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $recordChange = '';
            $comment_id = $_POST['comment_id'];
            $comment = $_POST['comment'];

            // update the data base with the data I receive from the form in edit page.
            $stmt = $db_connect->prepare('UPDATE comments SET comment = ?  WHERE comment_id = ?');
            $stmt->execute(array($comment, $comment_id));
            // print this message if there was a change in the record
            $recordChange = $stmt->rowCount() . ' ' .  lang("updateComment_recordChange");
            $message =  "<div class='mb-4 alert alert-success'><div class='container'> <div> Comment Updated</div>  </div></div>";
            redirectHome($message, "back", 2);

            include $memberPages . "updateComments.php";
        } else {
            // do
            $message =  "<div class='mb-4 alert alert-danger'><div class='container'><div>you don't access to this page !!</div></div></div>";
            redirectHome($message, null, 2);
        }
        // add the section to display the data.
    } elseif ($action == "delete") {
        // check if userID is numeric & return the integer value of it
        $comment_id = isset($_GET['comment_id']) && is_numeric($_GET['comment_id']) ?  intval($_GET['comment_id']) :  0;
        // select data from database based on the userID I got from $_GET.

        $checkResult = checkItem("comment_id", "comments", $comment_id);

        if ($checkResult > 0) {
            // delete user
            $stmt = $db_connect->prepare("DELETE FROM comments WHERE comment_id = ?");
            $stmt->execute(array($comment_id));
            $recordChange = $stmt->rowCount() . ' ' .  lang("deletedComment_recordChange");
            $message =  "<div class='mb-4 alert alert-success'><div class='container'><div>Comment Deleted.</div></div></div>";
            include $commentsPages . 'deleteComments.php';
        } else {
            $message =  "<div class='mb-4 alert alert-danger'><div class='container'><div>Comment doesn't exist</div></div></div>";
            redirectHome($message, 'back');
        }
    } elseif ($action == "approve") {

        // check if userID is numeric & return the integer value of it
        $comment_id = isset($_GET['comment_id']) && is_numeric($_GET['comment_id']) ?  intval($_GET['comment_id']) :  0;
        // select data from database based on the userID I got from $_GET.

        $checkResult = checkItem("comment_id", "comments", $comment_id);

        if ($checkResult > 0) {
            // delete user
            $stmt = $db_connect->prepare("UPDATE comments SET status = 1 WHERE comment_id = ?");
            // $stmt->bindParam(":userID", $userID);
            $stmt->execute(array($comment_id));
            $recordChange = $stmt->rowCount() . ' ' .  lang("commentApprove_recordChange");
            $message =  "<div class='mb-4 alert alert-success'><div class='container'><div>Comment approve successfully.</div></div></div>";
            include $commentsPages . 'activateComment.php';
        } else {
            $message =  "<div class='mb-4 alert alert-danger'><div class='container'><div>comment doesn't exist</div></div></div>";
            redirectHome($message, "back");
        }
    } else {
        $message =  "<div class='mb-4 alert alert-danger'><div class='container'><div>Error page not found!!</div></div></div>";
        redirectHome($message);
    }

    include $template . "footer.php";
} else {
    // if users attempt to enter this page
    // without a registered session get him back to the login page.
    header("Location: index.php");
    exit();
}
?>
<!--  end of php tag -->