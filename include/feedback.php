<?php 

/**
 * Template Name: Feedback List
 * */

if (!is_admin()) {
	return;
}

?>

<div class="row">
	<div class="col">
		<div class="card">
			<!-- Card header -->
			<div class="card-header border-0">
				<h3 class="mb-0">Feedback List</h3>
			</div>
			<!-- Light table -->
			<div class="table-responsive">
				<table class="table align-items-center table-flush">
					<thead class="thead-light">
						<tr>
							<th scope="col" class="sort" data-sort="name">User Name</th>
							<th scope="col" class="sort" data-sort="budget">Feedback</th>
							<th scope="col">Submit On</th>
						</tr>
					</thead>
					<tbody class="list">
						<?php 

						$stmt = get_row( 'feedback', 'id DESC' );
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