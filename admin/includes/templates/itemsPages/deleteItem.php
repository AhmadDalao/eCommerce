<section class="update_section py-5">
    <div class="container">
        <h1 class='text-center header_color text-capitalize my-5'><?php echo lang('deleteItem'); ?></h1>
        <p class="update_text text-left alert alert-success "><?php echo $recordChange; ?></p>
        <?php redirectHome($message, "back") ?>
    </div>
</section>