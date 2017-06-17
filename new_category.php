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

?>