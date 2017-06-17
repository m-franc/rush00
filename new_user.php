<?php


function 	new_user($login, $password, $confirm_password, $email, $user_groupe)
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

?>