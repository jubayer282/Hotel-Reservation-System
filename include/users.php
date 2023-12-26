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
							<th scope="col" class="sort" data-sort="name">Name</th>
							<th scope="col" class="sort" data-sort="name">Email</th>
							<th scope="col" class="sort" data-sort="name">Phone</th>
							<th scope="col" class="sort" data-sort="name">Address</th>
							<th scope="col">Created On</th>
							<th scope="col">Action</th>

						</tr>
					</thead>
					<tbody class="list">
						<?php 

						$stmt = get_row( 'user', 'id DESC' );
						while ($user_row = $stmt->fetch(PDO::FETCH_ASSOC) ) {

							?>
							<tr>
								<th scope="row">
									<div class="media align-items-center">
										<div class="media-body">
											<span class="name mb-0 text-sm"><?php echo $user_row['name']; ?></span>
										</div>
									</div>
								</th>
								<td>
									<?php echo $user_row['email']; ?>
								</td>
								<td>
									<?php echo $user_row['phone']; ?>
								</td>
								<td>
									<?php echo $user_row['address']; ?>
								</td>
								<td>
									<span class="badge badge-dot mr-4">
										<span class="status"><?php echo date("d M, Y \a\\t\ H:m:s", strtotime($user_row['created_on'])); ?></span>
									</span>
								</td>
								<td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="">
                                                <a class="dropdown-item" href="<?php echo get_page_permalink('delete', $user_row['id'], 'users' ) ?>">Delete</a>
                                            </div>
                                        </div>
                                    </td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>