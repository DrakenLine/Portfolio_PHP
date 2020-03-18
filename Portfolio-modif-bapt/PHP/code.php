<?php

	require('database.php');

	class Users {
		function get_user($id){

			global $db;

			$request = "SELECT * FROM USERS WHERE id=$id";
			$result = $db->query($request);
			$user = $result->fetch();

			return($user);
		}

		function connect($username, $password){

			global $db;

			$request = "SELECT * FROM USERS WHERE username=\"$username\"";
			$result = $db->query($request);
			$user = $result->fetch();


			if (password_verify($password, $user["password"])) {

				session_start();

				$_SESSION["account"] =[
					'id' => $user["id"],
					'username' => $user["username"]
				];

				header('Location: index.php'); //rediriger l'user sur la homepage
			}
			else{
				echo("Impossible de se connecter");
			}
		}
	}

	class Works{
		function get_works(){
			global $db;

			$request = "SELECT * FROM WORKS";
			$result = $db->query($request);
			$user = $result->fetchAll();

			return($user);
		}

		function create($title, $description){

			global $db;

			$request = $db->prepare('INSERT INTO WORKS (title, description) VALUE (?, ?)');
			$request->execute([$title, $description]);
		}

		function update($title, $description, $id){

			global $db;

			$request = $db->prepare('UPDATE WORKS SET title=?, description=? WHERE id=?');
			$request->execute([$title, $description, $id]);
		}


	}

	class Presentation{
		function get_presentation(){
			global $db;

			$request = "SELECT * FROM Description";
			$result = $db->query($request);
			$user = $result->fetch();

			return($user);
		}

		function update($presentation, $id){

			global $db;

			$request = $db->prepare('UPDATE Description SET presentation=?, WHERE id=?');
			$request->execute([$presentation, $id]);
		}


	}

?>
