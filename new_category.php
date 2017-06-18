<?php

session_start();

include_once("categories.php");

$connect = mysqli_connect("localhost", "admin", "admin", "rush00") or die ("Error " . mysqli_error($connect));

if ($_POST["id"] == "")
	new_category($connect, $_POST["name_categorie"]);

//header("admin.php");
//else
//	modif_category(intval($_POST["id"]), $connect, $_POST["name_categorie"]);
//header("Location: admin.php");
?>