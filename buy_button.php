<?php

$connect = mysqli_connect("localhost", "admin", "admin", "rush00") or die ("Error " . mysqli_error($connect));

	$category_id = $_GET["cat"];
	$product_id = $_GET["id"];

	if (is_numeric($category_id) && is_numeric($product_id)) {
		$req = $connect->query('SELECT quantity FROM products WHERE id = '.$product_id);
		$prod = $req->fetch_assoc();
		if ($prod["quantity"] > 0)
		{
			$connect->query('UPDATE products SET quantity = '. ($prod["quantity"] - 1) .' WHERE id = ' . $product_id);
			if ($_COOKIE["$product_id"] > 0)
				setcookie("$product_id", $_COOKIE["$product_id"] + 1);
			else
				setcookie("$product_id", 1);
		}
	}
	header("Location: category.php?id=".$category_id);
	die();
?>