<?php 

//Check Duplicate Valus
function check_duplicate($tab,$field,$value) //$tab: table name; $fild: table field
{
	$conn = $GLOBALS['conn'];
	$stmt = $conn->prepare("SELECT * FROM user WHERE email = '$value'");
	$stmt->execute();
	$result = $stmt->rowCount();

	if ( $result > 0) {
		return true;
	}else{
		return false;
	}
	
}

//Get Header File
function get_header( $arg = "main" ) {
	if ( $arg == 'main') {
		include('include/header.php');
	}
	elseif ( $arg == 'logout' ) {
		include('include/header_logout.php');
	}
}

//Get Footer File
function get_footer( $arg = "main" ) {
	if ( $arg == 'main') {
		include('include/footer.php');
	}
	elseif ( $arg == 'logout' ) {
		include('include/footer_logout.php');
	}
}

//Get Database Table Name
function get_table_name( $arg ) {
	switch ($arg) {
		case 'services':
			$table = 'additional_services';
			break;
		case 'facilitie':
			$table = 'facilities';
			break;
		case 'feedback':
			$table = 'feedback';
			break;
		case 'order':
			$table = '`order`';
			break;
		case 'suite':
			$table = 'suite';
			break;
		case 'users':
			$table = 'user';
			break;
		case 'room':
			$table = 'rooms';
			break;
		
		default:
			$table = null;
			break;
	}

	return $table;
}

