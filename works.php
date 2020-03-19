<!DOCTYPE html>

<?php

//Homepage avec vérification de si on est connecté

session_start(); //démarre ou continue une session
include_once("php/code.php");

$user = new Users;
$work = new Works;
?>


<html>
<head>
	<title>NOS TRAVAUX</title>
</head>
<body>

	<h1>Voici nos travaux</h1>

    <?php

        $allworks = $work->get_works();
        foreach($allworks as $w)
        {
            ?> <h3><?= $w["titre"]; ?></h3> <?php
            ?> <p> <?= $w["description"];?> </p>
            <a href="edit_work.php?id=<?php echo($w["id"])?>">Editer</a>
            <br>
            <a href="delete_work.php?id=<?php echo($w["id"])?>">Supprimer</a>
            <br>
            <?php
        }
    ?>

        <a href="create_work.php">Ajouter</a>
        


</body>
</html>