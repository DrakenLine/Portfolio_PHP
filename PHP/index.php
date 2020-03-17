<!DOCTYPE html>
<?php
session_start();
include_once("php/code.php");

$user = new Users;
$works = new Works;
?>
<html>
<head>
	<title>PHP</title>
	<meta charset="utf-8">
</head>
<body>
	<p>Bonjour <?php if(isset($_SESSION["account"]["username"]))
    {
        echo($_SESSION["account"]["username"]);
    }
    else
    {
        echo "NOT CONNECTED";
    }
        ?></p>

    <br>
    <?php
        $allworks = $work->get_works();
        foreach($allworks as $w)
        {
            echo($w["title"]);
            echo("|");
            echo($w["description"]);
        }

    ?>
</body>
</html>