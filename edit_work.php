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

if (isset($_GET['id'])) {
	$workid = $_GET['id'];
	$edit_work =$db->prepare('SELECT * FROM WORKS WHERE id=?');
	$edit_work->execute(array($workid));
}

if ($edit_work->rowCount() == 1) {
      $edit_work = $edit_work->fetch();
    }
else
{
	die('Erreur: l\'article concerné n\'existe pas !');
}

if(isset($_POST["submit"]))
{
    if($_POST["submit"] === "OK")
	{
	    if($_POST['newtitre'] != NULL && $_POST['newdescription'] != NULL)
	    {
	        $work->update($_POST["newtitre"], $_POST["newdescription"], $_GET["id"]);
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

	<h1>Editer mes projets :</h1>

	<form method="post" action="edit_work.php?id=<?php echo($_GET["id"])?>">

		<label for="newtitre">Titre :</label>
		<input type="text" id="newtitre" name="newtitre" placeholder="titre" autofocus="" value="<?php echo ($edit_work['titre']);?>"> <br><br>
		<label for="newdescription">Description :</label>
		<input type="text" name="newdescription" id="newdescription" placeholder="description" value="<?php echo ($edit_work['description']);?>"> <br><br>

		<input type="submit" name="submit" value="OK">

	</form>

</body>
</html>
