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
	</header>
	<main>
		<div class="banner-top">
			<p>Home <i class="fas fa-arrow-right"></i> Contact</p>
			<h1>Contact Us</h1>
		</div>
		<div id="wrapper">
			<h2 class="center-heading">Contact Us</h2>
			<form class="contact-us-form">
				<div class="row">
					<div class="column">
						<input type="text" name="contact-first-name" placeholder="Enter First Name">
						<input type="text" name="contact-last-name" placeholder="Enter Last Name">
						<input type="email" name="contact-email" placeholder="Enter Email">
						<input type="contact" name="contact-phone" placeholder="Enter Phone">
					</div>
					<div class="column">
						<textarea rows="3" name="contact-message" placeholder="Enter Message"></textarea>
						<input type="submit" name="contact-submit" value="Submit" class="button-color">
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