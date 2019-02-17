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
	<nav>
		body menu
	</nav>
	<section>
		<aside>
			...
		</aside>
	</section>
	<section>
		...
	</section>
</main>

<?php  
	require 'footer.php';
?>