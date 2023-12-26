<?php 

$order_no = rand();
$suite_id = (int) $_POST['suite_id'];
$room_no = get_free_room( $suite_id );
$aditional_id = $_POST['aditional'];
$guest = (int) $_POST['guests'];
$total_cost = (int) $_POST['subtotal'];
$check_in = $_POST['check_in'];
$check_out = $_POST['check_out'];
$status = 0;
$account_no = null;

if (isset($_POST['mbank_payment'])) {
	$account_no = $_POST['mbank_number'];
	$status = 1;

	if (isset($_POST['bKash'])) {
		$payment_method = "bKash";
	}
	elseif (isset($_POST['Nagad'])) {
		$payment_method = "Nagad";
	}
	elseif (isset($_POST['Rocket'])) {
		$payment_method = "Rocket";
	}

	change_room_status( $room_no );

}
elseif (isset($_POST['card_payment'])) {
	$account_no = $_POST['card_number'];
	$payment_method = "Card";
	$status = 1;

	change_room_status( $room_no );
}
elseif (isset($_POST['cash_payment'])) {
	$account_no = $_POST['cash_ref'];
	$payment_method = "Cash";
	$status = 0;
}

add_order( $order_no, $suite_id, $room_no, $aditional_id, $guest, $total_cost, $check_in, $check_out, $payment_method, $account_no, $status );