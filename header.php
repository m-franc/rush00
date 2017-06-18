<?php

	session_start();
	$connect = mysqli_connect("localhost", "admin", "admin", "rush00") or die ("Error " . mysqli_error($connect));
	$cart = 0;
	foreach ($_COOKIE as $id => $q)
	{
		if (strlen($id) < 4 && strlen($q) < 4)
		{
			$cart += $q;
		}
	} 

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="customs/style.css">
	<title>42-Games</title>
</head>
	<body>
	<header>
		<a href="index.php"><h1 id="nom_du_site">42-Games</h1></a>
		<div class="right">
			<div id="mycart"><a href="mycart.php">Mon Panier<?php if($cart):?><span><?=$cart?></span><?php endif;?></a></div>
			<div id="connexion">
				<? if (!$_SESSION["login"]): ?>
					<span id="login">
						<a class="button" href="signin.php">Se connecter</a>
					</span>
					<span>
					|
					</span>
					<span id="logout">
						<a class="button" href="signup.php">S'inscrire</a>
					</span>
				<? else: ?>

					<span id="hello">
						Bonjour <a href="account.php"><?= $_SESSION["login"] ?></a>
					</span>
					<span>
					|
					</span>
					<span id="logout">
						<a class="button" href="logout_process.php">Se deconnecter</a>
					</span>
				<? endif; ?>
			</div>
		</div>
	</header>