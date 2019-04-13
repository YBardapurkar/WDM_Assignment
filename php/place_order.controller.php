<?php
	require 'config.php';
	session_start();

	// place order
	if (isset($_POST['place_order_submit'])) {
		$email = $_POST['email'];
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$address = $_POST['address'];
		$apartment = $_POST['apartment'];
		$language = $_POST['language'];
		$state = $_POST['state'];
		$zip = $_POST['zip'];

		print_r($_POST);

		// add to orders table
		try {
			$db->beginTransaction();
			$query = 'INSERT INTO orders (firstName, lastName, email, amount, address, apartment, language, city, state, zip) VALUES (:firstName, :lastName, :email, :amount, :address, :apartment, :language, :city, :state, :zip)';
			$stmt = $db->prepare($query);
			$stmt->execute(array(':firstName' => $firstName, ':lastName' => $lastName, ':email' => $email, ':amount' => 0, ':address' => $address, ':apartment' => $apartment, ':language' => $language, ':city' => "city", ':state' => $state, ':zip' => $zip));

			// get id of order
			$orderId = $db->lastInsertId();
			echo $orderId;
			echo '<br>';

			// check if cart is setcookie(name)
			if (isset($_SESSION['cart'])) {
				$cart = $_SESSION['cart'];
				$numProducts = count($cart, COUNT_NORMAL);
			} else {
				$cart = array();
			}
			$totalPrice = 0;

			// get product details
			foreach ($cart as $id => $quantity) {
				// get individual products details
				$query = "SELECT * FROM products where products.id = :id";
				$stmt = $db->prepare($query);
				$stmt->execute(array(':id' => $id));
				$row = $stmt->fetch(PDO::FETCH_ASSOC);

				$totalPrice += ($quantity * $row['price']);

				// add to orderitems table
				$query = "INSERT INTO orderitems(orderId, itemName, itemImage, itemPrice, itemQuantity) VALUES (:orderId, :itemName, :itemImage, :itemPrice, :itemQuantity)";
				$stmt = $db->prepare($query);
				$stmt->execute(array(':orderId' => $orderId, ':itemName' => $row['name'], ':itemImage' => $row['imageUrl'], ':itemPrice' => $row['price'], ':itemQuantity' => $quantity));
			}

			// add total price
			$query = 'UPDATE orders SET amount = :amount WHERE id = :orderId;';
			$stmt = $db->prepare($query);
			$stmt->execute(array(':amount' => $totalPrice, ':orderId' => $orderId));

			$db->commit();
		} catch(Exception $e){
		    echo $e->getMessage();
			$db->rollBack();
		}

		$_SESSION['cart'] = null;
		

		// header("Location: ../buy_from_us.php?order=success");
		exit();
	}

?>