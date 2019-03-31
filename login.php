<?php  
	require 'header.php';
?>

	<main>
		<div class="banner-top">
			<p>Home <i class="fas fa-arrow-right"></i> LOGIN</p>
			<h1>Login</h1>
		</div>
		<div id="wrapper" class="login">
			<form class="login-form" action="includes/login.inc.php" method="post">
				<div>
					<input type="email" name="email" placeholder="Enter Email">
					<input type="password" name="password" placeholder="Enter Password">

					<input type="submit" name="login_submit" value="Submit" class="button-color">
				</div>
			</form>
		</div>
	</main>

<?php  
	require 'footer.php';
?>