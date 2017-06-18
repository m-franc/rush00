<?php

function 	get_category_by_id($connect, $id)
{
	if (!($categories = mysqli_query($connect, "SELECT * FROM categories WHERE id = '".$id."'")))
	{
		echo "ERROR\n";
		die();
	}
	return ($categories);
}

function 	get_categories($connect)
{
	if (!($categories = mysqli_query($connect, "SELECT * FROM categories")))
	{
		echo "ERROR\n";
		die();
	}
	return ($categories);
}

function 	del_category_by_id($connect, $id)
{
	if (!($query = mysqli_query($connect, "DELETE FROM categories WHERE id = '".$id."'")))
		echo "FAIL DELETE CAT";
}

function 	del_categeories_product_by_category_id($connect, $id)
{
	if (!($query = mysqli_query($connect, "DELETE FROM categories_products WHERE category_id = '".$id."'")))
		echo "FAIL DELETE CAT PRODUCT";
}

function 	new_category($connect, $category)
{
	if (!($query = mysqli_query($connect, "INSERT INTO categories (name) VALUES('".$category."')")))
		echo "ERROR\n";
}

function 	modif_category($id, $connect, $category)
{
	if (!($query = mysqli_query($connect, "UPDATE categories SET name='".$category."' WHERE id='".$id."'")))
	{
		echo "ERROR\n";
	}
}

?>