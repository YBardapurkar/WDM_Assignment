<?php
	require 'config.php';

	if (isset($_POST['signup_business_submit'])) {
		$firstName = $_POST['firstName'];
		$businessType = $_POST['businessType'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		// check if empty
		if (empty($firstName)) {
			header("Location: ../signup_business.php?error=empty_name");
			exit();
		} else if (empty($businessType)) {
			header("Location: ../signup_business.php?error=empty_businessType");
			exit();
		} else if (empty($email)) {
			header("Location: ../signup_business.php?error=empty_email");
			exit();
		} else if (empty($password)) {
			header("Location: ../signup_business.php?error=empty_password");
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
		$query = "INSERT INTO users(firstName, businessType, roleId, email, password) VALUES (:firstName, :businessType, :roleId, :email, :password)";
		$stmt = $db->prepare($query);
		$stmt->execute(array(':firstName' => $firstName, ':businessType' => $businessType, ':roleId' => 3, ':email' => $email, ':password' => $hashed_password));
		header("Location: ../login.php?signup=success");
		exit();
	}
?>
