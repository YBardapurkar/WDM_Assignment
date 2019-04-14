<form class="profile-details-form" name="profile_business_form" action="php/profile.controller.php" method="post"
<?php 
if (!$htmlValidate) { echo ' novalidate'; }
if ($jsValidate) { echo ' onsubmit="return validateForm();"'; } 
?> >
	<input type="text" name="firstName" placeholder="Enter First Name"
	value="<?php echo $row['firstName']; ?>" required>

	<input type="radio" name="businessType" value="university" checked="<?php echo $row['businessType'] == 'university'; ?>"> University
	<input type="radio" name="businessType" value="company" checked="<?php echo $row['businessType'] == 'company'; ?>"> Company

	<input type="email" name="email" placeholder="Enter Email" disabled="true"
	value="<?php echo $row['email']; ?>">
	<input type="password" name="password" placeholder="Enter Password">

	<input type="submit" name="profile_business_submit" value="Save Changes" class="button-color">
</form>