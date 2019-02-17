<?php  
	require 'header.php';
?>

<main>
	<div class="wrapper_main">
		<form action="includes/signup.inc.php" method="post">
			<input type="radio" name="roleId" value="1">Individual<br>
			<input type="radio" name="roleId" value="2">Event<br>
			<input type="radio" name="roleId" value="3">Business<br><br>

			<input type="text" name="firstName" placeholder="First Name"><br>
			<input type="text" name="lastName" placeholder="Last Name"><br>
			<input type="text" name="placeOfWork" placeholder="Place of Work"><br>
			<input type="text" name="school" placeholder="School"><br>
			<input type="email" name="email" placeholder="Email"><br>
			<input type="password" name="password" placeholder="password"><br><br>

			<input type="submit" name="signup_submit">
		</form>
	</div>
</main>

<?php  
	require 'footer.php';
?>