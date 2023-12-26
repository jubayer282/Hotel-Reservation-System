<?php
/**
 * 
 * Template Name: Add New Suite
 * 
 * */

//Handle Form Submit Data

if ( is_admin() AND isset($_POST['submit']) ) {
	$id = isset($_GET['id']) ? intval($_GET['id']) : null;
	$title = $_POST['suite-name'];
	$price = intval($_POST['suite-price']);
	$description = $_POST['suite-description'];
	$area = intval($_POST['suite-area']);
	$beads = intval($_POST['suite-beads']);
	$bathroom = intval($_POST['suite-bathroom']);
	$facilities = serialize($_POST['suite-facilities']);
	$image = NULL;

	if ( $id === null ) {
		add_suite( $title, $price, $description, $area, $beads, $bathroom, $facilities, $image );
	}
	elseif( $id != null ) {
		update_suite( $id, $title, $price, $description, $area, $beads, $bathroom, $facilities, $image );
	}
}
elseif ( $_GET['action'] == 'edit') {
  $row = get_single_suite();
} else {
	$row = null;
}


?>

<form action="" method="POST">
	<div class="row mt--5">
		<div class="col-md-10 ml-auto mr-auto">
			<div class="card">
				<div class="card-header">
					<div class="row align-items-center">
						<div class="col-8">
							<h3 class="mb-0">Add New Suite</h3>
						</div>
						<div class="col-4 text-right">
							<button type="submit" name="submit" class="btn btn-sm btn-primary">Publish</button>
						</div>
					</div>
				</div>
				<div class="card-body">
					<h6 class="heading-small text-muted mb-4">Suite information</h6>
					<div class="pl-lg-4">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label class="form-control-label" for="input-name">Name</label>
									<input type="text" id="input-name" class="form-control" placeholder="Suite Name" name="suite-name" value="<?php echo htmlspecialchars($row['title']); ?>" required>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label class="form-control-label" for="input-price">Price</label>
									<input type="number" id="input-price" class="form-control" placeholder="Suite Price Per Day" name="suite-price" value="<?php echo htmlspecialchars($row['price']); ?>" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="form-control-label" for="input-description">Description</label>
									<textarea  id="input-description" class="form-control" placeholder="Write something...." name="suite-description"required><?php echo htmlspecialchars($row['description']); ?></textarea>
								</div>
							</div>
						</div>
					</div>
					<hr class="my-4">
					<!-- Address -->
					<h6 class="heading-small text-muted mb-4">Room Parameters</h6>
					<div class="pl-lg-4">
						<div class="row">
							<div class="col-lg-4">
								<div class="form-group">
									<label class="form-control-label" for="input-area">Area</label>
									<input type="number" id="input-area" class="form-control" name="suite-area" placeholder="Room Area (sq ft)" value="<?php echo $row['area']; ?>" required>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label class="form-control-label" for="input-beads">Beads</label>
									<input type="number" id="input-beads" class="form-control" name="suite-beads" placeholder="Room Beads" value="<?php echo $row['beads']; ?>" required>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label class="form-control-label" for="input-bathroom">Bathroom</label>
									<input type="number" id="input-bathroom" class="form-control" name="suite-bathroom" placeholder="Room Bathroom" value="<?php echo $row['bathroom']; ?>" required>
								</div>
							</div>
						</div>
					</div>
					<hr class="my-4">
					<!-- Description -->
					<h6 class="heading-small text-muted mb-4">Facilities</h6>
					<div class="pl-lg-4">
						<div class="form-group">
							<label for="input-facilities">Select Facilities</label>
							<select class="form-control" id="input-facilities" name="suite-facilities[]" multiple>
								<?php

								$stmt = get_row( 'facilities' );
								$array = unserialize($row['facilities']);
								while ($facilitie_row = $stmt->fetch(PDO::FETCH_ASSOC) ) { ?>
									<option value="<?php echo $facilitie_row['id'] ?>"
										<?php 
										if ($_GET['action'] == 'edit') {
											echo in_array($facilitie_row['id'], $array) ? 'selected':'';
										}
									?>>
									<?php echo $facilitie_row['title'] ?></option>
								<?php }

								?>
							</select>
							<h6 class="text-muted">Hold down the Ctrl (windows) or Command (Mac) button to select multiple options.</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>