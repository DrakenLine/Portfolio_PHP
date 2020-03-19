<?php

	require('database.php');

	class Users {   //gérer user
		function get_user($id){

			//ici on récupère un user (?)

			global $db;

			$request = "SELECT * FROM USERS WHERE id=$id";
			$result = $db->query($request);
			$user = $result->fetch();

			return($user);
		}

		function connect($pseudo, $password){

			global $db;

			$request = "SELECT * FROM USERS WHERE pseudo= \"$pseudo\"";
			$result = $db->query($request);
			$user = $result->fetch();

			//ici on va vérifier que c'est le bon mdp avec le bon utilisateur

			if (password_verify($password, $user["password"])) {

				session_start();

				$_SESSION["account"] =[
					'id' => $user["id"],
					'pseudo' => $user["pseudo"]
				];

				header('Location: index.php'); //rediriger l'user sur la homepage
			}
			else{
				echo("Impossible de se connecter");
			}
		}

		function create($pseudo, $mail, $password){

			global $db;

			$request = $db->prepare('INSERT INTO USERS (pseudo, mail, password) VALUES (?, ?, ?)');
			$request->execute([$pseudo, $mail, $password]);
		}
	}

	class Works{    //gérer works
		function get_works(){

			global $db;

			$request = "SELECT * FROM WORKS";
			$result = $db->query($request);
			$user = $result->fetchAll();

			return($user);
		}

		function create($titre, $description){

			global $db;

			$request = $db->prepare('INSERT INTO WORKS (titre, description) VALUE (?, ?)');
			$request->execute([$titre, $description]);
		}

		function update($titre, $description, $id){

			global $db;

			$request = $db->prepare('UPDATE WORKS SET titre=?, description=? WHERE id=?');
			$request->execute([$titre, $description, $id]);
		}

		function delete($id){

			global $db;

			$request = $db->prepare('DELETE FROM WORKS WHERE id=?');
			$request->execute([$id]);

		}
	}

	class Description{

		function get_description(){

			global $db;

			$request = "SELECT * FROM DESCRIPTION";
			$result = $db->query($request);
			$user = $result->fetch();

			return($user);
		}

		function update($pres, $id){

			global $db;

			$request = $db->prepare('UPDATE DESCRIPTION SET pres=? WHERE id=?');
			$request->execute([$pres, $id]);
		}
	}

?>












