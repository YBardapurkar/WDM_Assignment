<?php
	require 'config.php';

	if (isset($_POST['login_submit'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		// check if empty
		if (empty($email)) {
			header("Location: ../login.php?error=empty_email");
			exit();
		} else if (empty($password)) {
			header("Location: ../login.php?error=empty_password");
			exit();
		}

		// check if email matches regex
		if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $email)) {
			header("Location: ../login.php?error=invalid_email");
			exit();
		}

		// fetch from table
		$query = "SELECT users.id, users.firstName, users.lastName, roles.role, users.email, users.password FROM users join roles on users.roleId = roles.id where email = :email;";
		$stmt = $db->prepare($query);
		$stmt->execute(array(':email' => $email));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// check password
		$pwdCheck = password_verify($password, $row['password']);
		if ($pwdCheck == false) {
			header("Location: ../login.php?error=not_found");
			exit();
		}

		// login, create session
		session_start();
		$_SESSION['id'] = $row['id'];
		$_SESSION['firstName'] = $row['firstName'];
		$_SESSION['lastName'] = $row['lastName'];
		$_SESSION['role'] = $row['role'];
		$_SESSION['email'] = $row['email'];
		header("Location: ../dashboard.php?login=success");
	}
?>
