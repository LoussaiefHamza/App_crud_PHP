<!DOCTYPE html>
<html>

<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<form action="login.php" method="post">
		<h2>Connexion</h2>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error">
				<?php echo $_GET['error']; ?>
			</p>
		<?php } ?>
		<label>Email</label>
		<input type="text" name="email"><br>

		<label>Mot de passe</label>
		<input type="password" name="password"><br>

		<button type="submit">Connexion</button>
	</form>
</body>

</html>