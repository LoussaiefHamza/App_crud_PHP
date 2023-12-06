<?php
session_start();
include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validateEmail($data)
	{
		$data = trim($data); // Supprimer les espaces blancs (ou d'autres caractères spécifiés) au début et à la fin
		$data = stripslashes($data); // Supprimer les antislashs
		$data = htmlspecialchars($data); // Convertir les caractères spéciaux en entités HTML

		// Vérifier si $data est un email
		if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
			die("Erreur : '$data' n'est pas un email valide."); // Arrêter l'exécution du script avec un message d'erreur
		}

		return $data; // Retourner la donnée validée
	}

	function validatePassword($data)
	{
		$data = trim($data); //supprimer les espaces blancs (ou d'autres caractères spécifiés) au début et à la fin
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$email = validateEmail($_POST['email']);
	$pass = validatePassword($_POST['password']);

	if (empty($email)) {
		header("Location: index.php?error=Email est réquis");
		exit();
	} else if (empty($pass)) {
		header("Location: index.php?error=Mot de passe est réquis");
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			if ($row['email'] === $email && $row['password'] === $pass) {
				$_SESSION['email'] = $row['email'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['id'] = $row['id'];
				header("Location: crud_app/index.php");
				exit();
			} else {
				header("Location: index.php?error=Incorect User name or password");
				exit();
			}
		} else {
			header("Location: index.php?error=Incorect User name or password");
			exit();
		}
	}

} else {
	header("Location: index.php");
	exit();
}