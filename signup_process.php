<?php

$connect = mysqli_connect("localhost", "admin", "admin", "rush00") or die ("Error " . mysqli_error($connect));

	$user_login = $_POST["pseudo"];
	$user_password = $_POST["passwd"];
	$user_password2 = $_POST["confirm_passwd"];
	$user_email = $_POST["email"];

	if ($user_password == $user_password2 && strlen($user_login) > 3  && strlen($user_password) > 5)
	{
		$req = $connect->prepare('SELECT * FROM users WHERE login = ? OR email = ?');
		$req->bind_param('ss', $user_login, $user_email);
		$req->execute();
		$user = $req->get_result()->fetch_assoc();
		if (!$user)
		{
			$req2 = $connect->prepare('INSERT INTO users (login, 
														password, 
														email, 
														user_groupe)
										VALUES(?,?,?,0)');
			$req2->bind_param('sss', $user_login, hash("sha512", $user_password), $user_email);
			$req2->execute();
			$req3 = $connect->prepare('SELECT * FROM users WHERE login = ?');
			$req3->bind_param('s', $user_login);
			$req3->execute();
			$user = $req3->get_result()->fetch_assoc();
			if ($user) {
				session_start();
				$_SESSION["id_user"] = $user["id"];
				$_SESSION["login"] = $user["login"];
				header("Location: index.php");
				die();
			}

		}
	}
	header("Location: signup.php");
	die();
?>