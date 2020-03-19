<!DOCTYPE html>

<?php

include_once("php/code.php");
global $db;
session_start();

$user = new Users;

if(isset($_SESSION["account"]["id"]))
{
    header('Location: index.php');
}

if(isset($_POST["submit"]))
{
    if($_POST["submit"] === "Je m'inscris")
	{
	    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
	    {
	        $pseudo = htmlspecialchars($_POST['pseudo']); //sécurisé les données et éviter les injections SQL
	        $mail = htmlspecialchars($_POST['mail']);
	        $mail2 = htmlspecialchars($_POST['mail2']);

	        $pseudolength = strlen($pseudo); //longueur du mdp
	        if ($pseudolength <=255) {

	        	if ($mail == $mail2) {

	        		if(filter_var($mail, FILTER_VALIDATE_EMAIL)) { //ici on vérifie que l'adresse mail est bien valide

		        		if ($_POST['mdp'] == $_POST['mdp2']) {

		        			$motdepasse = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
		        			$user->create($_POST["pseudo"], $_POST["mail"], $motdepasse);
		        			header("Location: login.php");
		        		}
		        		else{
		        			$erreur = "Vos mots de passe ne correspondent pas !";
		        		}
		        	}
		        	else{

		        		$erreur = "Votre adresse mail n'est pas valide !";
		        	}
	        	}
	        	else{
	        		$erreur = "Vos adresses mail ne correspondent pas !";
	        	}
	        }
	        else{
	        	$erreur ="Votre pseudo ne doit pas dépasser 255 caractères !";
	        }
	    }
	    else{

	    	$erreur = "Tous les champs doivent être remplis !";
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
<a href="inscription.php" class="btndeco btn btn-outline-warning" role="button" aria-pressed="true">Inscription</a>
<a href="disconnected.php" class="btndeco btn btn-outline-info" role="button" aria-pressed="true">Déconnexion</a>
</form>
</div>
</nav>

<!-- NAV BAR -->

<!-- VAGUE -->

<svg class="modifvague" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 250"><path fill="#333a40" fill-opacity="1" d="M0,64L80,96C160,128,320,192,480,186.7C640,181,800,107,960,85.3C1120,64,1280,96,1360,112L1440,128L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path></svg>

<!-- VAGUE -->



	<h1 style="margin-top: 30px;
    text-align: center;
    font-weight: bold;
    font-size: 50px;
    color: #333a40;
    margin-bottom: 60px;">Formulaire d'inscription 📝</h1>

	<form method="POST" action="">

<div class="bloc-login">

		<label for="pseudo">Pseudo :</label><br>
		<input type="text" class="form-control" placeholder="Votre pseudo" id="pseudo" name="pseudo" autofocus>
		<br><br>

		<label for="mail">Mail :</label><br>
		<input type="email" class="form-control" placeholder="Votre mail" id="mail" name="mail">
		<br><br>

		<label for="mail2">Confirmation du mail :</label><br>
		<input type="email" class="form-control" placeholder="Confirmer votre mail" id="mail2" name="mail2">
		<br><br>

		<label for="mdp">Mot de passe :</label><br>
		<input type="password" class="form-control" placeholder="Votre mot de passe" id="mdp" name="mdp">
		<br><br>

		<label for="mdp2">Confirmer votre mot de passe :</label><br>
		<input type="password" class="form-control" placeholder="Votre mot de passe" id="mdp2" name="mdp2">
		<br><br>

</div>
		<input style="margin-bottom: 30px;" class="btnvalider btn btn-primary" type="submit"  name="submit" value="Je m'inscris">

	</form>

	<?php

		if(isset($erreur)) {
			echo ($erreur);
		}
	?>

</body>
</html>
