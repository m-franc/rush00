<?php

session_start();

include_once("product.php");

$connect = mysqli_connect("localhost", "admin", "admin", "rush00") or die ("Error " . mysqli_error($connect));

if ($_POST["id"] == "")
	new_product($connect, $_POST["name"], intval($_POST["price"]), intval($_POST["quantity"]), $_POST["image"], $_POST["category"]);
else
	modif_product(intval($_POST["id"]), $connect, $_POST["name"], intval($_POST["price"]), intval($_POST["quantity"]), $_POST["image"], $_POST["category"]);

//;
?>