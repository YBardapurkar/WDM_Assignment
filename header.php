<?php 
	session_start() 
?>

<html>
<head>
	
	<meta charset="utf-8" />
	<title>SayItRight</title>
	<link rel="stylesheet" href="sayitright.css" />
	<script src="js/html5shiv.js"></script>
</head>

<body>
	<header>
		<img src="images/favicon.png" alt="logo" />
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="about.html">About Us</a></li>
				<li><a href="browse.html">Blog</a></li>
				<li><a href="shop.html">Buy from us</a></li>
				<li><a href="contact.html">Contact</a></li>
				<?php 
					if ($_SESSION) {
						echo '<li>
							<form action="includes/logout.inc.php" method="post">
							<button type="submit" name="logout_submit">Logout</button>
							</form>
							</li>';
					} else {
						echo '<li><a href="signup.php">Sign Up</a></li>
							<li><a href="login.php">Login</a></li>';
					}	
				?>
			</ul>
		</nav>
	</header>