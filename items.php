<?php
ob_start();
session_start();
$pageTitle = "show items";
include "init.php";

// check if userID is numeric & return the integer value of it
$item_id = isset($_GET['item_id']) && is_numeric($_GET['item_id']) ?  intval($_GET['item_id']) :  0;
// select data from database based on the item_id I got from $_GET.
$stmt = $db_connect->prepare("SELECT items.* , users.username AS username ,
                                users.groupID AS g_id ,
                                categories.name AS category_name,
                                categories.allow_comment ,
                                categories.ID AS category_id FROM items 
                                INNER JOIN users ON users.userID = items.user_id
                                INNER JOIN categories ON categories.ID = items.cate_id   WHERE item_id = ? AND approve = 1 LIMIT 1 ");
// execute query
$stmt->execute(array($item_id));
// $row will be an array since fetch retrieve information as an array.

$total_row = $stmt->rowCount();

if ($total_row > 0) {
    // fetch data from database.
    $row = $stmt->fetch();
?>

<section class="items-info py-5">
    <div class="container">
        <?php if ($row['approve'] == 0) {
                echo '<p class="alert alert-warning font-weight-bold">Item Waiting Admin Approval.</p>';
            } ?>
        <div class="row py-5">
            <div class="col-12 mb-4 mb-md-0 col-sm-6 mx-auto col-md-3">
                <img src="./layout/images/placeHolder.png" class="img-fluid img-thumbnail" alt="placeHolder">
            </div>
            <div class="col-12 col-md-9">
                <h2> <?php echo $row['name']; ?></h2>
                <p><?php echo $row['description']; ?> </p>
                <ul class="items_details-list list-group list-group-flush">
                    <li class="list-group-item"><i class="far fa-calendar-alt mr-2"></i><?php echo $row['add_date']; ?>
                    </li>
                    <li class="list-group-item">
                        <i class="far fa-money-bill-alt fa-xs mr-2"></i><?php echo $row['price']; ?>$
                    </li>
                    <li class="list-group-item">
                        <i class="fas fa-building fa-xs mr-2"></i>Made In:<span
                            class="ml-2 font-weight-bold"><?php echo $row['made_in']; ?></span>
                    </li>
                    <li class="list-group-item"><i class="fas fa-tags fa-xs mr-2"></i>Category:<a
                            class="font-weight-bold text-capitalize ml-2"
                            href="categories.php?cateID=<?php echo $row["category_id"]; ?>&cateName=<?php echo str_replace(" ", "-", $row['category_name']); ?>"><?php echo $row['category_name'] ?></a>

                    </li>
                    <li class="list-group-item"><i class="fas fa-user fa-xs mr-2"></i>
                        Seller:<span class="ml-2 font-weight-bold"><a
                                href="profile.php?profileName=<?php echo $row['username']; ?>"><?php echo $row['username']; ?></a></span>
                    </li>
                </ul>
            </div>
        </div>
        <hr>

        <?php if ($row['allow_comment'] == 0) { ?>
        <?php if (isset($_SESSION['userFront'])) {
                ?>
        <div class="comments_form-holder">
            <form method="POST" action="<?php echo $_SERVER["PHP_SELF"] . "?item_id=" . $row['item_id']; ?>"
                class="edit__form row flex-column align-items-center justify-content-center">
                <!-- comment -->
                <div class="form-group col-12 col-lg-9 offset-lg-3">
                    <h3 class="py-4">Add a comment</h3>
                    <textarea required class="form-control  form-control-lg" name="comment" id="comment"
                        rows="4"></textarea>
                </div>
                <div class="form-group col-12  col-lg-9 offset-lg-3">
                    <input type="submit" class="btn btn-primary btn-lg text-capitalize" value="Comment">
                </div>
            </form>
            <?php
                        if ($_SERVER['REQUEST_METHOD'] == "POST") {
                            $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
                            $item_id = $row['item_id'];
                            $user_id = $_SESSION['frontUserID'];

                            if (!empty($comment)) {
                                $stmt = $db_connect->prepare("INSERT INTO
                             comments (comment , status , comment_date, item_id , user_id)
                              VALUES (:comment , 0, NOW(),:item_id, :user_id )");

                                $stmt->execute(array(
                                    "comment" => $comment,
                                    "item_id" => $item_id,
                                    "user_id" => $user_id,
                                ));

                                if ($stmt) {
                                    echo '<div class="row  align-items-center justify-content-center">
                                            <div class=" col-12 col-lg-9 offset-lg-3">
                                                <p class="alert alert-success font-weight-bold">Your comment has been added successfully.</p>
                                            </div>
                                    </div>';
                                    header("refresh:0.5;url=items.php?item_id=$item_id");
                                    exit();
                                }
                            } else {
                                echo '<div class="row  align-items-center justify-content-center">
                                            <div class=" col-12 col-lg-9 offset-lg-3">
                                                <p class="alert alert-danger font-weight-bold">Comment should not be empty</p>
                                            </div>
                                    </div>';
                            }
                        } ?>
        </div>
        <?php
                } else {
                    echo '<div class="row align-items-center justify-content-center">
                        <div class="col-12 col-lg-9 offset-lg-3">
                            <h3 class="py-4">Add a comment</h3>
                            <p class="alert alert-info font-weight-bold"><a href="login.php">Login or register</a> to add comment.</p>
                        </div>
                    </div>';
                } ?>
        <hr>
        <h2 class="text-center">Comments</h2>
        <div class="container no-gutters">
            <div class="comments-wrapper no-gutters py-5">
                <?php

                        // select all comments.
                        $stmt = $db_connect->prepare("SELECT comments.* ,
                                        users.username As username
                                    FROM comments
                                    INNER JOIN users ON users.userID = comments.user_id
                                    WHERE item_id = ? AND status = 1  ORDER BY comment_id DESC");
                        // execute the SQL above
                        $stmt->execute(array($row['item_id']));
                        // assign result from the SQL statement into a variable.
                        $rows = $stmt->fetchAll();
                        $total_row = $stmt->rowCount();
                        if ($total_row > 0) {
                            foreach ($rows as $comment) { ?>
                <div class="comment-holder my-3 d-flex">
                    <img class="comment-img  My-2" src="./layout/images/avatar5.png" class="img-fluid"
                        alt="placeHolder">
                    <div class="comment-details">
                        <h6 id="name" class="pl-2 mb-0 text-capitalize"><?php echo $comment['username']; ?></h6>
                        <small id="name"
                            class="pl-2 form-text text-muted"><?php echo $comment['comment_date']; ?></small>
                        <p class="px-2 mb-0 user-comment"><?php echo $comment['comment']; ?></p>
                    </div>
                </div>
                <hr>
                <?php  }
                        } else { ?>
                <div class="col-12 col-lg-9 offset-lg-3">
                    <p class="alert alert-primary font-weight-bold">There are no comments on this item.</p>
                </div>
                <?php  } ?>

            </div>
        </div>
        <?php } else { ?>
        <div class="">
            <p class="alert alert-info font-weight-bold">Comments are disabled.</p>
        </div>
        <?php  } ?>


    </div>

    </div>
</section>

<?php } else { ?>
<div class="container pt-5">
    <div class="col-12 alert alert-warning text-capitalize">item has not been approved or does not exist.</div>
</div>

<?php
    redirectHome("", "back", 4);
} ?>


<?php
include $template .  "footer.php";
ob_end_flush(); ?>