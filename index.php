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
	<script src="js/newsletter.js"></script>
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
		<div class="banner-home">
			<div class="right">
				<h1>For good communication <span class="red">Say It Right</span> is a tool that you should use.</h1>
				<p>You can see our video tutorial of use with just pressing this button</p>
			</div>
		</div>
		<div class="newsletter banner-bottom">
			<div class="left">
				<h1>Subscribe Our Newsletter</h1>
				<p>We won't send any kind of spam</p>
			</div>
			<form name="newsletter_form" onsubmit="return validateForm();" action="php/newsletter.controller.php" method="post">
				<div>
					<input type="email" name="email">
					<input type="submit" name="newsletter_submit" value="Subscribe">
				</div>
			</form>
		</div>
	</main>
	<?php
		require 'footer.php';
	?>
</body>
</html>
