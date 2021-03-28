<section class="category_add_section py-5">
    <div class="container">
        <h1 class="text-center header_color text-capitalize mb-5"><?php echo lang("edit_category"); ?></h1>
        <form method="POST" action="?action=update"
            class="edit__form row flex-column align-items-center justify-content-center">
            <input type="text" name="cateID" value="<?php echo $cateID ?>" hidden>
            <!-- categoryName -->

            <div class="form-group position-relative  col-12 col-md-9 col-lg-6 ">
                <label class=" text-capitalize" for="categoryName"><?php echo lang("categoryName"); ?></label>
                <input value="<?php echo $row['name']; ?>" type="text" class="form-control form-control-lg" name="name"
                    id=" categoryName" required>
            </div>

            <!-- description -->
            <div class="form-group col-12 col-md-9 col-lg-6">
                <label class=" text-capitalize " for="description"><?php echo lang("CategoryDescription"); ?></label>
                <input value="<?php echo $row['description']; ?>" type="text"
                    class="password form-control form-control-lg" id="description" name="description">
            </div>

            <!-- ordering -->
            <div class="form-group position-relative  col-12 col-md-9 col-lg-6">
                <label class=" text-capitalize " for="CategoryOrdering"><?php echo lang("CategoryOrdering"); ?></label>
                <input value="<?php echo $row['ordering']; ?>" type="number" class="form-control form-control-lg"
                    name="ordering" id="CategoryOrdering">
            </div>

            <!-- visibility -->
            <div class="form-group  position-relative col-12 col-md-9 col-lg-6">
                <label class=" text-capitalize " for="visibility"><?php echo lang("CategoryVisibility"); ?></label>
                <!-- CatVisibilityYes -->
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="visibility" id="CatVisibilityYes" value="0"
                        <?php if ($row['visibility'] == 0) {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
                    <label class="form-check-label text-capitalize" for="CatVisibilityYes">
                        <?php echo lang("isVisible") ?>
                    </label>
                </div>
                <!-- CatVisibilityYes -->

                <!-- CatVisibilityNo -->
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="visibility" id="CatVisibilityNo" value="1"
                        <?php if ($row['visibility'] == 1) {
                                                                                                                        echo "checked";
                                                                                                                    }  ?>>
                    <label class="form-check-label text-capitalize" for="CatVisibilityNo">
                        <?php echo lang("isInVisible") ?>
                    </label>
                </div>
                <!-- CatVisibilityNo -->
            </div>

            <!-- commenting -->
            <div class="form-group  position-relative col-12 col-md-9 col-lg-6">
                <label class=" text-capitalize " for="commenting"><?php echo lang("commentingAllowed"); ?></label>
                <!-- commentYes-->
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="commenting" id="commentYes" value="0" <?php if ($row['allow_comment'] == 0) {
                                                                                                                    echo "checked";
                                                                                                                } ?>>
                    <label class="form-check-label text-capitalize" for="commentYes">
                        <?php echo lang("commentYes") ?>
                    </label>
                </div>
                <!-- commentYes-->

                <!-- commentNo -->
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="commenting" id="commentNo" value="1" <?php if ($row['allow_comment'] == 1) {
                                                                                                                echo "checked";
                                                                                                            } ?>>
                    <label class="form-check-label text-capitalize" for="commentNo">
                        <?php echo lang("commentNo") ?>
                    </label>
                </div>
                <!-- commentNo -->
            </div>

            <!-- advertisement -->
            <div class="form-group  position-relative col-12 col-md-9 col-lg-6">
                <label class=" text-capitalize " for="advertisement"><?php echo lang("advertisementAllowed"); ?></label>
                <!-- yes -->
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="advertisement" id="adsYes" value="0" <?php if ($row['allow_ads'] == 0) {
                                                                                                                echo "checked";
                                                                                                            } ?>>
                    <label class="form-check-label text-capitalize" for="adsYes">
                        <?php echo lang("adsYes") ?>
                    </label>
                </div>
                <!-- End yes -->

                <!--  No -->
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="advertisement" id="adsNo" value="1" <?php if ($row['allow_ads'] == 1) {
                                                                                                                echo "checked";
                                                                                                            } ?>>
                    <label class="form-check-label text-capitalize" for="adsNo">
                        <?php echo lang("adsNo") ?>
                    </label>
                </div>
                <!-- End no -->
            </div>

            <div class="form-group col-12 col-md-9 col-lg-6">
                <input type="submit" class="btn btn-primary btn-lg text-capitalize"
                    value="<?php echo lang("edit_category"); ?>">
            </div>
        </form>
    </div>
</section>