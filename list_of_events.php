<?php 
	session_start() 
?>

<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SayItRight</title>
	<link rel="stylesheet" href="css/sayitright.css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="shortcut icon" href="imgsay/favicon.png"/>
</head>

<body>
	<?php
		if ($_SESSION) {
			require 'header_auth.php';
		} else {
			require 'header.php';
		}	
	?>
	<main>
		<div id="wrapper">
			<h2>List of Events</h2>
			<table class="list-of-events">
				<thead>
					<tr>
						<th>Events</th>
						<th>Description</th>
						<th>Date</th>
						<th>City</th>
						<th>Confirmation</th>
					</tr>
				</thead>
				<tfoot></tfoot>
				<tbody>
					<tr>
						<td>Oratory</td>
						<td>Is the art of making formal speeches which strongly affect people's feelings and beliefs.</td>
						<td>25 April 2019</td>
						<td>Boston</td>
						<td>Confirm</td>
					</tr>
					<tr>
						<td>Vocalization</td>
						<td>A sound, you use you voice to make it, especially by singing it.</td>
						<td>25 April 2019</td>
						<td>Texas</td>
						<td>Confirm</td>
					</tr>
					<tr>
						<td>Social Communication</td>
						<td>The formation of a stable structure of relations inside a broup, which provides a basis for order and patterns relationship for new members</td>
						<td>25 April 2019</td>
						<td>Detroit</td>
						<td>Confirm</td>
					</tr>
				</tbody>
			</table>
		</div>
	</main>
	<?php  
		require 'footer.php';
	?>
</body>
</html>