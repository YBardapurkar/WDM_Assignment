<?php  
	require 'header.php';
?>

	<main>
		<div class="banner-top">
			<p>Home <i class="fas fa-arrow-right"></i> SIGN UP</p>
			<h1>SIGN UP</h1>
		</div>
		<div id="wrapper" class="signup-div">
			<form class="signup-form" action="includes/signup.inc.php" method="post">
				<h2 class="center-heading">Select the type of user</h2>
				<ul class="user-type">
					<li>
						<a class="button-color" href="signup_individual.php">Individual</a>
					</li>
					<li>
						<a class="button-color" href="signup_event.php">Event</a>
					</li>
					<li>
						<a class="button-color" href="signup_business.php">Business</a>
					</li>
				</ul>
				<p class="center-text">Welcome to the Individual registration</p>
				<input type="text" name="firstName" placeholder="Enter First Name">
				<input type="text" name="lastName" placeholder="Enter Last Name">
				<input type="text" name="placeOfWork" placeholder="Enter Place of Work">
				<input type="text" name="school" placeholder="Enter School">
				<input type="email" name="email" placeholder="Enter Email">
				<input type="password" name="password" placeholder="Enter Password">
				<input type="submit" name="signup-individual-submit" value="Send" class="button-color">
			</form>
		</div>
	</main>

<?php  
	require 'footer.php';
?>