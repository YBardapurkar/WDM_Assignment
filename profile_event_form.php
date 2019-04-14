<form class="profile-details-form" name="profile_event_form" action="php/profile.controller.php" method="post"
<?php 
if (!$htmlValidate) { echo ' novalidate'; }
if ($jsValidate) { echo ' onsubmit="return validateForm();"'; } 
?> >
	<input type="text" name="firstName" placeholder="Enter First Name"
	value="<?php echo $row['firstName']; ?>" required>
	<input type="text" name="lastName" placeholder="Enter Last Name"
	value="<?php echo $row['lastName']; ?>" required>
	<input type="email" name="email" placeholder="Enter Email" disabled="true"
	value="<?php echo $row['email']; ?>">

	<input type="submit" name="profile_event_submit" value="Save Changes" class="button-color">
</form>