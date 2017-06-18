<?php

	session_start();
	$connect = mysqli_connect("localhost", "admin", "admin", "rush00") or die ("Error " . mysqli_error($connect));

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="customs/style.css">
	<title>Site E-commerce</title>
</head>
	<body>
	<header>
		<a href="index.php"><h1 id="nom_du_site">Site E-commerce</h1></a>
		<div class="right">
			<div id="mycart"><a href="mycart.php">Mon Panier</a></div>
			<div id="connexion">
				<? if (!$_SESSION["login"]): ?>
					<span id="login">
						<a href="signin.php">Se connecter</a>
					</span>
					<span>
					|
					</span>
					<span id="logout">
						<a href="signup.php">S'inscrire</a>
					</span>
				<? else: ?>

					<span id="hello">
						Bonjour <?= $_SESSION["login"] ?>
					</span>
					<span>
					|
					</span>
					<span id="logout">
						<a href="logout_process.php">Se deconnecter</a>
					</span>
				<? endif; ?>
			</div>
		</div>
	</header>