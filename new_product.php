<?php

include_once("new_category.php");

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

$connect = mysqli_connect("localhost", "admin", "admin", "rush00") or die ("Error " . mysqli_error($connect));

if (!isset($_POST["id"]))
	new_product($connect, $_POST["name"], intval($_POST["price"]), intval($_POST["quantity"]), $_POST["image"], $_POST["category"]);
else
	modif_product(intval($_GET["id"]), $connect, $_POST["name"], intval($_POST["price"]), intval($_POST["quantity"]), $_POST["image"], $_POST["category"]);

?>