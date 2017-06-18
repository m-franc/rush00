<?php

$connect = mysqli_connect("localhost", "admin", "admin", "rush00") or die ("Error " . mysqli_error($connect));
			session_start();

	$user_login = $_POST["pseudo"];
	$user_password = $_POST["passwd"];
	$user_password2 = $_POST["confirm_passwd"];
	$user_email = $_POST["email"];

	if ($user_password == $user_password2 && strlen($user_login) > 3  && strlen($user_password) > 5)
	{
		$req = $connect->prepare('SELECT * FROM users WHERE login = ? OR email = ?');
		$req->bind_param('ss', $user_login, $user_email);
		$req->execute();
		$user = $req->get_result();
		if ($user->num_raws > 1)
		{
			header("Location: acount.php");
			die();
		}
		$user = $user->fetch_assoc();
		if (!$user || $user["id"] == $_SESSION["id_user"])
		{
			$req = $connect->prepare('SELECT * FROM users WHERE id = ?');
			$req->bind_param('s', $_SESSION["id_user"]);
			$req->execute();
			$user = $req->get_result()->fetch_assoc();
			include('user.php');
			modif_user($_SESSION["id_user"], $connect, $user_login, $user_password, $user_password2, $user_email, $user["user_groupe"]);
			$_SESSION["id_user"] = $user["id"];
			$_SESSION["login"] = $user_login;
		}

	// echo $user["id"];
	// var_dump ($_SESSION);
	// echo $_SESSION["id_user"];
	}
	header("Location: account.php");
	die();
?>