<?php 
/**
 * 
 * Template Name: Delete single Row from Database
 * 
 * */

if (!is_admin()) {
	echo '<div class="row"><div class="col-xl-8"><div class="card bg-warning"><div class="card-header bg-transparent text-white">Access Denied!</div></div></div></div>';
	return;
}

if ( !isset($_GET['from']) AND !isset($_GET['id']) ) {
	return;
}

$table = $_GET['from'];
$id = intval($_GET['id']);

delete_row( $table, $id );
exit();