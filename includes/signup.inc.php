<?php

if (isset($_POST['signup_submit'])) {

	require 'db.inc.php';

	$roleId = $_POST['roleId'];
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$placeOfWork = $_POST['placeOfWork'];
	$school = $_POST['school'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	if (empty($roleId) || empty($firstName) || empty($lastName) || empty($placeOfWork) || empty($school) || empty($email) || empty($password)) {
		header("Location: ../signup.php?error=empty");
		exit();
	} else {
		$sql = "SELECT email FROM users WHERE email = ?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../signup.php?error=sqlerror");
			exit();
		} else {
			mysqli_stmt_bind_param($stmt, "s", $email);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);

			$resultCheck = mysqli_stmt_num_rows($stmt);
			if ($resultCheck > 0) {
				header("Location: ../signup.php?error=userTaken");
				exit();
			} else {
				$sql = "INSERT INTO users(firstName, lastName, roleId, placeOfWork, school, email, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);

				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location: ../signup.php?error=sfsaf");
					exit();
				} else {
					$hashed_password = password_hash($password, PASSWORD_DEFAULT);

					mysqli_stmt_bind_param($stmt, "ssissss", $firstName, $lastName, $roleId, $placeOfWork, $school, $email, $hashed_password);
					mysqli_stmt_execute($stmt);

					header("Location: ../signup.php?signup=success");
					exit();
				}
			}
		}
	}
}