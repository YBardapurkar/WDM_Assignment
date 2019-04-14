<?php
	session_start();
	require 'php/validation.php';

	if (isset($_GET)) {
		require 'php/config.php';

		// check if logged in
		$role = $_SESSION['role'];
		if ($role != 'event') {
			header("Location: list_of_my_events.php?error=not_allowed");
			exit();
		}

		$eventId = $_GET['eventId'];

		// fetch event details
		$query = "SELECT * FROM events where events.id = :eventId";
		$stmt = $db->prepare($query);
		$stmt->execute(array(':eventId' => $eventId));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// check if event created by user
		if ($_SESSION['id'] != $row['createdBy']) {
			header("Location: list_of_my_events.php?error=not_allowed");
			exit();
		}
	}
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
		<div id="wrapper" class="signup-div">
			<h2 class="center-heading">Edit Event</h2>
			<form class="contact-us-form" name="event_edit_form" action="php/events.controller.php" method="post"
			<?php 
			if (!$htmlValidate) { echo ' novalidate'; }
			if ($jsValidate) { echo ' onsubmit="return validateForm();"'; } 
			?> >
				<div class="row">
					<div class="column">
						<input type="hidden" name="eventId" value="<?php echo $row['id']; ?>">
						<input type="text" name="eventName" placeholder="Enter Event Name"
						value="<?php echo $row['name']; ?>" required>
						<input type="text" name="eventDate" placeholder="Enter Event Date"
						value="<?php echo $row['eventDate']; ?>" required>
						<input type="text" name="eventVenue" placeholder="Enter Event Venue"
						value="<?php echo $row['venue']; ?>" required>
					</div>
					<div class="column">
						<textarea rows="3" name="eventDescription" placeholder="Enter Description"
						value="<?php echo $row['description']; ?>" required></textarea>
						<input type="submit" name="event_edit_submit" value="Submit" class="button-color">
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