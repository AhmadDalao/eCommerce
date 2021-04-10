<?php
ob_start();
session_start();
$pageTitle = "Create new Item";
include "init.php";
if (isset($_SESSION['userFront'])) {



    if ($_SERVER['REQUEST_METHOD'] == "POST") {


        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
        $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_INT);
        $made_in = filter_var($_POST['made_in'], FILTER_SANITIZE_STRING);
        $status = filter_var($_POST['status'], FILTER_SANITIZE_NUMBER_INT);
        $cate_id = filter_var($_POST['cate_id'], FILTER_SANITIZE_NUMBER_INT);

        // validate the form before updating the database
        $formErrors = array();
        if (strlen($name) > 25) {
            // adding form error to array so I can show it later to user.
            $formErrors[] = lang("itemName_greater");
        }

        if (strlen($name) < 4) {
            // adding form error to array so I can show it later to user.
            $formErrors[] = lang("itemName_less");
        }

        if (empty($name)) {
            // adding form error to array so I can show it later to user.
            $formErrors[] = lang("itemName_empty");
        }

        if (empty($description)) {
            // adding form error to array so I can show it later to user.
            $formErrors[] = lang("itemDescriptionEmpty");
        }
        if (strlen($description) < 10) {
            // adding form error to array so I can show it later to user.
            $formErrors[] = "Description must be at least <strong>10 Characters</strong>'";
        }
        if (empty($price)) {
            // adding form error to array so I can show it later to user.
            $formErrors[] = lang("itemPriceEmpty");
        }

        if (empty($made_in)) {
            // adding form error to array so I can show it later to user.
            $formErrors[] =  lang("itemMadeInEmpty");
        }
        if (strlen($made_in) < 2) {
            // adding form error to array so I can show it later to user.
            $formErrors[] =  "Country Of origin can't be less than <strong>2 Characters</strong>";
        }

        if ($status == 0) {
            // adding form error to array so I can show it later to user.
            $formErrors[] =  lang("itemStatusEmpty");
        }
        if ($cate_id == 0) {
            // adding form error to array so I can show it later to user.
            $formErrors[] =  lang("itemCategoryEmpty");
        }

        if (empty($formErrors)) {
            // insert the data base with the data I receive from the form in add page.
            $stmt = $db_connect->prepare('INSERT INTO items (name ,description ,price ,made_in ,status ,add_date ,cate_id, user_id) VALUES (:name, :description ,:price ,:made_in, :status, now(), :cate_id ,:user_id )');
            $stmt->execute(array(
                "name" => $name,
                "description" => $description,
                "price" => $price,
                "made_in" => $made_in,
                'status' => $status,
                "cate_id" => $cate_id,
                "user_id" => $_SESSION['frontUserID'],
            ));

            if ($stmt) {
                $message = "<div class='mb-4 alert alert-success'><div class='container'><div>Item Created</div></div></div>";
                redirectHome($message, "back", 2);
            }
        }
        // find errors in the form sent to you by add member page.
    }


?>
<section class="profile-info py-5">
    <div class="container">
        <h1 class="text-center mb-4 text-capitalize header_color"><?php echo $pageTitle ?></h1>
        <div class="row">
            <div class="userInfo col-12 mb-5">
                <div class="card">
                    <div class="card-header">
                        <span class="text-capitalize"><i class="fas fa-user mr-2"></i><?php echo $pageTitle ?></span>
                        <span class="hideList float-right px-3">
                            <i class="fas fa-plus fa-lg fa-fw"></i>
                        </span>
                    </div>
                    <div class="card-body py-5 hideItem">
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"
                            class="edit__form row flex-column align-items-center justify-content-center">
                            <!-- itemName -->
                            <div class="form-group position-relative  col-12 col-md-9 col-lg-6 no-gutters">
                                <label class=" text-capitalize" for="itemName"><?php echo lang("itemName"); ?></label>
                                <input required type="text" class="form-control form-control-lg" name="name"
                                    id="itemName">
                            </div>

                            <!-- description -->
                            <div class="form-group position-relative  col-12 col-md-9 col-lg-6">
                                <label class=" text-capitalize "
                                    for="description"><?php echo lang("itemDescription"); ?></label>
                                <textarea required class="form-control  form-control-lg" name="description"
                                    id="description" cols="30" rows="10"></textarea>
                            </div>

                            <!-- price  -->
                            <div class="form-group position-relative  col-12 col-md-9 col-lg-6">
                                <label class=" text-capitalize " for="price"><?php echo lang("itemPrice"); ?></label>
                                <input required type="text" class=" form-control form-control-lg" id="price"
                                    name="price">
                            </div>

                            <!-- country of origin( made in)  -->
                            <div class="form-group  position-relative  col-12 col-md-9 col-lg-6">
                                <label class=" text-capitalize " for="made_in"><?php echo lang("itemMadeIn"); ?></label>
                                <input required type="text" class=" form-control form-control-lg" id="made_in"
                                    name="made_in">
                            </div>

                            <!-- item status -->
                            <div class="form-group col-12 col-md-9 col-lg-6">
                                <label class="text-capitalize" for="status"><?php echo lang("itemStatus"); ?></label>
                                <select class="form-control" name="status">
                                    <option class="text-capitalize" value="0">
                                        <?php echo lang("itemSelect") ?> </option>
                                    <option class="text-capitalize" value="1">
                                        <?php echo lang("itemNew") ?> </option>
                                    <option class="text-capitalize" value="2">
                                        <?php echo lang("itemLikeNew") ?> </option>
                                    <option class="text-capitalize" value="3">
                                        <?php echo lang("itemSecondHand") ?> </option>
                                    <option class="text-capitalize" value="4">
                                        <?php echo lang("itemOld") ?> </option>
                                </select>
                            </div>

                            <!-- add item to category -->
                            <div class="form-group col-12 col-md-9 col-lg-6">
                                <label class="text-capitalize" for="cate_id"><?php echo lang("itemCategory"); ?></label>
                                <select class="form-control" name="cate_id">
                                    <option class="text-capitalize" value="0">
                                        <?php echo lang("itemSelectCategory") ?> </option>
                                    <?php
                                        $stmt = $db_connect->prepare('SELECT * FROM categories ');
                                        $stmt->execute();
                                        $categories = $stmt->fetchAll();
                                        foreach ($categories as $category) {
                                            echo "<option value='" .  $category['ID'] . "'>" .  $category['name']  . "</option>";
                                        }
                                        ?>
                                </select>
                            </div>
                            <div class="form-group col-12 col-md-9 col-lg-6">
                                <input type="submit" class="btn btn-primary btn-lg text-capitalize"
                                    value="<?php echo lang("add_item"); ?>">
                            </div>
                        </form>

                    </div>

                    <?php if (!empty($formErrors)) {
                            formErrorsPrint($formErrors);
                        } ?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php } else {
    header('Location: login.php');
    exit();
}
include $template .  "footer.php";
ob_end_flush(); ?>