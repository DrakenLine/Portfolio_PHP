<!DOCTYPE html>
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
	    if($_POST['titre'] != NULL && $_POST['description'] != NULL)
	    {
	        $work->create($_POST["titre"], $_POST["description"]);
	        header("Location: works.php");
	    }
	    else
	    {
	        echo("Remplis le formulaire fdp");
	    }
	}
}
?>
<html>
<head>
	<title>EDITAGE</title>
</head>
<body>

	<h1>Ajouter un projet :</h1>

	<form method="post" action="create_work.php">

		<label for="newtitre">Titre :</label>
		<input type="text" id="titre" name="titre" placeholder="titre" autofocus=""> <br><br>
		<label for="newdescription">Description :</label>
		<input type="text" name="description" id="description" placeholder="description"> <br><br>

		<input type="submit" name="submit" value="OK">

	</form>

</body>
</html>
