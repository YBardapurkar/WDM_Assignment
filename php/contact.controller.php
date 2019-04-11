<?php
require 'config.php';

if (isset($_POST['contact_submit'])) {
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];

	// check if empty
	if (empty($firstName)) {
		header("Location: ../contact.php?error=empty_first");
		exit();
	}
	if (empty($lastName)) {
		header("Location: ../contact.php?error=empty_last");
		exit();
	}
	if (empty($email)) {
		header("Location: ../contact.php?error=empty_email");
		exit();
	}
	if (empty($message)) {
		header("Location: ../contact.php?error=empty_message");
		exit();
	}

	// submit message
	$query = "INSERT INTO feedback(firstName, lastName, telephone, email, message) 
	VALUES (:firstName, :lastName, :phone, :email, :message)";
	$stmt = $db->prepare($query);
	$stmt->execute(array(':firstName' => $firstName, ':lastName' => $lastName, ':phone' => $phone, ':email' => $email, ':message' => $message));
	header("Location: ../contact.php?contact=success");
	exit();
}
?>
