<!DOCTYPE html>
<?php

//Homepage avec vérification de si on est connecté

session_start(); //démarre ou continue une session
include_once("php/code.php");

$user = new Users;
$pres = new Description;

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
      <li class="nav-item active">
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

	<h1 class="homepage-titre1">Bonjour <?php if(isset($_SESSION["account"]["pseudo"])) //ici ça vérifie si l'utilisateur est bien connecté
    {
        echo($_SESSION["account"]["pseudo"]);
				echo " 😃";
    }
    else
    {
        echo "tout le monde ! 😃";
    }
        ?></h1>

    <br>


  <p class="homepage-paragraphe1"> <?php

        $allpres = $pres->get_description();
        echo ("$allpres[1]");

    ?> </p>

    <br>
    <a class="homepage-modifdesc" href="edit_desc.php?id=<?php echo($allpres["id"])?>">Modifier ma description</a>



<a href="works.php" class="btn-voirprojet btn btn-outline-danger" role="button" aria-pressed="true">Voir les projets</a>


</body>
</html>
