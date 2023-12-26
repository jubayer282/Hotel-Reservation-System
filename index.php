<?php
session_start();

if (($_SERVER['HTTP_HOST']) == 'localhost') {
	define('SITE_URL', 'http://localhost/cse208');
}else{
	define('SITE_URL', '#');
}

//Connect database
include("db/connection.php");
include("include/function.php");




if(isset($_SESSION['id']) == 1 AND isset($_GET['page']))
{
	$module = $_GET['page'];
	//user access area

	//Load Header Template
	get_header();

	if ($module == 'dashboard')
	{
		include('include/dashboard.php');
	}
	elseif($module == 'profile')
	{
		include('include/profile.php');
	}
	elseif($module == 'suite')
	{
		include('include/suite.php');
	}
	elseif($module == 'checkout')
	{
		include('include/checkout.php');
	}
	elseif($module == 'order-proceed')
	{
		include('include/order_proceed.php');
	}
	elseif($module == 'order')
	{
		include('include/orders.php');
	}
	elseif($module == 'feedback')
	{
		include('include/feedback.php');
	}
	elseif($module == 'services')
	{
		include('include/services.php');
	}
	elseif($module == 'facilities')
	{
		include('include/facilities.php');
	}
	elseif($module == 'reviews')
	{
		include('include/reviews.php');
	}
	elseif($module == 'rooms')
	{
		include('include/rooms.php');
	}
	elseif($module == 'users')
	{
		include('include/users.php');
	}
	elseif($module == 'delete')
	{
		include('include/delete.php');
	}
	elseif($module == 'status-update')
	{
		include('include/status.php');
	}

	//Load Footer Template
	get_footer();
	
}else{

	get_header('logout');

	if (isset($_GET['action']) AND $_GET['action'] == 'register') {
		include("include/register.php");
	}
	else {
		include("include/login.php");
	}

	get_footer('logout');
}