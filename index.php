<!DOCTYPE html>
<?php
include_once("php/code.php");

$user = new Users;
?>
<html>
<head>
	<title>PHP</title>
	<meta charset="utf-8">
</head>
<body>
	<p>Holà <?php echo($user->get_user(1)["username"]); ?></p>
</body>
</html>