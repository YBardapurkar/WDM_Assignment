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
	<script type="text/javascript" src="js/event_add.js"></script>
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
		<div id="wrapper" class="signup-div">
			<h2 class="center-heading">Add New Event</h2>
			<form class="contact-us-form" name="event_add_form" action="php/events.controller.php" method="post"
			<?php 
			if (!$htmlValidate) { echo ' novalidate'; }
			if ($jsValidate) { echo ' onsubmit="return validateForm();"'; } 
			?> >
				<div class="row">
					<div class="column">
						<input type="text" name="eventName" placeholder="Enter Event Name" required>
						<input type="text" name="eventDate" placeholder="Enter Event Date" required>
						<input type="text" name="eventVenue" placeholder="Enter Event Venue" required>
					</div>
					<div class="column">
						<textarea rows="3" name="eventDescription" placeholder="Enter Description" required></textarea>
						<input type="submit" name="event_add_submit" value="Submit" class="button-color">
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