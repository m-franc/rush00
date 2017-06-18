<?php

include_once("categories.php");

function 	get_products($connect)
{
	if (!($products = mysqli_query($connect, "SELECT * FROM products")))
	{
		echo "ERROR\n";
		die();
	}
	return ($products);
}

function 	new_product($connect, $name, $price, $quantity, $image, $categories)
{
	if (!($query = mysqli_query($connect, "INSERT INTO products (name,
																price, 
																quantity, 
																image) VALUES('".$name."',
																				'".$price."',
																				'".$quantity."',
																				'".$image."')")))

		echo "ERbhjlROR\n";
	if (!($last_product = mysqli_query($connect, "SELECT max(id) FROM products GROUP BY id")))
		echo "FAIL\n";
	$last_product_id = $last_product->num_rows;
	$categories_tmp = get_categories($connect);
	if (isset($categories))
	{
		foreach ($categories as $category)
			$name_categories[] = $category;
	}
	foreach ($categories_tmp as $category)
		$db_categories[] = $category;
	$i = 0;
	for($i = 0; $i < count($name_categories); $i++)
	{	
		for($o = 0; $o < count($db_categories); $o++)
		{	
			if ($name_categories[$i] == $db_categories[$o]["name"])
			{
				if (!($last_product = mysqli_query($connect, "INSERT INTO categories_products (category_id, product_id) 
					VALUES('".$db_categories[$o]["id"]."', '".$last_product_id."')")))
					echo "FAIL INIT CAT\n";
			}
		}
	}
}

function 	modif_product($id, $connect, $name, $price, $quantity, $image, $categories)
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
	if (isset($categories))
	{
		foreach ($categories as $category)
			$name_categories[] = $category;
	}
	foreach ($categories_tmp as $category)
		$db_categories[] = $category;

	for($i = 0; $i < count($db_categories); $i++)
	{
		$last_product = mysqli_query($connect, "INSERT INTO categories_products (category_id, product_id) 
			VALUES('".$db_categories[$i]["id"]."', '".$last_product_id."') WHERE ".$name_categories[$i]." = ".$db_categories[$i]["name"].")");
	}
}


?>