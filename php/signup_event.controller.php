<?php
	require 'config.php';

	if (isset($_POST['signup_event_submit'])) {
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		// check if empty
		if (empty($firstName) || empty($lastName) || empty($email) || empty($password)) {
			header("Location: ../signup_event.php?error=empty");
			exit();
		}

		// check if email exists
		$query = "SELECT * FROM users where email = :email;";
		$stmt = $db->prepare($query);
		$stmt->execute(array(':email' => $email));
		if ($stmt->rowCount(PDO::FETCH_ASSOC) > 0) {
			header("Location: ../signup_event.php?error=email_exists");
			exit();
		}

		// create user
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		$query = "INSERT INTO users(firstName, lastName, roleId, email, password) VALUES (:firstName, :lastName, :roleId, :email, :password)";
		$stmt = $db->prepare($query);
		$stmt->execute(array(':firstName' => $firstName, ':lastName' => $lastName, ':roleId' => 2, ':email' => $email, ':password' => $hashed_password));
		header("Location: ../login.php?signup=success");
		exit();
	}
?>