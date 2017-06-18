<?php

session_start();
include_once("product.php");
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
	if ($_POST["name"] != NULL && $_POST["price"] != NULL && $_POST["quantity"] != NULL && $_POST["image"] != NULL && $_POST["category"] != NULL)
		new_product($connect, $_POST["name"], intval($_POST["price"]), intval($_POST["quantity"]), $_POST["image"], $_POST["category"]);
}
else
{
	if ($_POST["name"] != NULL && $_POST["price"] != NULL && $_POST["quantity"] != NULL && $_POST["image"] != NULL && $_POST["category"] != NULL)
		modif_product(intval($_POST["id"]), $connect, $_POST["name"], intval($_POST["price"]), intval($_POST["quantity"]), $_POST["image"], $_POST["category"]);
}
header("Location: admin_list.php?admin_list=products&submit=valider");
die();
?>