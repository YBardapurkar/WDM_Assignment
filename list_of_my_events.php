<?php
	session_start();

	require 'php/config.php';

	if (isset($_GET)) {

		// check if session exists
		$id = $_SESSION['id'];
		if ($id == null) {
			header("Location: login.php?error=auth");
			exit();
		}

		// get all events created by the event user
		if ($_SESSION['role'] == 'event') {
			$query = "SELECT * FROM events where events.createdBy = :createdBy";
			$stmt = $db->prepare($query);
			$stmt->execute(array(':createdBy' => $id));
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		// get all events confirmed by the individual user
		else if ($_SESSION['role'] == 'individual') {
			$query = "SELECT * FROM userevents inner join events on events.id = userevents.eventId where userevents.userId = :userId";
			$stmt = $db->prepare($query);
			$stmt->execute(array(':userId' => $id));
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		else {
			$rows = array();
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
		<div id="wrapper">
			<h2>List of My Events</h2>
			<?php
				$numEvents = count($rows, COUNT_NORMAL);
				if ($numEvents > 0) {
					echo '<table class="list-of-events">
						<thead>
							<tr>
								<th>Events</th>
								<th class="column-description">Description</th>
								<th>Date</th>
								<th>City</th>
								<th>Confirmation</th>
							</tr>
						</thead>
						<tfoot></tfoot>
						<tbody>';
					foreach ($rows as $row) {
						echo '<tr>';
						echo '<td>'.$row['name'].'</td>';
						echo '<td>'.$row['description'].'</td>';
						$date = date_create($row['eventDate']);
						echo '<td>'.date_format($date,"d M, Y").'</td>';
						echo '<td>'.$row['venue'].'</td>';
						if ($_SESSION['role'] == 'individual') {
							echo '<td>
								<form action="php/events.controller.php" method="post">
									<input type="hidden" name="eventId" value="'.$row['id'].'" />
									<button class="button-color" type="submit" name="remove_from_my_events_submit">Remove</button>
								</form>
							</td>';
						} else if ($_SESSION['role'] == 'event') {
							echo '<td>
								<form action="php/events.controller.php" method="post">
									<input type="hidden" name="eventId" value="'.$row['id'].'" />
									<button class="button-color" type="submit" name="modify_event_submit">Edit</button>
								</form>
							</td>';
						}
						echo '</tr>';
					}
					echo '</tbody>
					</table>';
				} else {
					echo "No events found";
				}
				echo '<a class="button-color add-new-event" href="event.php">Add new Event</a>';
			?>
		</div>
	</main>
	<?php
		require 'footer.php';
	?>
</body>
</html>
