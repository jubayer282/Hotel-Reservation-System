<?php

if ( isset($_GET['action']) AND is_admin() ) {
	$actions = $_GET['action'];

	if ($actions == 'add-new') {
		include('parts/_suite_add.php');
	}
	elseif ($actions == 'edit') {
		include('parts/_suite_add.php');
	} else {
		include ('parts/_suite_list.php');
	}
}
elseif ( isset($_GET['id']) ) {
	include ('single/suite.php');
} else {
	include('parts/_suite_list.php');
}