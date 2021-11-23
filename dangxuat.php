<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	session_start();
	if (isset($_SESSION['UserName']) && $_SESSION['UserName'] != NULL){
		unset($_SESSION['UserName']);
	}
	echo "<script>window.open('index.php','_self')</script>";
	?>
</body>
</html>