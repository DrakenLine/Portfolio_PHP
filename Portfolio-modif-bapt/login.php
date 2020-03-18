<!DOCTYPE html>
<?php

//page de login avec vérification de connexion et redirection (à rajouter)

session_start();
include_once("php/code.php");

$user = new Users;
if(isset($_SESSION["account"]["id"]))
{
    header('Location: /');
}
if(isset($_POST["submit"]))
{
    if($_POST["submit"] === "OK")
{
    if($_POST['pseudo'] != NULL && $_POST['mdp'] != NULL)
    {
    	//echo (password_hash("admin", PASSWORD_BCRYPT));
        $user->connect($_POST["pseudo"], $_POST["mdp"]);
    }
    else
    {
        echo("Remplis le formulaire");
    }
}
}
?>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<h1>Connexion : </h1>

	<form action="login.php" method="post">

	<label for="pseudo">Pseudo :</label>
	<input type="text" name="pseudo" id="pseudo" placeholder="Entrez votre pseudo" required autofocus=""> <br>

	<label for="mdp">Mot de passe :</label>
	<input type="password" name="mdp" id="mdp" placeholder="Entrez votre mot de passe" required> <br>

	<button type="submit" name="submit" value="OK">Valider</button>


	</form>

</body>
</html>
