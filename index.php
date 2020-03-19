<!DOCTYPE html>
<?php

//Homepage avec vérification de si on est connecté

session_start(); //démarre ou continue une session
include_once("php/code.php");

$user = new Users;

?>

<html>
<head>
	<title>PHP</title>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
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

    <a href="disconnected.php">Me déconnecter</a>
    <a href="works.php">Works</a>
    <a href="login.php">me co</a>

</body>
</html>