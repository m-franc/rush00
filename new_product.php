<?php

include_once("new_category,php");

function 	new_product($connect, $name, $price, $quantity, $image, $categories)
{

	if (!($query = mysqli_query($connect, "INSERT INTO products (name,
																price, 
																quantity, 
																image) VALUES('".$name."',
																				'".$price."',
																				'".$quantity."',
																				'".$image."')")))

		echo "ERROR\n";
	if (!($last_product = mysqli_query($connect, "SELECT max(id) FROM products GROUP BY id")))
		echo "FAIL\n";
	$last_product_id = $last_product->num_rows;
	$categories_tmp = get_categories($connect);
	for($i = 0; $i < count($categories_tmp)
	{
		if (!($last_product = mysqli_query($connect, "INSERT INTO categories_products (category_id, product_id) VALUES('".$categores_tmp[$i]["id"]."', '".$last_product_id."') WHERE ".$categores_tmp[$i]["name"]." = ".$categories[$i]["name"].")")))
			echo "FAIL";
	}
}

?>