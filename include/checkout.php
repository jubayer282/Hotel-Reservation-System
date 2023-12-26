<?php

if (!isset($_POST['booking_submit'])) {
	return;
}

$days = (int) round( (strtotime($_POST['check_out']) - strtotime($_POST['check_in'])) / (60 * 60 * 24));
$suite = get_single_suite($_POST['suite_id']);
$subtotal_price = $suite_total_price = $days * $suite['price'];



?>
<div class="row">
	<div class="col-md-10 ml-auto mr-auto">
		<div class="card card-upgrade">
			<div class="card-header text-center border-bottom-0">
				<h3 class="card-title">Order Details</h3>
				<p class="card-category"><?php echo "Total price calculate for " . $_POST['checkout_guests'] . " guest and " . $days . " days."; ?></p>
			</div>
			<div class="card-body">
				<div class="table-responsive table-upgrade">
					<table class="table">
						<thead>
							<tr>
								<th>Items</th>
								<th class="text-center">Price (৳)</th>
								<th class="text-center">Total (৳)</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $suite['title'] ?></td>
								<td class="text-center"><?php echo $suite['price'] ?></td>
								<td class="text-center"><?php echo number_format($suite_total_price); ?></td>
							</tr>

							<?php
							$aditional_service_total_price = 0;
							foreach($_POST['as'] as $as_id){
								$aditional_service = get_additional_services($as_id);
								$aditional_service_price = $aditional_service['price'] * $_POST['checkout_guests'] * $days;
								$aditional_service_total_price += $aditional_service_price;

								echo '<tr>';
								echo '<td><i class="ni ni-fat-add text-success"></i> ' . $aditional_service['title'] . '</td>';
								echo '<td class="text-center">' . number_format($aditional_service['price']) . '</td>';
								echo '<td class="text-center">' . number_format($aditional_service_price) . '</td>';
								echo '</tr>';
							}

							$subtotal_price += $aditional_service_total_price;

							?>

							<tr style="font-weight: bold;">
								<td></td>
								<td class="text-center">Subtotal</td>
								<td class="text-center">BDT <?php echo number_format($subtotal_price); ?></td>
							</tr>
						</tbody>
					</table>
				</div>

				<form action="<?php get_page_permalink('order-proceed') ?>" method="POST" class="mt-5">
					<input type="hidden" name="suite_id" value="<?php echo $_POST['suite_id'] ?>">
					<input type="hidden" name="check_in" value="<?php echo $_POST['check_in'] ?>">
					<input type="hidden" name="check_out" value="<?php echo $_POST['check_out'] ?>">
					<input type="hidden" name="guests" value="<?php echo $_POST['checkout_guests'] ?>">
					<input type="hidden" name="aditional" value="<?php echo serialize( $_POST['as'] ) ?>">
					<input type="hidden" name="subtotal" value="<?php echo $subtotal_price ?>">
					<div class="card-header text-center border-bottom-0">
						<h3 class="card-title">Payment Options</h3>
					</div>
					<?php include('parts/payment.php'); ?>
				</form>
				

			</div>
		</div>
	</div>


</div>