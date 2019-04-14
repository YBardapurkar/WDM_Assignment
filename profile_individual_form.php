<form class="profile-details-form" name="profile_individual_form" action="php/profile.controller.php" method="post"
<?php 
if (!$htmlValidate) { echo ' novalidate'; }
if ($jsValidate) { echo ' onsubmit="return validateForm();"'; } 
?> >
	<input type="text" name="firstName" placeholder="Enter First Name"
	value="<?php echo $row['firstName']; ?>" required>
	<input type="text" name="lastName" placeholder="Enter Last Name"
	value="<?php echo $row['lastName']; ?>" required>
	<input type="text" name="placeOfWork" placeholder="Enter Place of Work"
	value="<?php echo $row['placeOfWork']; ?>" required>
	<input type="text" name="school" placeholder="Enter School"
	value="<?php echo $row['school']; ?>" required>
	<input type="email" name="email" placeholder="Enter Email" disabled="true"
	value="<?php echo $row['email']; ?>">

	<input type="submit" name="profile_individual_submit" value="Save Changes" class="button-color">
</form>