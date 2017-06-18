<?php

include_once("user.php");

$connect = mysqli_connect("localhost", "admin", "admin", "rush00") or die ("Error " . mysqli_error($connect));

if ($_POST["id"] == "")
	new_user($connect, $_POST["pseudo"], $_POST["password"], $_POST["confirm_password"], $_POST["email"], intval($_POST["user_groupe"]));
else
	modif_user(intval($_POST["id"]), $connect, $_POST["pseudo"], $_POST["password"], $_POST["confirm_password"], $_POST["email"], intval($_POST["user_groupe"]));
header("Location: admin_list.php?admin_list=users&submit=valider");
die();
?>