<?php

function 	get_users($connect)
{
	if (!($users = mysqli_query($connect, "SELECT * FROM users")))
	{
		echo "ERROR\n";
		die();
	}
	return ($users);
}


function 	new_user($connect, $login, $password, $confirm_password, $email, $user_groupe)
{
	if ($password != $confirm_password)
	{
		echo "Le champs mot de passe et confirmation de mot de passe ne sont pas identique\n";
		die();
	}
	$password = hash("sha512", $password);
	if (!($query = mysqli_query($connect, "INSERT INTO users (login,
															password, 
															email, 
															user_groupe) VALUES('".$login."',
																			'".$password."',
																			'".$email."',
																			'".$user_groupe."')")))
	{
		echo "fail";
		echo "ERROR\n";
	}
}

function 	modif_user($id, $connect, $login, $password, $confirm_password, $email, $user_groupe)
{
	if ($password != $confirm_password)
	{
		echo "Le champs mot de passe et confirmation de mot de passe ne sont pas identique\n";
		die();
	}
	$password = hash("sha512", $password);
	if (!($query = mysqli_query($connect, "INSERT INTO users (login,
															password, 
															email, 
															user_groupe) VALUES('".$login."',
																			'".$password."',
																			'".$email."',
																			'".$user_groupe."')")))
	{
		echo "fail";
		echo "ERROR\n";
	}
}

$connect = mysqli_connect("localhost", "admin", "admin", "rush00") or die ("Error " . mysqli_error($connect));

if (!isset($_POST["id"]))
	new_user($connect, $_POST["pseudo"], $_POST["password"], $_POST["confirm_password"], $_POST["email"], intval($_POST["user_groupe"]));
else
	modif_user(intval($_GET["id"]), $connect, $_POST["pseudo"], $_POST["password"], $_POST["confirm_password"], $_POST["email"], intval($_POST["user_groupe"]));


?>