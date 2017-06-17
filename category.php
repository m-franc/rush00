<?php

	include_once("header.php");

	$category_id = $_GET["id"];
	if ($category_id) {
		$req = 'SELECT p.*
				FROM categories as c
					JOIN categories_products AS cp ON cp.category_id = c.id
					JOIN products AS p ON p.id = cp.product_id
				WHERE p.id = '. $category_id;
		$products = $mysqli->query($req);
		$products = $products->fetch();
		var_dump($products);
	}

?>