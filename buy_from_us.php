<?php 
	session_start();

	require 'php/config.php';

	if (isset($_GET)) {

		// get all products
		$query = "SELECT * FROM products";
		$stmt = $db->prepare($query);
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	function createModal($row) {
		require 'buy_from_us_modal.php';
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
</head>

<body>
	<?php
		if ((isset($_SESSION)) && isset($_SESSION['id'])) {
			require 'header_auth.php';
		} else {
			require 'header.php';
		}	
	?>
	<main>
		<div class="banner-top">
			<p>Home <i class="fas fa-arrow-right"></i> Buy From Us</p>
			<h1>Buy From Us</h1>
		</div>
		<div id="wrapper">
			<h2 class="center-heading">Buy From Us</h2>
			<?php
			$numProducts = count($rows, COUNT_NORMAL);
			if ($numProducts > 0) {
				foreach ($rows as $row) {
					echo '<div class="shop-item-div">';
					echo '<div>';
					echo '<figure>';
					echo '<img src="'.$row['imageUrl'].'">';
					echo '<figcaption>'.$row['name'].'</figcaption>';
					echo '</figure>';
					echo '<p>$'.$row['price'].'</p>';
					echo '<p>'.$row['description'].'</p>';
					echo '<button onclick="openModal(\'modal-product-photo-'.$row['id'].'\')">Add To Cart</button>';
					echo '</div>';
					createModal($row);
					echo '</div>';
				}
			} else {
				echo "<div>No products found</div>";
			}
			?>
			<div class="shop-item-div">
				<div>
					<figure>
						<img src="imgsay/franela1.jpg">
						<figcaption></figcaption>
					</figure>
					<p>$24.99</p>
					<p>Some quick example text to build on the card title and make up the bulk of the card 	content</p>
					<button>Add To Cart</button>
				</div>
			</div>
			<div class="shop-item-div">
				<div>
					<figure>
						<img src="imgsay/taza1.png">
						<figcaption></figcaption>
					</figure>
					<p>$24.99</p>
					<p>Some quick example text to build on the card title and make up the bulk of the card content</p>
					<button>Add To Cart</button>
				</div>
			</div>
			<div class="shop-item-div">
				<div>
					<figure>
						<img src="imgsay/franela2.jpg">
						<figcaption></figcaption>
					</figure>
					<p>$24.99</p>
					<p>Some quick example text to build on the card title and make up the bulk of the card content</p>
					<button>Add To Cart</button>
				</div>
			</div>
			<div class="shop-item-div">
				<div>
					<figure>
						<img src="imgsay/taza2.png">
						<figcaption></figcaption>
					</figure>
					<p>$24.99</p>
					<p>Some quick example text to build on the card title and make up the bulk of the card content</p>
					<button>Add To Cart</button>
				</div>

			</div>
			<div class="shop-item-div">
				<div>
					<figure>
						<img src="imgsay/franela3.jpg">
						<figcaption></figcaption>
					</figure>
					<p>$24.99</p>
					<p>Some quick example text to build on the card title and make up the bulk of the card content</p>
					<button>Add To Cart</button>
				</div>
				
			</div>
			<div class="shop-item-div">
				<div>
					<figure>
						<img src="imgsay/taza3.png">
						<figcaption></figcaption>
					</figure>
					<p>$24.99</p>
					<p>Some quick example text to build on the card title and make up the bulk of the card content</p>
					<button>Add To Cart</button>
				</div>
			</div>
		</div>

		<div class="banner-bottom">
			<div class="left">
				<h2>View Shopping Cart</h2>
				<p>You can see the products that you added to your cart</p>
			</div>
			<div class="view-cart-div">
				<a class="button-color view-cart" href="place_order.php">Submit</a>';
			</div>
		</div>
	</main>
	<?php  
		require 'footer.php';
	?>
	
	<script type="text/javascript" src="js/buy_from_us.js"></script>
</body>
</html>