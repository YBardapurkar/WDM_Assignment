<?php
	require 'config.php';

	if (isset($_POST['login_submit'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		// check if empty
		if (empty($email) || empty($password)) {
			header("Location: ../login.php?error=empty");
			exit();
		}

		// fetch from table
		$query = "SELECT * FROM users join roles on users.roleId = roles.id where email = :email;";
		$stmt = $db->prepare($query);
		$stmt->execute(array(':email' => $email));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// check password
		$pwdCheck = password_verify($password, $row['password']);
		if ($pwdCheck == false) {
			header("Location: ../login.php?error=wrongpassword");
			exit();
		}

		// login, create session
		session_start();
		$_SESSION['id'] = $row['id'];
		$_SESSION['firstName'] = $row['firstName'];
		$_SESSION['lastName'] = $row['lastName'];
		$_SESSION['role'] = $row['role'];
		$_SESSION['email'] = $row['email'];
		header("Location: ../index.php?login=success");
	}
?>