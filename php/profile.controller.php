<?php
require 'config.php';
session_start();

// Check if image file is a actual image or fake image
if(isset($_POST["profile_photo_submit"])) {

	$target_dir = "../profilePics/".$_SESSION['id'].'/';
	if (!is_dir($target_dir)) {
		mkdir($target_dir, 0777, true);
	}
	$target_file = $target_dir.basename($_FILES["newProfilePic"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	$check = getimagesize($_FILES["newProfilePic"]["tmp_name"]);
	if($check !== false) {
		echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		echo "File is not an image.";
		$uploadOk = 0;
		header('Location: ../profile.php?error=not_selected');
		exit();
	}

	// Check if file already exists
	if (file_exists($target_file)) {
		// echo "Sorry, file already exists.";
		// $uploadOk = 0;
		unlink($target_file); 
	}
	// Check file size
	if ($_FILES["newProfilePic"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
		header('Location: ../profile.php?error=file_too_large');
		exit();
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
		header('Location: ../profile.php?error=format_not_allowed');
		exit();
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
		header('Location: ../profile.php?error=error');
		exit();
	} 
	// if everything is ok, try to upload file
	else {
		if (move_uploaded_file($_FILES["newProfilePic"]["tmp_name"], $target_file)) {
			$newPath = $target_dir.basename('profilePicture'.$_SESSION['id'].'.'.$imageFileType);
			echo $target_file.'<br>';
			echo $newPath.'<br>';
			echo "The file ". basename( $_FILES["newProfilePic"]["name"]). " has been uploaded.";

			$query = "UPDATE users SET users.profilePicture = :profilePicture WHERE users.id = :id";
			$stmt = $db->prepare($query);
			$stmt->execute(array(':profilePicture' => substr($target_file, 3), ':id' => $_SESSION['id']));

			header('Location: ../profile.php');
		} else {
			echo "Sorry, there was an error uploading your file.";
			header('Location: ../profile.php?error=error');
			exit();
		}
	}
}

// update individual profile
else if (isset($_POST['profile_individual_submit'])) {
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$placeOfWork = $_POST['placeOfWork'];
	$school = $_POST['school'];
	$password = $_POST['password'];

	// check if logged in
	$id = $_SESSION['id'];
	if ($id == null) {
		header("Location: ../login.php?error=auth");
		exit();
	}

	print_r($_POST);

	// check if empty
	if (empty($firstName)) {
		header("Location: ../profile.php?error=empty_firstName");
		exit();
	} else if (empty($lastName)) {
		header("Location: ../profile.php?error=empty_lastName");
		exit();
	} else if (empty($placeOfWork)) {
		header("Location: ../profile.php?error=empty_placeOfWork");
		exit();
	} else if (empty($school)) {
		header("Location: ../profile.php?error=empty_school");
		exit();
	}

	// update profile
	$query = "UPDATE users SET firstName = :firstName, lastName = :lastName, placeOfWork = :placeOfWork, school = :school where id = :id";
	$stmt = $db->prepare($query);
	$stmt->execute(array(':firstName' => $firstName, ':lastName' => $lastName, ':placeOfWork' => $placeOfWork, ':school' => $school, ':id' => $id));
	header("Location: ../profile.php?update=success");
	exit();
}

// update event profile
else if (isset($_POST['profile_event_submit'])) {
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$password = $_POST['password'];

	// check if logged in
	$id = $_SESSION['id'];
	if ($id == null) {
		header("Location: ../login.php?error=auth");
		exit();
	}

	print_r($_POST);

	// check if empty
	if (empty($firstName)) {
		header("Location: ../profile.php?error=empty_firstName");
		exit();
	} else if (empty($lastName)) {
		header("Location: ../profile.php?error=empty_lastName");
		exit();
	}

	// update profile
	$query = "UPDATE users SET firstName = :firstName, lastName = :lastName where id = :id";
	$stmt = $db->prepare($query);
	$stmt->execute(array(':firstName' => $firstName, ':lastName' => $lastName, ':id' => $id));
	header("Location: ../profile.php?update=success");
	exit();
}

// update event profile
else if (isset($_POST['profile_business_submit'])) {
	$firstName = $_POST['firstName'];
	$businessType = $_POST['businessType'];
	$password = $_POST['password'];

	// check if logged in
	$id = $_SESSION['id'];
	if ($id == null) {
		header("Location: ../login.php?error=auth");
		exit();
	}

	print_r($_POST);

	// check if empty
	if (empty($firstName)) {
		header("Location: ../profile.php?error=empty_firstName");
		exit();
	} else if (empty($businessType)) {
		header("Location: ../profile.php?error=empty_businessType");
		exit();
	}

	// update profile
	$query = "UPDATE users SET firstName = :firstName, businessType = :businessType where id = :id";
	$stmt = $db->prepare($query);
	$stmt->execute(array(':firstName' => $firstName, ':businessType' => $businessType, ':id' => $id));
	header("Location: ../profile.php?update=success");
	exit();
}
?>
