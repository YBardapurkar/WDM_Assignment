<?php 
	session_start() 
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
		if ($_SESSION) {
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
			<div class="shop-item-div">
				<div>
					<figure>
						<img src="imgsay/franela1.jpg">
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
				<a class="button-color view-cart" href="place-order.html">Submit</a>
			</div>
		</div>
	</main>
	<?php  
		require 'footer.php';
	?>
</body>
</html>