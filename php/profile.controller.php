<?php
require 'config.php';
session_start();

$target_dir = "../profilePics/".$_SESSION['id'].'/';
if (!is_dir($target_dir)) {
	mkdir($target_dir, 0777, true);
}
$target_file = $target_dir.basename($_FILES["newProfilePic"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["profile_photo_submit"])) {
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

?>
