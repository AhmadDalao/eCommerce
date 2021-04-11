<?php
ob_start();
session_start();
$pageTitle = "show items";
include "init.php";

// check if userID is numeric & return the integer value of it
$item_id = isset($_GET['item_id']) && is_numeric($_GET['item_id']) ?  intval($_GET['item_id']) :  0;
// select data from database based on the item_id I got from $_GET.
$stmt = $db_connect->prepare("SELECT items.* , users.username AS username ,
                                categories.name AS category_name,
                                categories.ID AS category_id FROM items 
                                INNER JOIN users ON users.userID = items.user_id
                                INNER JOIN categories ON categories.ID = items.cate_id   WHERE item_id = ? LIMIT 1 ");
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
                        <i class="far fa-money-bill-alt fa-xs mr-2"></i><?php echo $row['price']; ?>
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
                        Added by:<span class="ml-2 font-weight-bold"><?php echo $row['username']; ?></span>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <h2 class="text-center">Comments</h2>
        <div class="row py-5">
            <div class="comment-img">
                <img src="./layout/images/placeHolder.png" class="img-fluid img-thumbnail" alt="placeHolder">
            </div>
            <div class="user-comment">
                <p class="p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, iste. Cupiditate
                    ea
                    molestiae
                    sunt,
                    velit magnam amet accusantium sit est dolorum quae perferendis doloribus, ad iusto ex dolore
                    facere.
                    Veritatis?</p>
            </div>
        </div>

    </div>
</section>

<?php } else { ?>
<div class="container py-5">
    <div class="col-12 alert alert-info">There is no item to show</div>
</div>

<?php } ?>


<?php
include $template .  "footer.php";
ob_end_flush(); ?>