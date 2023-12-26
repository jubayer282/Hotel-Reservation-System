<?php 
/**
* 
* Templeate Name: Single Suite
* 
* */
if (isset($_POST['booking_submit'])) {
      
} else {
  $row = get_single_suite();
}

?>

<div class="row">
      <div class="col-xl-6">
            <div class="card">
                  <img class="card-img" src="https://picsum.photos/1280/720">
            </div>
            <!-- Booking form -->
            <div class="card">
                  <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                              <div class="col">
                                    <h5 class="h3 mb-0">Booking Details</h5>
                                    <h6 class="text-uppercase text-muted ls-1 mb-1">Enter information below</h6>
                              </div>
                        </div>
                  </div>
                  <div class="card-body">

                        <?php include('booking_form.php'); ?>
                        
                  </div>                  
            </div>
      </div>
      <div class="col-xl-6">
            <div class="card bg-default">
                  <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                              <div class="col">
                                    <h2 class="text-white mb-0"><?php echo $row['title'] ?: "Suite Name" ?></h2>
                              </div>
                              <div class="col text-right">
                                    <h4 class="text-light text-uppercase ls-1 mb-1">৳<?php echo $row['price'] ?: "___" ?>/DAY</h4>
                              </div>
                        </div>
                  </div>
                  <div class="card-body">
                        <p class="card-text text-light"><?php echo $row['description'] ?: "Suite Description" ?></p>
                        <hr class="bg-gray">

                        <h4 class="text-light text-uppercase ls-1 mb-1">Room Parameters</h4>
                        <div class="row">
                              <div class="col"><strong>AREA:</strong> <?php echo $row['area'] ?: "Suite Area" ?> sqf</div>
                              <div class="col"><strong>BEADS:</strong> <?php echo $row['beads'] ?: "No. of Beads" ?></div>
                              <div class="col"><strong>BATHROOM:</strong> <?php echo $row['bathroom'] ?: "Np. of Bathroom" ?></div>
                        </div>
                        <hr class="bg-gray">

                        <h4 class="text-light text-uppercase ls-1 mb-1">Room Facilities</h4>
                        <div class="">
                              <?php

                              $array = unserialize($row['facilities']);

                              foreach($array as $key => $value) {
                                    $row = get_facilities(intval($value));
                                    echo '<div><i class="ni ni-fat-add"></i> ' . $row['title'] . '</div>';
                              }

                              ?>

                        </div>
                        <hr class="bg-gray">

                        <h4 class="text-light text-uppercase ls-1 mb-1">Hotel Policies</h4>

                  </div>
            </div>
      </div>
</div>