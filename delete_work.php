<?php

	session_start();
	include_once("php/code.php");
	global $db;

	$user = new Users;
	$work = new Works;

	if (isset($_SESSION['account']['username'])) {

		$allworks = $work->get_works(); //on récup les travaux dans la bdd
	}
	else{
		header("Location: index.php");
	}

	if(isset($_POST["submit"]))
	{
	    if($_POST["submit"] === "OK")
		{
			$work->delete($_GET["id"]);
		    header("Location: works.php");
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Suppression</title>
</head>
<body>

	<h1>Voulez vous vraiment supprimer cet article ?</h1>
	<form method="post" action="delete_work.php?id=<?php echo($_GET["id"])?>">
		
		<input type="submit" name="submit" value="OK">

	</form>
	
</body>
</html>