//Get page title
function get_page_title( $arg = null ) {
	$page = ( isset( $arg ) ? $arg : filter_var($_GET['page'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH) );
	$name = null;

	if ($page == 'dashboard')
	{
		$name = "Dashboard";
	}
	elseif ($page == 'checkout')
	{
		$name = "Checkout";
	}
	elseif ($page == 'checkout')
	{
		$name = "Checkout";
	}
	elseif ($page == 'profile')
	{
		$name = "Profile";
	}
	elseif ($page == 'feedback')
	{
		$name = "Feedback List";
	}
	elseif ($page == 'services')
	{
		$name = "Aditional Services";
	}
	elseif ($page == 'rooms')
	{
		$name = "Rooms List";
	}
	elseif ($page == 'facilities')
	{
		$name = "Facilities";
	}
	elseif ($page == 'reviews')
	{
		$name = "Reviews";
	}
	elseif ($page == 'order')
	{
		$name = "Order List";
	}

	echo $name;
}

//Get page permalink
function get_page_permalink( $arg = null, $id = false, $table = false ) {
	$page = ( isset( $arg ) ? $arg : filter_var($_GET['page'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH) );
	$url = null;

	if ($page == 'dashboard')
	{
		$url = "/?page=dashboard";
	}
	elseif ($page == 'checkout')
	{
		$url = "/?page=checkout";
	}
	elseif ($page == 'order-proceed')
	{
		$url = "/?page=order-proceed";
	}
	elseif ($page == 'order')
	{
		$url = "/?page=order";
	}
	elseif ($page == 'profile')
	{
		$url = "/?page=profile";
	}
	elseif ($page == 'services')
	{
		$url = "/?page=services";
	}
	elseif ($page == 'facilities')
	{
		$url = "/?page=facilities";
	}
	elseif ($page == 'feedback')
	{
		$url = "/?page=feedback";
	}
	elseif ($page == 'reviews')
	{
		$url = "/?page=reviews";
	}
	elseif ($page == 'users')
	{
		$url = "/?page=users";
	}
	elseif ($page == 'room')
	{
		$url = "/?page=rooms";
	}
	elseif ($page == 'suite')
	{
		$url = "/?page=suite";
	}
	elseif ($page == 'suite-add')
	{
		$url = "/?page=suite&action=add-new";
	}
	elseif ($page == 'room-add')
	{
		$url = "/?page=rooms";
	}
	elseif ($page == 'single-suite')
	{
		$url = "/?page=suite&id=";
	}
	elseif ($page == 'delete')
	{
		$url = "/?page=delete&from=". $table ."&id=". $id;
	}
	elseif ($page == 'status-update')
	{
		$url = "/?page=status-update&from=". $table ."&id=". $id;
	}
	else{
		$url = '#';
	}

	echo SITE_URL.$url;
}

//Get current page permalink
function get_current_page_permalink() {

	if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
		$link = "https";
	else
		$link = "http";

	$link .= "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	
	return $link;
}

//Get Suite or Room or other post permalink
function get_permalink( $arg = null ) {
	$page = ( isset( $arg ) ? $arg : filter_var($_GET['page'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH) );
	$url = null;

	if ($page == 'suite')
	{
		$url = "/?page=suite&id=";
	}
	elseif ($page == 'suite-edit')
	{
		$url = "/?page=suite&action=edit&id=";
	}
	else{
		$url = '#';
	}

	return SITE_URL.$url;
}

//Get all row data from database
/**
* *USE THIS LOOP FOC DISPLAY DATA **
* 
* $stmt = get_row( 'TABLE_NAME' );
while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
echo $row['TABLE_COL'] . ", " . $row['TABLE_COL'] . "<br>";
}

* */

function get_row( $table, $order_by = false ) {	
	$conn = $GLOBALS['conn'];
	if ($order_by == false) {
		$stmt = $conn->prepare("SELECT * FROM $table");
	} else {
		$stmt = $conn->prepare("SELECT * FROM $table ORDER BY $order_by");
	}
	$stmt->execute();
	return $stmt;
}

//Delete Single Row Information from database table
function delete_row( $table = false, $id = false ) {
	if (!is_admin()) {
		return;
	}

	$table_name = get_table_name( $table );

	$conn = $GLOBALS['conn'];
	$stmt = $conn->prepare("DELETE FROM $table_name WHERE id = $id");
	$stmt->execute();

	echo("<script>location.href = '".SITE_URL."';</script>");
	die();
}

//Update single row Status value from database
function update_status( $table = false, $id = false, $status ) {
	if (!is_admin()) {
		return;
	}

	$table_name = get_table_name( $table );

	$conn = $GLOBALS['conn'];
	$stmt = $conn->prepare("UPDATE $table_name SET status = $status WHERE id = $id");
	$stmt->execute();

	echo("<script>location.href = '".SITE_URL."';</script>");
	die();
}

/*****************************************************************************************************************************************************/


/************************************************************* USER ******************************************************************/

//Reegister New User
function register_user( $email, $name, $pass, $phone, $address ) {
	$conn = $GLOBALS['conn'];
	$stmt = $conn->prepare("INSERT INTO user (email, name, password, phone, address) VALUES('$email', '$name', '$pass', '$phone', '$address')");
	$stmt->execute();

	echo("<script>location.href = '".SITE_URL."';</script>");
	die();
}
//Reegister New User
function update_user( $name, $phone, $address, $country, $post_code, $pass = false ) {
	$conn = $GLOBALS['conn'];
	$id = $_SESSION['id'];
	$redirect_to = get_current_page_permalink();

	if ($pass == false) {
		$stmt = $conn->prepare("UPDATE user SET name = '$name', phone = '$phone', address = '$address', country = '$country', postal = $post_code WHERE id = $id");
		$stmt->execute();
	} else {
		$stmt = $conn->prepare("UPDATE user SET name = '$name', phone = '$phone', password = '$pass', address = '$address', country = '$country', postal = $post_code WHERE id = $id");
		$stmt->execute();
	}

	echo("<script>location.href = '".$redirect_to."';</script>");
	die();
}

//Delete Information
function delete_user_info($id) {

	$conn = $GLOBALS['conn'];
	$stmt = $conn->prepare("DELETE FROM user WHERE id = $id");
	$stmt->execute();

	echo("<script>location.href = '".SITE_URL."';</script>");
	die();
}

//Check Login
function check_login( $email, $pass ) {
	$conn = $GLOBALS['conn'];
	$stmt = $conn->prepare("SELECT * FROM user WHERE password='$pass' AND email='$email'");
	$stmt->execute();
	$result = $stmt->rowCount();

	if ( $result == 1 ) {
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
		{
			$_SESSION['id'] = (int)$row['id'];
		}
		echo("<script>location.href = '".SITE_URL."/?page=dashboard';</script>");
		die();
	}
	return false;
}

//Check current user role
function is_admin() {
	$id = $_SESSION['id'];

	if ($id == 1) {
		return true;
	}

	return false;
}

//Get single field value in DB
function get_single_value( $tab,$field) {
	$id = $_SESSION['id'];
	$conn = $GLOBALS['conn'];
	$stmt = $conn->prepare("SELECT $field FROM $tab WHERE id = $id");
	$stmt->execute();

	return sprintf($stmt->fetchColumn());

	/*$count = $stmt->rowCount();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$result = $row[$field];
		return $result;
	}*/
}

//Get Current User Name
function get_user_name( $id = false ) {
	$conn = $GLOBALS['conn'];
	if($id == false)
	{
		$id = $_SESSION['id'];
	}else{
		$id = (int) $id;
	}

	$stmt = $conn->prepare("SELECT name FROM user WHERE id = $id");
	$stmt->execute();

	echo sprintf($stmt->fetchColumn());
}

//Get Current User Image
function get_user_image() {
	/*$id = $_SESSION['id'];
	$conn = $GLOBALS['conn'];

	$stmt = $conn->prepare("SELECT name FROM user WHERE id = $id");
	$stmt->execute();

	echo sprintf($stmt->fetchColumn());*/

	echo "https://picsum.photos/1000/";
}

//Get user meta
function get_user_meta($id = false) {
	if($id == false)
	{
		$id = $_SESSION['id'];
	}else{
		$id = (int) $id;
	}
	//$id = $_SESSION['id'];
	
	$conn = $GLOBALS['conn'];
	$stmt = $conn->prepare("SELECT * FROM user WHERE id = $id");
	$stmt->execute();
	$result = $stmt->fetchAll();
	$result = array_shift($result);

	return $result;
}

//Get all user meta list
function get_user_list() {	
	$conn = $GLOBALS['conn'];
	$stmt = $conn->prepare("SELECT * FROM user");
	$stmt->execute();	
	return $stmt;
}

//Count total user
function get_total_user_count() {	
	$conn = $GLOBALS['conn'];
	$stmt = $conn->prepare("SELECT id FROM user");
	$stmt->execute();
	$count = $stmt->rowCount();

	echo sprintf($count);
}


/************************************** Rooms ****************************************/
//Add New Feedback
function add_room( $no, $type ) {
	if (!is_admin()) {
		return;
	}

	$conn = $GLOBALS['conn'];
	$redirect_to = get_current_page_permalink();

	$stmt = $conn->prepare("INSERT INTO rooms (room_no, type, status) VALUES('$no', $type, 1)");
	$stmt->execute();

	echo("<script>location.href = '".$redirect_to."';</script>");
	die();
}

//Get Room Title
function get_room_title( $id ) {
	$conn = $GLOBALS['conn'];

	$stmt = $conn->prepare("SELECT room_no FROM rooms WHERE id=$id");
	$stmt->execute();

	echo sprintf($stmt->fetchColumn());
}

//Get UnBook Room
function get_free_room( $suite_id ) {
	$conn = $GLOBALS['conn'];

	$stmt = $conn->prepare("SELECT id FROM rooms WHERE status=1 AND type=$suite_id LIMIT 1");
	$stmt->execute();

	return $stmt->fetchColumn();
}
//Get UnBook Room
function change_room_status( $id ) {
	$conn = $GLOBALS['conn'];

	$stmt = $conn->prepare("UPDATE rooms SET status=0 WHERE id=$id");
	$stmt->execute();

	return;
}

/************************************** Aditional Services ****************************************/
//Add New Feedback
function add_services( $title, $price ) {
	if (!is_admin()) {
		return;
	}

	$conn = $GLOBALS['conn'];
	$redirect_to = get_current_page_permalink();

	$stmt = $conn->prepare("INSERT INTO additional_services (title, price) VALUES('$title', $price)");
	$stmt->execute();

	echo("<script>location.href = '".$redirect_to."';</script>");
	die();
}

/************************************** Facilities ****************************************/
//Add New Feedback
function add_facilitie( $title ) {
	if (!is_admin()) {
		return;
	}

	$conn = $GLOBALS['conn'];
	$redirect_to = get_current_page_permalink();

	$stmt = $conn->prepare("INSERT INTO facilities (title) VALUES('$title')");
	$stmt->execute();

	echo("<script>location.href = '".$redirect_to."';</script>");
	die();
}

/************************************** Feedback ****************************************/
//Add New Feedback
function add_feedback( $comment ) {

	$conn = $GLOBALS['conn'];
	$user_id = $_SESSION['id'];
	$redirect_to = get_current_page_permalink();

	$stmt = $conn->prepare("INSERT INTO feedback (comment, user_id) VALUES('$comment', '$user_id')");
	$stmt->execute();

	echo("<script>location.href = '".$redirect_to."';</script>");
	die();
}

/************************************** Reviews ****************************************/
//Add New Feedback
function add_review( $comment, $arg ) {

	$conn = $GLOBALS['conn'];
	$user_id = intval($_SESSION['id']);
	$redirect_to = get_current_page_permalink();

	$stmt = $conn->prepare("INSERT INTO reviews (comment, star, user_id) VALUES('$comment', $arg, $user_id)");
	$stmt->execute();

	echo("<script>location.href = '".$redirect_to."';</script>");
	die();
}


/************************************** Orders ****************************************/
//Add New Order
function add_order( $order_no, $suite_id, $room_no, $aditional_id, $guest, $total_cost, $check_in, $check_out, $payment_method, $account_no, $status ) {

	$conn = $GLOBALS['conn'];
	$user_id = $_SESSION['id'];


	$check_in = date('Y-m-d', strtotime($_POST['check_in']));
	$check_out = date('Y-m-d', strtotime($_POST['check_out']));

	$stmt = $conn->prepare("INSERT INTO `order`(order_no, suite_id, user_id, room_no, aditional_id, guest, total_cost, check_in, check_out, payment_method, account_no, status) VALUES ('$order_no', '$suite_id', '$user_id', '$room_no', '$aditional_id', '$guest', '$total_cost', '$check_in', '$check_out', '$payment_method', '$account_no', '$status')");
	$stmt->execute();

	echo("<script>location.href = '".SITE_URL."';</script>");
	die();
}

//Get Order List
function get_orders( $arg = false) {	
	$conn = $GLOBALS['conn'];
	$id = $_SESSION['id'];

	if (is_admin()) {
		$stmt = $conn->prepare("SELECT * FROM `order` ORDER BY id DESC $arg");
		$stmt->execute();
	} else {
		$stmt = $conn->prepare("SELECT * FROM `order` WHERE user_id=$id ORDER BY id DESC");
		$stmt->execute();
	}

	return $stmt;
}

//Count total painding order
function get_painding_order_count() {	
	$conn = $GLOBALS['conn'];
	$stmt = $conn->prepare("SELECT id FROM `order` WHERE status=0");
	$stmt->execute();
	$count = $stmt->rowCount();

	echo sprintf($count);
}

//Count total sale sum
function get_total_sale() {	
	$conn = $GLOBALS['conn'];

	$stmt = $conn->prepare("SELECT SUM(total_cost) FROM `order` WHERE status=1");
	$stmt->execute();

	echo sprintf($stmt->fetchColumn());
}

/************************************** Aditionals Services ****************************************/
//Get all Facilities list
function get_additional_services_list() {	
	$conn = $GLOBALS['conn'];
	$stmt = $conn->prepare("SELECT * FROM additional_services");
	$stmt->execute();	
	return $stmt;
}

//Get Faciliti data
function get_additional_services($id) {
	$id = (int) $id;
	
	$conn = $GLOBALS['conn'];
	$stmt = $conn->prepare("SELECT * FROM additional_services WHERE id = '$id'");
	$stmt->execute();
	$result = $stmt->fetchAll();
	$result = array_shift($result);

	return $result;
}

/************************************** Facilities ****************************************/
//Get all Facilities list
function get_facilities_list() {	
	$conn = $GLOBALS['conn'];
	$stmt = $conn->prepare("SELECT * FROM facilities");
	$stmt->execute();	
	return $stmt;
}

//Get Faciliti data
function get_facilities($id) {
	$id = (int) $id;
	
	$conn = $GLOBALS['conn'];
	$stmt = $conn->prepare("SELECT * FROM facilities WHERE id = '$id'");
	$stmt->execute();
	$result = $stmt->fetchAll();
	$result = array_shift($result);

	return $result;
}


/************************************** Suite ****************************************/
//Add New Suite
function add_suite( $title, $price, $description, $area, $beads, $bathroom, $facilities, $image ) {

	if (!is_admin()) {
		return;
	}

	$conn = $GLOBALS['conn'];
	$stmt = $conn->prepare("INSERT INTO suite (title, price, description, area, beads, bathroom, facilities, image) VALUES('$title', '$price', '$description', '$area', '$beads', '$bathroom', '$facilities', '$image')");
	$stmt->execute();

	echo("<script>location.href = '".SITE_URL."';</script>");
	die();
}

//Update New Suite
function update_suite( $id, $title, $price, $description, $area, $beads, $bathroom, $facilities, $image ) {

	if (!is_admin()) {
		return;
	}

	$conn = $GLOBALS['conn'];
	$stmt = $conn->prepare("UPDATE suite SET title='$title', price='$price', description='$description', area='$area', beads='$beads', bathroom='$bathroom', facilities='$facilities', image='$image' WHERE id = $id");
	$stmt->execute();

	echo("<script>location.href = '".SITE_URL."';</script>");
	die();
}

//Get single suite data
function get_single_suite($id = false) {
	if($id == false)
	{
		$id = intval($_GET['id']);
	}else{
		$id = (int) $id;
	}
	
	$conn = $GLOBALS['conn'];
	$stmt = $conn->prepare("SELECT * FROM suite WHERE id = '$id'");
	$stmt->execute();
	$result = $stmt->fetchAll();
	$result = array_shift($result);

	return $result;
}

//Get Suite Title
function get_suite_title( $id = false ) {
	$conn = $GLOBALS['conn'];
	if($id == false)
	{
		$id = $_SESSION['id'];
	}else{
		$id = (int) $id;
	}

	$stmt = $conn->prepare("SELECT title FROM suite WHERE id = $id");
	$stmt->execute();

	echo sprintf($stmt->fetchColumn());
}
//Get all suite list
function get_suite_list() {	
	$conn = $GLOBALS['conn'];
	$stmt = $conn->prepare("SELECT * FROM suite ORDER BY price DESC");
	$stmt->execute();	
	return $stmt;
}