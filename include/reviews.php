<?php 

/**
 * Template Name: Review List
 * */

if (isset($_POST['review-submit'])) {
	$comment = $_POST['review-comment'];
	$arg = intval( $_POST['review-star']);

	add_review( $comment, $arg );
}

?>

<form action="#" method="POST">
    <div class="row">
        <div class="col-md-10 ml-auto mr-auto">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Add New Review</h3>
                        </div>
                        <div class="col-4 text-right">
                            <button type="submit" name="review-submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                            	<textarea class="form-control" name="review-comment" placeholder="Write something ..." required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-review">Rating</label>
                                <select class="form-control" id="input-review" name="review-star" required>
                                	<option value="1">1 Star</option>
                                	<option value="2">2 Star</option>
                                	<option value="3">3 Star</option>
                                	<option value="4">4 Star</option>
                                	<option value="5">5 Star</option>
                                </select>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="row">
	<div class="col-md-10 ml-auto mr-auto">
		<div class="card">
			<!-- Card header -->
			<div class="card-header border-0">
				<h3 class="mb-0">Review List</h3>
			</div>
			<!-- Light table -->
			<div class="table-responsive">
				<table class="table align-items-center table-flush">
					<thead class="thead-light">
						<tr>
							<th scope="col" class="sort" data-sort="name">User Name</th>
							<th scope="col" class="sort" data-sort="budget">Comment</th>
							<th scope="col" class="sort" data-sort="budget">Rating</th>
							<th scope="col">Submit On</th>
						</tr>
					</thead>
					<tbody class="list">
						<?php 

						$stmt = get_row( 'reviews', 'id DESC' );
						while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {

							?>
							<tr>
								<th scope="row">
									<div class="media align-items-center">
										<div class="media-body">
											<span class="name mb-0 text-sm"><?php get_user_name( $row['user_id'] ); ?></span>
										</div>
									</div>
								</th>
								<td class="comment">
									<?php echo $row['comment']; ?>
								</td>
								<td class="comment">
									<?php echo $row['star']; ?> out of 5
								</td>
								<td>
									<span class="badge badge-dot mr-4">
										<i class="bg-warning"></i>
										<span class="status"><?php echo date("d M, Y \a\\t\ H:m:s", strtotime($row['created_on'])); ?></span>
									</span>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>