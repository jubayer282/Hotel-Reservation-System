<div class="row">
	<div class="col-xl-8">
		<div class="card bg-default">
			<div class="card-header bg-transparent">
				<div class="row align-items-center">
					<div class="col">
						<h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
						<h5 class="h3 text-white mb-0">Suite</h5>
					</div>
					<div class="col text-right">
						<a type="button" class="btn btn-primary btn-sm" href="#">See all</a>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">

                              <?php
                              $stmt = get_suite_list( 'suite' );
                              while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                                    echo '<div class="col-xl-4 col-md-6">';
                                    include("parts/card_1.php");
                                    echo '</div>';
                              }
                              ?>

                        </div>
                  </div>
            </div>
      </div>
      <div class="col-xl-4">
            <div class="card">
                  <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                              <div class="col">
                                    <h6 class="text-uppercase text-muted ls-1 mb-1"><?php echo is_admin() ? "Peinding" : "" ?></h6>
                                    <h5 class="h3 mb-0">Recent orders</h5>
                              </div>
                              <div class="col text-right">
                                    <a href="<?php get_page_permalink('order'); ?>" class="btn btn-sm btn-primary">See all</a>
                              </div>
                        </div>
                  </div>

                  <?php

                  //Get Total Order List
                  if ( is_admin() ) {
                        include("parts/dashbord_order_list.php");
                  }else {
                        include("parts/dashbord_order_list.php");
                  }

                  ?> 

            </div>
      </div>
</div>