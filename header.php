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
		<h1 id="nom_du_site">Site E-commerce</h1>
		<div id="connexion">
			<span id="login">
				<a href="signin.php">Se connecter</a>
			</span>
			<span>
			|
			</span>
			<span id="logout">
				<a href="signup.php">S'inscrire</a>
			</span>
		</div>
	</header>