<?php
	require 'header.php';
?>

	<main>
		<div id="wrapper">
			<h2 class="center-heading">Welcome to your profile</h2>
			
			<div class="row">
				<div class="profile-photo-column">
					<form class="profile-photo-form" class="profile-photo-form">
						<figure>
							<img src="imgsay/user.jpg">
							<figcaption></figcaption>
						</figure>

						<input type="submit" name="profile-photo-submit" value="Change Photo" class="button-color">
					</form>
				</div>
				<div class="profile-details-column">
					<form class="profile-details-form">
						<div>
							<input type="text" name="firstName" placeholder="Enter First Name">
							<input type="text" name="lastName" placeholder="Enter Last Name">
						</div>
						<input type="text" name="placeOfWork" placeholder="Enter Place of Work">
						<input type="text" name="school" placeholder="Enter School">
						<input type="email" name="email" placeholder="Enter Email">
						<input type="password" name="password" placeholder="Enter Password">

						<input type="submit" name="profile-details-submit" value="Save Changes" class="button-color">
					</form>
				</div>
			</div>
		</div>
	</main>

<?php
	require 'footer.php';
?>