<?php

require 'config.php';
session_start();

// create new event, for events user
if (isset($_POST['event_add_submit'])) {
	$eventName = $_POST['eventName'];
	$eventDate = $_POST['eventDate'];
	$eventVenue = $_POST['eventVenue'];
	$eventDescription = $_POST['eventDescription'];

	// check if logged in
	$createdBy = $_SESSION['id'];
	if ($createdBy == null) {
		header("Location: ../login.php?error=auth");
		exit();
	}

	// check role
	$role = $_SESSION['role'];
	if ($role != 'event') {
		header("Location: ../list_of_events.php?error=not_allowed");
		exit();
	}

	// check if empty
	if (empty($eventName)) {
		header("Location: ../event_add.php?error=empty_eventName");
		exit();
	} else if (empty($eventDate)) {
		header("Location: ../event_add.php?error=empty_eventDate");
		exit();
	} else if (empty($eventVenue)) {
		header("Location: ../event_add.php?error=empty_eventVenue");
		exit();
	} else if (empty($eventDescription)) {
		header("Location: ../event_add.php?error=empty_eventDescription");
		exit();
	}

	// create event
	$timestamp = strtotime($eventDate);
	$query = "INSERT INTO events(name, createdBy, description, eventDate, venue) VALUES (:name, :createdBy, :description, :eventDate, :venue)";
	$stmt = $db->prepare($query);
	$res = $stmt->execute(array(':name' => $eventName, ':createdBy' => $createdBy, ':description' => $eventDescription, ':eventDate' => date('Y-m-d H:i:s', $timestamp), ':venue' => $eventVenue));

	header("Location: ../list_of_my_events.php?signup=success");
	exit();
}

// add to 'my events' for individual user
else if (isset($_POST['add_to_my_events_submit'])) {
	$eventId = $_POST['eventId'];

	// check if logged in
	$createdBy = $_SESSION['id'];
	if ($createdBy == null) {
		header("Location: ../login.php?error=auth");
		exit();
	}

	// check role
	$role = $_SESSION['role'];
	if ($role != 'individual') {
		header("Location: ../list_of_events.php?error=not_allowed");
		exit();
	}
	$userId = $_SESSION['id'];

	// check if empty
	if (empty($createdBy)) {
		header("Location: ../list_of_events.php?error=not_found");
		exit();
	}

	// check if already in my events
	$query = "SELECT * FROM userevents where userId = :userId and eventId = :eventId;";
	$stmt = $db->prepare($query);
	$stmt->execute(array(':userId' => $userId, ':eventId' => $eventId));
	if ($stmt->rowCount(PDO::FETCH_ASSOC) > 0) {
		header("Location: ../list_of_events.php?error=in_list");
		exit();
	}

	// add to table
	$query = "INSERT INTO userevents(userId, eventId) VALUES (:userId, :eventId)";
	$stmt = $db->prepare($query);
	$res = $stmt->execute(array(':userId' => $userId, ':eventId' => $eventId));
	header("Location: ../list_of_events.php?confirm=success");
	exit();
}

// remove from 'my events' for individual user
else if (isset($_POST['remove_from_my_events_submit'])) {
	$eventId = $_POST['eventId'];

	// check if logged in
	$createdBy = $_SESSION['id'];
	if ($createdBy == null) {
		header("Location: ../login.php?error=auth");
		exit();
	}

	// check role
	$role = $_SESSION['role'];
	if ($role != 'individual') {
		header("Location: ../list_of_events.php?error=forbidden");
		exit();
	}
	$userId = $_SESSION['id'];

	// check if empty
	if (empty($createdBy)) {
		header("Location: ../list_of_my_events.php?error=empty");
		exit();
	}

	// check if already in my events
	$query = "SELECT * FROM userevents where userId = :userId and eventId = :eventId;";
	$stmt = $db->prepare($query);
	$stmt->execute(array(':userId' => $userId, ':eventId' => $eventId));
	if ($stmt->rowCount(PDO::FETCH_ASSOC) == 0) {
		header("Location: ../list_of_events.php?error=not_found");
		exit();
	}

	// delete from table
	$query = "DELETE FROM userevents where userId = :userId and eventId = :eventId;";
	$stmt = $db->prepare($query);
	$res = $stmt->execute(array(':userId' => $userId, ':eventId' => $eventId));
	header("Location: ../list_of_my_events.php?confirm=success");
	exit();
}

// edit event, for event user
else if (isset($_POST['event_edit_submit'])) {
	$eventId = $_POST['eventId'];
	$eventName = $_POST['eventName'];
	$eventDate = $_POST['eventDate'];
	$eventVenue = $_POST['eventVenue'];
	$eventDescription = $_POST['eventDescription'];

	// check if logged in
	$createdBy = $_SESSION['id'];
	if ($createdBy == null) {
		header("Location: ../login.php?error=auth");
		exit();
	}

	// check role
	$role = $_SESSION['role'];
	if ($role != 'event') {
		header("Location: ../list_of_events.php?error=not_allowed");
		exit();
	}
	
	// check if empty
	if (empty($eventName)) {
		header("Location: ../event_add.php?error=empty_eventName");
		exit();
	} else if (empty($eventDate)) {
		header("Location: ../event_add.php?error=empty_eventDate");
		exit();
	} else if (empty($eventVenue)) {
		header("Location: ../event_add.php?error=empty_eventVenue");
		exit();
	} else if (empty($eventDescription)) {
		header("Location: ../event_add.php?error=empty_eventDescription");
		exit();
	}

	// edit event
	$timestamp = strtotime($eventDate);
	$query = "UPDATE events set name = :name, description = :description, eventDate = :eventDate, venue = :venue where events.id = :eventId";
	$stmt = $db->prepare($query);
	$res = $stmt->execute(array(':name' => $eventName, ':description' => $eventDescription, ':eventDate' => date('Y-m-d H:i:s', $timestamp), ':venue' => $eventVenue, ':eventId' => $eventId));

	header("Location: ../list_of_my_events.php?confirm=success");
	exit();
}

// delete event for events user
else if (isset($_POST['delete_event_submit'])) {
	$eventId = $_POST['eventId'];

	// check if logged in
	$createdBy = $_SESSION['id'];
	if ($createdBy == null) {
		header("Location: ../login.php?error=auth");
		exit();
	}

	// check role
	$role = $_SESSION['role'];
	if ($role != 'event') {
		header("Location: ../list_of_events.php?error=not_allowed");
		exit();
	}

	echo $eventId;

	// delete event
	try {
		$db->beginTransaction();

		$query = "DELETE from userevents where userevents.eventId = :id;";
		$stmt = $db->prepare($query);
		$stmt->execute(array(':id' => $eventId));

		$query = "DELETE from events where events.id = :id;";
		$stmt = $db->prepare($query);
		$stmt->execute(array(':id' => $eventId));

		$db->commit();
	} catch(Exception $e){
	    echo $e->getMessage();
		$db->rollBack();
	}

	header("Location: ../list_of_my_events.php?delete=success");
	exit();
}

?>