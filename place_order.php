<?php 
	session_start();
	require 'php/validation.php';
	require 'php/config.php';

	if (isset($_GET)) {

		// check if cart is set
		if (isset($_SESSION['cart'])) {
			$cart = $_SESSION['cart'];
			$numProducts = count($cart, COUNT_NORMAL);
		} else {
			$cart = array();
		}
		$rows = array();
		$totalPrice = 0;

		// get product details
		foreach ($cart as $id => $quantity) {
			$query = "SELECT * FROM products where products.id = :id";
			$stmt = $db->prepare($query);
			$stmt->execute(array(':id' => $id));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			$cart[$id] = array();
			$cart[$id]['id'] = $id;
			$cart[$id]['product'] = $row;
			$rows['product'] = $row;
			$cart[$id]['quantity'] = $quantity;

			$totalPrice += ($cart[$id]['quantity'] * $row['price']);
		}
	}
?>

<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SayItRight</title>
	<link rel="stylesheet" href="css/sayitright.css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="shortcut icon" href="imgsay/favicon.png"/>
	<script src="js/place_order.js"></script>
</head>

<body>
	<?php
		if ((isset($_SESSION)) && isset($_SESSION['id'])) {
			if ($_SESSION['role'] == 'business') {
				require 'header_business.php';
			} else {
				require 'header_auth.php';
			}
		} else {
			require 'header.php';
		}
	?>
	<main>
		<div id="wrapper" class="place-order">
			<h2 class="center-heading">Place Order</h2>
			<form class="place-order-form" name="place_order_form" action="php/place_order.controller.php" method="post"
			<?php 
			if (!$htmlValidate) { echo ' novalidate'; }
			if ($jsValidate) { echo ' onsubmit="return validateForm();"'; } 
			?> >
				<div class="row">
					<div class="column">
						<h3>Contact Information</h3>
						<input type="email" name="email" placeholder="Enter Email" required>
						<h3>Shipping Address</h3>
						<input class="half" type="text" name="firstName" placeholder="Enter First Name" required>
						<input class="half" type="text" name="lastName" placeholder="Enter Last Name" required>

						<input type="text" name="address" placeholder="Enter Address" required>
						<input type="text" name="apartment" placeholder="Enter Apartment, Suite etc">
						<input type="text" class="half" name="city" placeholder="Enter City" required>
						<input type="text" class="half" name="state" placeholder="Enter State" required>

						<select class="half" name="language" required>
							<option value="english" selected>English</option>
							<option value="spanish">Spanish</option>
						</select>
						<input class="half" type="text" name="zip" placeholder="Enter Postal Code" required>

						<input type="submit" name="place_order_submit" value="Place Order" class="button-color">
					</div>
					<div class="column">
						<table class="cart-table">
							<thead>
								<tr>
									<th> </th>
									<th>Name</th>
									<th>Units</th>
									<th>Price</th>
								</tr>
							</thead>
							<tfoot>
								<td colspan="3">Total</td>
								<td>$<?php echo $totalPrice ?></td>
							</tfoot>
							<tbody>
								<?php
								foreach ($cart as $row) {
									echo '<tr>
										<td>
											<figure>
												<img src="'.$row['product']['imageUrl'].'">
												<figcaption></figcaption>
											</figure>
										</td>
										<td>'.$row['product']['name'].'</td>
										<td>'.$row['quantity'].'</td>
										<td>'.$row['product']['price']*$row['quantity'].'</td>
									</tr>';
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</form>
		</div>
	</main>
	<?php  
		require 'footer.php';
	?>
</body>
</html>