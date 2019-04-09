<?php
	session_start();
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
		<div id="wrapper" class="signup-div">
			<h2 class="center-heading">Add New Event</h2>
			<form class="contact-us-form" name="event_add_form" action="php/events.controller.php" method="post">
				<div class="row">
					<div class="column">
						<input type="text" name="eventName" placeholder="Enter Event Name">
						<input type="text" name="eventDate" placeholder="Enter Event Date">
						<input type="text" name="eventVenue" placeholder="Enter Event Venue">
					</div>
					<div class="column">
						<textarea rows="3" name="eventDescription" placeholder="Enter Description"></textarea>
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