<?php
	session_start();
	require 'php/validation.php';

	if (isset($_GET)) {
		require 'php/config.php';

		// check if logged in
		$role = $_SESSION['role'];
		if ($role != 'business') {
			header("Location: list_of_my_businesses.php?error=not_allowed");
			exit();
		}

		$businessId = $_GET['businessId'];

		// fetch business details
		$query = "SELECT * FROM businesses where businesses.id = :businessId";
		$stmt = $db->prepare($query);
		$stmt->execute(array(':businessId' => $businessId));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// check if business created by user
		if ($_SESSION['id'] != $row['createdBy']) {
			header("Location: list_of_my_businesses.php?error=not_allowed");
			exit();
		}
	}
?>

<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SayItRight</title>
	<link rel="stylesheet" href="css/sayitright.css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="shortcut icon" href="imgsay/favicon.png"/>
	<script type="text/javascript" src="js/business_edit.js"></script>

</head>

<body>
	<?php
		if ((isset($_SESSION)) && isset($_SESSION['id'])) {
			if ($_SESSION['role'] == 'business') {
				require 'header_business.php';
			} else {
				require 'header_auth.php';
			}
		} else {
			require 'header.php';
		}
	?>
	<main>
		<div id="wrapper" class="signup-div">
			<h2 class="center-heading">Edit Business</h2>
			<form class="contact-us-form" name="business_edit_form" action="php/businesses.controller.php" method="post"
			<?php 
			if (!$htmlValidate) { echo ' novalidate'; }
			if ($jsValidate) { echo ' onsubmit="return validateForm();"'; } 
			?> >
				<div class="row">
					<div class="column">
						<input type="hidden" name="businessId" value="<?php echo $row['id']; ?>">
						<input type="text" name="businessName" placeholder="Enter business Name"
						value="<?php echo $row['name']; ?>" required>
					</div>
					<div class="column">
						<textarea rows="3" name="businessDescription" placeholder="Enter Description" required><?php echo $row['description']; ?></textarea>
						<input type="submit" name="business_edit_submit" value="Submit" class="button-color">
					</div>
				</div>
			</form>
		</div>
	</main>
	<?php  
		require 'footer.php';
	?>
</body>
</html>