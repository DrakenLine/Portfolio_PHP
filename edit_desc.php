<!DOCTYPE html>
<?php 
	
	session_start(); //démarrer une suession ou continuer la précédente
	include_once("php/code.php"); //intégrer code.php pour les fonctions
	global $db; //appreler la bdd

	$user = new Users;
	$pres = new Description;

	if (isset($_SESSION['account']['username'])) { //vérif si co

		$allpres = $pres->get_description(); //on récup la description dans la bdd
	}
	else{
		header("Location: index.php"); //si pas co, alors rediriger vers homepage
	}

	if(isset($_POST["submit"]))
	{
	    if($_POST["submit"] === "OK")
		{
		    if($_POST["newdescription"] != NULL)
		    {
		        $pres->update($_POST["newdescription"], $_GET["id"]);
		        header("Location: index.php");
		    }
		}
	}
?>
<html>
<head>
	<title>Modifier la descrition :</title>
</head>
<body>

	<h2>Modifier la description :</h2>

	<form method="post" action="edit_desc.php?id=<?php echo($_GET["id"])?>">

		<label for="newdescription">Contenu de la description :</label>
		<input style="width: 40%;" type="text" name="newdescription" id="newdescription" placeholder="description" value="<?php echo ("$allpres[1]");?>"> <br><br>

		<input type="submit" name="submit" value="OK">

	</form>

</body>
</html>