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
		<div id="wrapper">
			<div class="dashboard-row">
				<div class="dashboard-item-1 blue">
					<div class="top">
						<i class="fas fa-globe-americas"></i>
						<p class="count">26</p>
						<p class="name">activities performed</p>
					</div>
					<div class="bottom">
						<p>Total Made</p>
					</div>
				</div>
				<div class="dashboard-item-1 green">
					<div class="top">
						<i class="fas fa-users"></i>
						<p class="count">18</p>
						<p class="name">activities performed</p>
					</div>
					<div class="bottom">
						<p>Conferences</p>
					</div>
				</div>
				<div class="dashboard-item-1 yellow">
					<div class="top">
						<i class="fas fa-star"></i>
						<p class="count">8</p>
						<p class="name">activities performed</p>
					</div>
					<div class="bottom">
						<p>Events</p>
					</div>
				</div>
				<div class="dashboard-item-1 grey">
					<div class="top">
						<i class="fas fa-trophy"></i>
						<p class="count">14</p>
						<p class="name">activities performed</p>
					</div>
					<div class="bottom">
						<p>Activities</p>
					</div>
				</div>
			</div>

			<div class="dashboard-row">
				<div class="dashboard-item-2 blue">
					<div class="head">
						<p>Header</p>
					</div>
					<div class="body">
						<p>Title card</p>
						<p>Some quick example text to build on the card title and make up the bulk of the card content</p>
					</div>
					<div class="foot"></div>
				</div>
				<div class="dashboard-item-2 grey">
					<div class="head">
						<p>Header</p>
					</div>
					<div class="body">
						<p>Title card</p>
						<p>Some quick example text to build on the card title and make up the bulk of the card content</p>
					</div>
					<div class="foot"></div>
				</div>
				<div class="dashboard-item-2 green">
					<div class="head">
						<p>Header</p>
					</div>
					<div class="body">
						<p>Title card</p>
						<p>Some quick example text to build on the card title and make up the bulk of the card content</p>
					</div>
					<div class="foot"></div>
				</div>
				<div class="dashboard-item-2 red">
					<div class="head">
						<p>Header</p>
					</div>
					<div class="body">
						<p>Title card</p>
						<p>Some quick example text to build on the card title and make up the bulk of the card content</p>
					</div>
					<div class="foot"></div>
				</div>
			</div>

			<div class="dashboard-row">
				<div class="dashboard-item-2 yellow">
					<div class="head">
						<p>Header</p>
					</div>
					<div class="body">
						<p>Title card</p>
						<p>Some quick example text to build on the card title and make up the bulk of the card content</p>
					</div>
					<div class="foot"></div>
				</div>
				<div class="dashboard-item-2 red">
					<div class="head">
						<p>Header</p>
					</div>
					<div class="body">
						<p>Title card</p>
						<p>Some quick example text to build on the card title and make up the bulk of the card content</p>
					</div>
					<div class="foot"></div>
				</div>
				<div class="dashboard-item-2 white">
					<div class="head">
						<p>Header</p>
					</div>
					<div class="body">
						<p>Title card</p>
						<p>Some quick example text to build on the card title and make up the bulk of the card content</p>
					</div>
					<div class="foot"></div>
				</div>
				<div class="dashboard-item-2 black">
					<div class="head">
						<p>Header</p>
					</div>
					<div class="body">
						<p>Title card</p>
						<p>Some quick example text to build on the card title and make up the bulk of the card content</p>
					</div>
					<div class="foot"></div>
				</div>
			</div>
		</div>
	</main>
	<?php  
		require 'footer.php';
	?>
</body>
</html>