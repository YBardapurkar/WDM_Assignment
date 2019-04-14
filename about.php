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
		if ((isset($_SESSION)) && isset($_SESSION['id'])) {
			require 'header_auth.php';
		} else {
			require 'header.php';
		}	
	?>
	<main>
		<div class="banner-top">
			<p>Home <i class="fas fa-arrow-right"></i> About</p>
			<h1>ABOUT US</h1>
		</div>
		<div id="wrapper">
			<div class="about-us-div">
				<div class="about-left">
					<p>ABOUT US</p>
					<h2>Say It Right</h2>
					<p>Is an application for everyone. It is the first step to a good relationship. It is about identity, about the importance of my name, my culture. If you want to, I will help you to Say It Right, so that you can address me correctly.</p>
				</div>
				<figure class="about-right">
					<img src="imgsay/about.png">
					<figcaption></figcaption>
				</figure>
			</div>
		</div>
	</main>
	<?php  
		require 'footer.php';
	?>
</body>
</html>