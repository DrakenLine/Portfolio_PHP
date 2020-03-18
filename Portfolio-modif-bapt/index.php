<!DOCTYPE html>
<?php

//Homepage avec vérification de si on est connecté

session_start(); //démarre ou continue une session
include_once("php/code.php");

$user = new Users;
$presentation = new Presentation;
?>

<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/master.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Baptou & Ninoune</title>
</head>
<body>

	<div class="alert alert-danger" role="alert" style="text-align: center;">
  ARTHUNG ARTHUNG ! Le portfolio est en cours de développement. - La direction
  </div>

    <!-- NAVBAR -->

    <nav class="modif-navbar navbar navbar-expand-lg navbar-dark bg-dark"">
  <a class="titre-navbar navbar-brand" href="index.php">Baptou & Ninoune</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Accueil<span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">Menu 1</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">Menu 2</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">Menu 3</a>
      </li>
    </ul>


    <a href="login.php"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Connexion</button></a>
    <a href="disconnected.php"><button class="btn btn-outline-primary" style="margin-left: 20px;" type="submit">Déconnexion</button></a>

  </div>
</nav>

    <!-- NAVBAR -->
<svg class="svg-modif" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 270"><path fill="#333a40" fill-opacity="1" d="M0,224L48,197.3C96,171,192,117,288,122.7C384,128,480,192,576,213.3C672,235,768,213,864,170.7C960,128,1056,64,1152,74.7C1248,85,1344,171,1392,213.3L1440,256L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>



    <h1 class="titre1-homepage">BIENVENUE SUR NOTRE PORFOLIO !</h1>

<p class="paragraphe1-homepage">
		<?php
			$Prez = $presentation->get_presentation();
			echo ($Prez['presentation']);
		 ?>
</p>


		 	<a href="">MODIFIER</a>


<p>Bonjour <?php if(isset($_SESSION["account"]["username"])) //ici ça vérifie si l'utilisateur est bien connecté
	{
			echo($_SESSION["account"]["username"]);
	}
	else
	{
			echo "NOT CONNECTED";
	}
			?></p>

			<br>


	    <!--
	    <?php /*
	        $allworks = $work->get_works();
	        foreach($allworks as $w)
	        {
	            echo($w["title"]);
	            echo("|");
	            echo($w["description"]);
	        }*/

	    ?> -->

</body>
</html>
