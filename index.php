<?php  
	require 'header.php';
?>

	<main>
		<?php 
			echo implode(" | ",$_SESSION);
			echo '<br>';
			if (!$_SESSION) {
				echo("logged out");
			} else {
				echo($_SESSION['email']." logged in");
			}
		?>
		<div class="banner-home">
			<div class="right">
				<h1>For good communication <span class="red">Say It Right</span> is a tool that you should use.</h1>
				<p>You can see our video tutorial of use with just pressing this button</p>
			</div>
		</div>
		<div class="newsletter banner-bottom">
			<div class="left">
				<h1>Subscribe Our Newsletter</h1>
				<p>We won't send any kind of spam</p>
			</div>
			<form>
				<div>
					<input type="text" name="email">
					<input type="submit" name="submit" value="Subscribe">
				</div>				
			</form>
		</div>
	</main>

<?php  
	require 'footer.php';
?>