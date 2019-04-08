<?php
	require 'config.php';

	if (isset($_POST['newsletter_submit'])) {
		$email = $_POST['email'];

		// check if empty
		if (empty($email)) {
			header("Location: ../index.php?error=empty_email");
			exit();
		}

		// check if email exists in mailing list
		$query = "SELECT * FROM newsletter where email = :email;";
		$stmt = $db->prepare($query);
		$stmt->execute(array(':email' => $email));
		if ($stmt->rowCount(PDO::FETCH_ASSOC) > 0) {
			header("Location: ../index.php?error=exists");
			exit();
		}

		// subscribe to newsletter
		$query = "INSERT INTO newsletter(email) VALUES (:email)";
		$stmt = $db->prepare($query);
		$stmt->execute(array(':email' => $email));
		header("Location: ../index.php?newsletter=success");
		exit();
	}
?>
