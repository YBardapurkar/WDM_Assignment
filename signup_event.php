<?php 
	session_start();
	require 'php/validation.php';
?>

<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SayItRight</title>
	<link rel="stylesheet" href="css/sayitright.css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="shortcut icon" href="imgsay/favicon.png"/>
	<script src="js/signup_event.js"></script>
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
		<div class="banner-top">
			<p>Home <i class="fas fa-arrow-right"></i> SIGN UP</p>
			<h1>SIGN UP</h1>
		</div>
		<div id="wrapper" class="signup-div">
			<form class="signup-form" name="signup_event_form" action="php/signup_event.controller.php" method="post"
			<?php 
			if (!$htmlValidate) { echo ' novalidate'; }
			if ($jsValidate) { echo ' onsubmit="return validateForm();"'; } 
			?> >
				<h2 class="center-heading">Select the type of user</h2>
				<ul class="user-type">
					<li>
						<a class="button-color" href="signup_individual.php">Individual</a>
					</li>
					<li>
						<a class="button-color" href="signup_event.php">Event</a>
					</li>
					<li>
						<a class="button-color" href="signup_business.php">Business</a>
					</li>
				</ul>
				<p class="center-text">Welcome to the Event registration</p>
				<input type="text" name="firstName" placeholder="Enter First Name" required>
				<input type="text" name="lastName" placeholder="Enter Last Name" required>
				<input type="email" name="email" placeholder="Enter Email" required>
				<input type="password" name="password" placeholder="Enter Password" required>
				<input type="submit" name="signup_event_submit" value="Send" class="button-color">
			</form>
		</div>
	</main>
	<?php  
		require 'footer.php';
	?>
</body>
</html>