<section class="edit_section py-5">
    <div class="container">
        <h1 class="text-center header_color text-capitalize mb-5"><?php echo lang("edit_comment"); ?></h1>
        <form method="POST" action="?action=update"
            class="edit__form row flex-column align-items-center justify-content-center">
            <input type="text" name="comment_id" value="<?php echo $comment_id ?>" hidden>
            <!-- comment -->
            <div class="form-group position-relative  col-12 col-md-9 col-lg-6 ">
                <label class=" text-capitalize" for="exampleInputUsername"><?php echo lang("comment_edit"); ?></label>
                <textarea required class="form-control form-control-lg" name="comment" id="comment" cols="30"
                    rows="10"><?php echo $row['comment']; ?></textarea>
            </div>
            <!-- save comment -->
            <div class="form-group col-12 col-md-9 col-lg-6">
                <input type="submit" class="btn btn-primary btn-lg" value="<?php echo lang("edit_comment"); ?>">
            </div>
        </form>
    </div>
</section>
<script src="<?php echo $js; ?>showEye.js"></script>