<?php

session_start();
include_once("categories.php");
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
	if ($_POST["name_categorie"] != NULL)
		new_category($connect, $_POST["name_categorie"]);
}
else
{	
	if ($_POST["name_categorie"] != NULL)
		modif_category(intval($_POST["id"]), $connect, $_POST["name_categorie"]);
}
header("Location: admin_list.php?admin_list=categories&submit=valider");
die();
?>