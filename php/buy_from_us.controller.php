<?php
require 'config.php';
session_start();

if (isset($_POST['add_to_cart_submit'])) {
	$productId = $_POST['productId'];
	$quantity = $_POST['quantity'];

	if (!isset($_SESSION['cart'])) {
		$_SESSION['cart'] = array();
	}

	if (isset($_SESSION['cart'][$productId])) {
		$_SESSION['cart'][$productId] = $_SESSION['cart'][$productId] + $quantity;
	} else {
		$_SESSION['cart'][$productId] = $quantity;
	}

	header("Location: ../buy_from_us.php");
	exit();
}

?>