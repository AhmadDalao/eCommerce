<section class="category_add_section py-5">
    <div class="container">
        <h1 class="text-center header_color text-capitalize mb-5"><?php echo lang("add_itemTitle"); ?></h1>
        <form method="POST" action="?action=insert"
            class="edit__form row flex-column align-items-center justify-content-center">
            <!-- itemName -->
            <div class="form-group position-relative  col-12 col-md-9 col-lg-6 ">
                <label class=" text-capitalize" for="itemName"><?php echo lang("itemName"); ?></label>
                <input type="text" class="form-control form-control-lg" name="name" id="itemName" required>
            </div>

            <!-- description -->
            <div class="form-group col-12 col-md-9 col-lg-6">
                <label class=" text-capitalize " for="description"><?php echo lang("itemDescription"); ?></label>
                <input type="text" class="password form-control form-control-lg" id="description" name="description"
                    required>
            </div>

            <!-- price  -->
            <div class="form-group col-12 col-md-9 col-lg-6">
                <label class=" text-capitalize " for="price"><?php echo lang("itemPrice"); ?></label>
                <input type="text" class="password form-control form-control-lg" id="price" name="price" required>
            </div>

            <!-- country of origin( made in)  -->
            <div class="form-group col-12 col-md-9 col-lg-6">
                <label class=" text-capitalize " for="made_in"><?php echo lang("itemMadeIn"); ?></label>
                <input type="text" class="password form-control form-control-lg" id="made_in" name="made_in" required>
            </div>

            <!-- item status -->
            <div class="form-group col-12 col-md-9 col-lg-6">
                <label class="text-capitalize" for="status"><?php echo lang("itemStatus"); ?></label>
                <select class="form-control" name="status">
                    <option class="text-capitalize" value="0"> <?php echo lang("itemSelect") ?> </option>
                    <option class="text-capitalize" value="1"> <?php echo lang("itemNew") ?> </option>
                    <option class="text-capitalize" value="2"> <?php echo lang("itemLikeNew") ?> </option>
                    <option class="text-capitalize" value="3"> <?php echo lang("itemSecondHand") ?> </option>
                    <option class="text-capitalize" value="4"> <?php echo lang("itemOld") ?> </option>
                </select>
            </div>

            <!-- member who added the item -->
            <div class="form-group col-12 col-md-9 col-lg-6">
                <label class="text-capitalize" for="user_id"><?php echo lang("itemMember"); ?></label>
                <select class="form-control" name="user_id">
                    <option class="text-capitalize" value="0"> <?php echo lang("itemSelectMember") ?> </option>
                    <?php

                    $stmt = $db_connect->prepare('SELECT * FROM users ');
                    $stmt->execute();
                    $users = $stmt->fetchAll();
                    foreach ($users as $user) {
                        echo "<option value='" .  $user['userID'] . "'>" .  $user['username']  . "</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- add item to category -->
            <div class="form-group col-12 col-md-9 col-lg-6">
                <label class="text-capitalize" for="cate_id"><?php echo lang("itemCategory"); ?></label>
                <select class="form-control" name="cate_id">
                    <option class="text-capitalize" value="0"> <?php echo lang("itemSelectCategory") ?> </option>
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
</section>