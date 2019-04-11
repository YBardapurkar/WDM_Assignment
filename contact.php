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
	<script type="text/javascript" src="js/contact.js"></script>
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
			<form class="contact-us-form" name="contact_form" action="php/contact.controller.php" method="post" onsubmit="return validateForm();" novalidate>
				<div class="row">
					<div class="column">
						<input type="text" name="firstName" placeholder="Enter First Name" required>
						<input type="text" name="lastName" placeholder="Enter Last Name" required>
						<input type="email" name="email" placeholder="Enter Email" required>
						<input type="tel" name="phone" placeholder="Enter Phone" pattern="^[0-9]{10}$">
					</div>
					<div class="column">
						<textarea rows="3" maxlength='255' name="message" placeholder="Enter Message" required>
						</textarea>
						<input type="submit" name="contact_submit" value="Submit" class="button-color">
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