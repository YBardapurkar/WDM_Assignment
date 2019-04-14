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
	<script src="js/login.js"></script>
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
			<p>Home <i class="fas fa-arrow-right"></i> LOGIN</p>
			<h1>Login</h1>
		</div>
		<div id="wrapper" class="login">
			<form class="login-form" name="login_form" action="php/login.controller.php" method="post"
			<?php 
			if (!$htmlValidate) { echo ' novalidate'; }
			if ($jsValidate) { echo ' onsubmit="return validateForm();"'; } 
			?> >
				<div>
					<input type="email" name="email" placeholder="Enter Email" required>
					<input type="password" name="password" placeholder="Enter Password" required>

					<input type="submit" name="login_submit" value="Submit" class="button-color">
				</div>
			</form>
		</div>
	</main>
	<?php  
		require 'footer.php';
	?>
</body>
</html>