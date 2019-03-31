<?php
	require 'header.php';
?>
	<main>
		<div class="banner-top">
			<p>Home <i class="fas fa-arrow-right"></i> Contact</p>
			<h1>Contact Us</h1>
		</div>
		<div id="wrapper">
			<h2 class="center-heading">Contact Us</h2>
			<form class="contact-us-form">
				<div class="row">
					<div class="column">
						<input type="text" name="contact-first-name" placeholder="Enter First Name">
						<input type="text" name="contact-last-name" placeholder="Enter Last Name">
						<input type="email" name="contact-email" placeholder="Enter Email">
						<input type="contact" name="contact-phone" placeholder="Enter Phone">
					</div>
					<div class="column">
						<textarea rows="3" name="contact-message" placeholder="Enter Message"></textarea>
						<input type="submit" name="contact-submit" value="Submit" class="button-color">
					</div>
				</div>
			</form>
		</div>
	</main>
<?php  
	require 'footer.php';
?>