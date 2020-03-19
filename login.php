<!DOCTYPE html>
<?php

//page de login avec vérification de connexion et redirection

session_start();
include_once("php/code.php");

$user = new Users;
if(isset($_SESSION["account"]["id"]))
{
    header('Location: index.php');
}
if(isset($_POST["submit"]))
{
    if($_POST["submit"] === "OK")
{
	    if($_POST['pseudoconnect'] != NULL && $_POST['mdpconnect'] != NULL)
	    {
	    	//echo (password_hash("admin", PASSWORD_BCRYPT));
	        $user->connect($_POST["pseudoconnect"], $_POST["mdpconnect"]);
	    }
	    else
	    {
	        echo("Remplis le formulaire 🙏");
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






	<h1 class="login-titre">Connexion 👨🏼‍💻👩🏼‍💻 : </h1>

	<form action="login.php" method="post">

<div class="bloc-login">


	<label for="pseudoconnect">Pseudo :</label>
	<input type="text" class="form-control" name="pseudoconnect" id="pseudoconnect" placeholder="Entrez votre pseudo" required autofocus=""> <br>

	<label for="mdpconnect">Mot de passe :</label>
	<input type="password" class="form-control" name="mdpconnect" id="mdpconnect" placeholder="Entrez votre mot de passe" required> <br>

</div>

	<button type="submit" class="btnvalider btn btn-primary" name="submit" value="OK">Se connecter</button>


	</form>

</body>
</html>
