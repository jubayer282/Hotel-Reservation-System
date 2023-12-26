<?php 
/**
 * 
 * Template Name: Update Status value from database
 * 
 * */

if (!is_admin()) {
	echo '<div class="row"><div class="col-xl-8"><div class="card bg-warning"><div class="card-header bg-transparent text-white">Access Denied!</div></div></div></div>';
	return;
}

if ( !isset($_GET['from']) AND !isset($_GET['id']) AND !isset($_GET['status']) ) {
	return;
}

$table = $_GET['from'];
$id = intval($_GET['id']);
$status = intval($_GET['status']);

update_status( $table, $id, $status );
exit();