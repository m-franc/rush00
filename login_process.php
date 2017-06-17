<?php

$connect = mysqli_connect("localhost", "admin", "admin", "rush00") or die ("Error " . mysqli_error($connect));

	$user_login = $_POST["pseudo"];
	$user_password = $_POST["passwd"];

		$req = $connect->prepare('SELECT * FROM users WHERE login = ?');
		$req->bind_param('s', $user_login);
		$req->execute();
		$user = $req->get_result()->fetch_assoc();
		if ($user)
		{
			if ($user["password"] == hash('sha512', $user_password))
			{
				session_start();
				$_SESSION["id_user"] = $user["id"];
				$_SESSION["login"] = $user["login"];
				header("Location: index.php");
				die();
			}
		}
	header("Location: signin.php");
	die();
?>