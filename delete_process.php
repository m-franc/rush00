<?php

	include_once("user.php");

	session_start();

	if ($_SESSION["login"]) {
		$connect = mysqli_connect("localhost", "admin", "admin", "rush00") or die ("Error " . mysqli_error($connect));
		del_user_by_id($connect, $_SESSION["id_user"]);
		session_destroy();
	}
	header("Location: index.php");
	die();
?>