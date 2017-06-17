<?php

function 	get_categories($connect)
{
	if (!($categories = mysqli_query($connect, "SELECT * FROM categories")))
	{
		echo "ERROR\n";
		die();
	}
	return ($categories);
}

function 	new_category($connect, $category)
{
	if (!($query = mysqli_query($connect, "INSERT INTO categories (name) VALUES('".$category."')")))
		echo "ERROR\n";
}

function 	modif_category($id, $connect, $category)
{
	if (!($query = mysqli_query($connect, "UPDATE categories SET name='".$category."' WHERE categories.id='".$id."'=")))
	{
		echo "ERROR\n";
	}
}

$connect = mysqli_connect("localhost", "admin", "admin", "rush00") or die ("Error " . mysqli_error($connect));

if (!isset($_POST["id"]))
	new_category($connect, $_POST["name_categorie"]);
else
	modif_category(intval($_POST["id"]), $connect, $_POST["name_categorie"]);


?>