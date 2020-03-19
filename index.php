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

    <a href="disconnected.php">Me déconnecter</a><br><br>
    <a href="works.php">Works</a><br><br>
    <a href="login.php">me co</a><br><br>

    <?php 

        $allpres = $pres->get_description();
        echo ("$allpres[1]");

    ?>

    <br>
    <a href="edit_desc.php?id=<?php echo($allpres["id"])?>">Modifier ma description</a>


</body>
</html>








