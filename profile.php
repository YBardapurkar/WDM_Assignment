<?php
	session_start();
	require 'php/validation.php';

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
		if ((isset($_SESSION)) && isset($_SESSION['id'])) {
			if ($_SESSION['role'] == 'business') {
				require 'header_business.php';
			} else {
				require 'header_auth.php';
			}
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
						<input id="profile-photo-change-button" type="button" name="profile-photo-submit" value="Change Photo" class="button-color">
						<!-- <input type="file" name="newProfilePic" id="newProfilePic">
						<input type="submit" name="profile_photo_submit" value="Change Photo" class="button-color"> -->
					</form>
				</div>
				<div class="profile-details-column">
					<?php
					if ($_SESSION['role'] == 'individual') {
						require 'profile_individual_form.php';
					} else if ($_SESSION['role'] == 'event') {
						require 'profile_event_form.php';
					} else if ($_SESSION['role'] == 'business') {
						require 'profile_business_form.php';
					}
					?>
					
					<form class="profile-details-form" name="profile_password_form" action="php/profile.controller.php" method="post"
					<?php 
					if (!$htmlValidate) { echo ' novalidate'; }
					if ($jsValidate) { echo ' onsubmit="return validateForm();"'; } 
					?> >
						<input type="password" name="oldPassword" placeholder="Enter Old Password">
						<input type="password" name="newPassword" placeholder="Enter New Password">

						<input type="submit" name="profile_password_submit" value="Change Password" class="button-color">
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
