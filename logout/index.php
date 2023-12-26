<?php 
session_start();
session_destroy();

if (($_SERVER['HTTP_HOST']) == 'localhost') {
	echo("<script>location.href = '../';</script>");
	die();
}else{
	echo("<script>location.href = '/';</script>");
	die();
}
 ?>
