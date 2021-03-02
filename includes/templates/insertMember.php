<section class="inserted_section py-5">
    <div class="container">
        <h1 class='text-center header_color text-capitalize my-5'><?php echo lang('insert_profile'); ?></h1>
        <p class="update_text text-left alert alert-success "><?php echo $recordChange; ?></p>
        <div class="errorHolder">
            <?php formErrorsPrint($formErrors); ?>
        </div>
        <div>
            <?php redirectHome($message, 1, $pageName, $alertType); ?>
        </div>
    </div>
</section>