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
	<title>Ninoune & Baptou - Le Portfolio</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<!-- NAV BAR -->

	<nav class="modifnavbar navbar navbar-expand-lg navbar navbar-dark bg-dark">
<a class="navbar-brand" style="font-weight: bold; font-size: 22px;" href="index.php">Ninoune & Baptou</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto">
<li class="nav-item">
	<a class="nav-link" href="index.php">Accueil</a>
</li>
<li class="nav-item">
	<a class="nav-link" href="works.php">Projets</a>
</li>
<li class="nav-item">
	<a class="nav-link" href="#">A propos</a>
</li>
</ul>
<form class="form-inline my-2 my-lg-0">
<a href="login.php" class="btn btn-outline-success" role="button" aria-pressed="true">Connexion</a>
<a href="disconnected.php" class="btndeco btn btn-outline-info" role="button" aria-pressed="true">Déconnexion</a>
</form>
</div>
</nav>

<!-- NAV BAR -->

<!-- VAGUE -->

<svg class="modifvague" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 250"><path fill="#333a40" fill-opacity="1" d="M0,64L80,96C160,128,320,192,480,186.7C640,181,800,107,960,85.3C1120,64,1280,96,1360,112L1440,128L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path></svg>

<!-- VAGUE -->



	<h1 class="edit-desc-titre">Modifier la description ✏️ :</h1>

	<form method="post" action="edit_desc.php?id=<?php echo($_GET["id"])?>">

		<div class="bloc-edit-desc">

		<label class="edit-desc-titre2" for="newdescription">Contenu de la description :</label><br>
		<textarea class="form-control" style="width: 80%; height: 200px;" type="text" name="newdescription" id="newdescription" placeholder="description" value="<?php echo ("$allpres[1]");?>"><?php echo ("$allpres[1]");?></textarea> <br><br>

		</div>

		<input class="edit-desc-ok btn btn-primary" type="submit" name="submit" value="OK">

	</form>

</body>
</html>
