<?php
	session_start();

	if (isset($_GET)) {
		require 'php/config.php';

		// check if logged in
		$email = $_SESSION['email'];
		if ($email == null) {
			header("Location: login.php?error=auth");
			exit();
		}

		// fetch user details
		$query = "SELECT * FROM users JOIN roles ON users.roleId = roles.id where email = :email";
		$stmt = $db->prepare($query);
		$stmt->execute(array(':email' => $email));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
	}
?>

<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SayItRight</title>
	<link rel="stylesheet" href="css/sayitright.css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="shortcut icon" href="imgsay/favicon.png"/>
</head>

<body>
	<?php
		if ($_SESSION) {
			require 'header_auth.php';
		} else {
			require 'header.php';
		}
	?>
	<main>
		<div id="wrapper">
			<h2 class="center-heading">Welcome to your profile</h2>

			<div class="row">
				<div class="profile-photo-column">
					<!-- <form class="profile-photo-form" action="php/profile.controller.php" method="post" enctype="multipart/form-data"> -->
					<form class="profile-photo-display">
						<figure>
							<?php
							if (file_exists($row['profilePicture'])) {
								echo '<img src="'.$row['profilePicture'].'">'; 
							} else {
								echo '<img src="imgsay/user.jpg">';
							}
							?>
							<figcaption></figcaption>
						</figure>
						<input id="myBtn" type="button" name="profile-photo-submit" value="Change Photo" class="button-color">
						<!-- <input type="file" name="newProfilePic" id="newProfilePic">
						<input type="submit" name="profile_photo_submit" value="Change Photo" class="button-color"> -->
					</form>
				</div>
				<div class="profile-details-column">
					<form class="profile-details-form">
						<input type="text" name="firstName" placeholder="Enter First Name"
						value="<?php echo $row['firstName']; ?>">
						<input type="text" name="lastName" placeholder="Enter Last Name"
						value="<?php echo $row['lastName']; ?>">
						<input type="text" name="placeOfWork" placeholder="Enter Place of Work"
						value="<?php echo $row['placeOfWork']; ?>">
						<input type="text" name="school" placeholder="Enter School"
						value="<?php echo $row['school']; ?>">
						<input type="email" name="email" placeholder="Enter Email" disabled="true"
						value="<?php echo $row['email']; ?>">
						<input type="password" name="password" placeholder="Enter Password">

						<input type="submit" name="profile-details-submit" value="Save Changes" class="button-color">
					</form>
				</div>
			</div>
		</div>
		<div id="modal-new-profile-photo" class="modal">
			<!-- Modal content -->
			<div class="modal-content">
				<span class="close">&times;</span>
				<form id="profile-photo-form" class="profile-photo-form" action="php/profile.controller.php" method="post" enctype="multipart/form-data">
					<figure>
						<?php
						if (file_exists($row['profilePicture'])) {
							echo '<img id="newProfilePicImage" src="'.$row['profilePicture'].'">'; 
						} else {
							echo '<img id="newProfilePicImage" src="imgsay/user.jpg">';
						}
						?>
						<figcaption></figcaption>
					</figure>
					<input type="file" name="newProfilePic" id="newProfilePic">
					<input type="submit" name="profile_photo_submit" value="Change Photo" class="button-color">
				</form>
			</div>
		</div>
	</main>
	<?php
		require 'footer.php';
	?>
</body>	
<script type="text/javascript" src="js/profile.js"></script>
</html>
