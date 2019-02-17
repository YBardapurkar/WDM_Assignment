<?php  
	require 'header.php';
?>

<main>
	<div class="wrapper_main">
		<form action="includes/login.inc.php" method="post">
			<input type="email" name="email" placeholder="Email"><br>
			<input type="password" name="password" placeholder="password"><br><br>

			<input type="submit" name="login_submit">
		</form>
	</div>
</main>

<?php  
	require 'footer.php';
?>