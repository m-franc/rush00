<?php

session_start();
include_once("user.php");

$connect = mysqli_connect("localhost", "admin", "admin", "rush00") or die ("Error " . mysqli_error($connect));
$verif_user = get_user_by_id($connect, $_SESSION["id_user"]);
$user = $verif_user->fetch_assoc();

if ($user["user_groupe"] == 0)
{
	header("Location: index.php");
	die();
}

if ($_POST["id"] == "")
{
	if ($_POST["pseudo"] != NULL && $_POST["password"] != NULL && $_POST["confirm_password"] != NULL && $_POST["email"] != NULL)
		new_user($connect, $_POST["pseudo"], $_POST["password"], $_POST["confirm_password"], $_POST["email"], intval($_POST["user_groupe"]));
}
else
{
	if ($_POST["pseudo"] != NULL && $_POST["password"] != NULL && $_POST["confirm_password"] != NULL && $_POST["email"] != NULL)
		modif_user(intval($_POST["id"]), $connect, $_POST["pseudo"], $_POST["password"], $_POST["confirm_password"], $_POST["email"], intval($_POST["user_groupe"]));
}
header("Location: admin_list.php?admin_list=users&submit=valider");
die();
?>