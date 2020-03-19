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
		        			header("Location: index.php");
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
	<title>Inscription</title>
</head>
<body>

	<h1>Formulaire d'inscription</h1>

	<form method="POST" action="">
		
		<label for="pseudo">Pseudo :</label>
		<input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" autofocus>
		<br><br>

		<label for="mail">Mail :</label>
		<input type="email" placeholder="Votre mail" id="mail" name="mail">
		<br><br>

		<label for="mail2">Confirmation du mail :</label>
		<input type="email" placeholder="Confirmer votre mail" id="mail2" name="mail2">
		<br><br>

		<label for="mdp">Mot de passe :</label>
		<input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp">
		<br><br>

		<label for="mdp2">Confirmer votre mot de passe :</label>
		<input type="password" placeholder="Votre mot de passe" id="mdp2" name="mdp2">
		<br><br>

		<input type="submit" name="submit" value="Je m'inscris">

	</form>

	<?php 

		if(isset($erreur)) {
			echo ($erreur);
		}
	?>

</body>
</html>