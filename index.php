<!doctype html>
<head>
	<title> SayItRight</title>
</head>
<body>
	<?php
		if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
			$uri = 'https://';
		} else {
			$uri = 'http://';
		}
		$uri .= $_SERVER['HTTP_HOST'];
		header('Location: '.$uri.'/sayitright/home.html');
	exit;
	?>
</body>