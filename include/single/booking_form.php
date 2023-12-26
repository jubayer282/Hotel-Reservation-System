<form action="<?php get_page_permalink('checkout'); ?>" method="POST">
    <div class="input-daterange datepicker row align-items-center">
        <div class="col">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <input class="form-control" placeholder="Ceheck In" type="text" name="check_in" value="<?php echo date('m/d/Y'); ?>">
                </div>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <input class="form-control" placeholder="Check Out" type="text" name="check_out" value="<?php echo date('m/d/Y', strtotime('+3 days')) ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="form-control-label" for="input-guests">Guests</label>
        <input type="number" id="input-guests" class="form-control" name="checkout_guests" max="<?php echo $row['beads']*2; ?>" placeholder="MAX <?php echo $row['beads']*2; ?> Guests" required>
    </div>

    <hr>

    <h4 class="text-light text-uppercase ls-1 mb-1">Additional services</h4>
    <div class="">
        <?php 
        $as_stmt = get_row('additional_services', 'title ASC');
        while ($as_row = $as_stmt->fetch(PDO::FETCH_ASSOC) ) {
            ?>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="<?php echo $as_row['id']; ?>" name="as[]" value="<?php echo $as_row['id']; ?>">
                <label class="custom-control-label" for="<?php echo $as_row['id']; ?>"><?php echo $as_row['title'] . " ( ৳" . $as_row['price'] . " for 1 guest )"; ?></label>
            </div>

        <?php } ?>

    </div>


    <div class="text-center pb-3">
        <input type="hidden" name="suite_id" value="<?php echo $row['id']; ?>">
        <input type="hidden" name="suite_price" value="<?php echo $row['price']; ?>">
        <button type="submit" name="booking_submit" class="btn btn-primary mt-4">Book Now</button>
    </div>
</form>