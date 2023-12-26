<?php

if ( isset($_POST['feedback_submit']) AND $_POST['feedback_comment'] != null ) {
	$comment = $_POST['feedback_comment'];

	add_feedback( $comment );
}

?>

<div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-1 overflow-hidden">
	<!-- Dropdown header -->
	<div class="px-3 py-3">
		<h6 class="text-sm text-muted m-0">Feedback Panel</h6>
	</div>
	<!-- Feedback Form -->
	<?php if ( !is_admin()) { ?>
		<form action="#" method="POST">
			<div class="form-group px-3">
				<div class="input-group">
					<textarea class="form-control" name="feedback_comment" placeholder="Write something ..."></textarea>
				</div>
			</div>
			<div class="text-center">
				<button type="submit" name="feedback_submit" class="btn btn-primary">Send Feedback</button>
			</div>
		</form>

	<?php } else { ?>
		<!-- List group -->
		<?php 

		$stmt = get_row( 'feedback', 'id DESC LIMIT 2' );
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {

			?>
			<div class="list-group list-group-flush">
				<a href="#" class="list-group-item list-group-item-action">
					<div class="row align-items-center">
						<div class="col ml--2">
							<div class="d-flex justify-content-between align-items-center">
								<div>
									<h4 class="mb-0 text-sm"><?php get_user_name( $row['user_id'] ); ?></h4>
								</div>
								<div class="text-right text-muted">
									<small><?php echo date("d M, Y \a\\t\ H:m:s", strtotime($row['created_on'])); ?></small>
								</div>
							</div>
							<p class="text-sm mb-0"><?php echo $row['comment']; ?></p>
						</div>
					</div>
				</a>
			</div>
		<?php } ?>
		<!-- View all -->
		<a href="<?php get_page_permalink('feedback'); ?>" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>

	<?php } ?>

</div>