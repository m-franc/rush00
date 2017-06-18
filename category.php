<?php

	$category_id = $_GET["id"];
	include_once("header.php");
	include_once("navbar.php");

	if (!$category_id || !is_numeric($category_id))
	{
		$req = 'SELECT * FROM products';
		$products = mysqli_query($connect, $req);
		?>
		<div id="category">
		<h3>Tous les jeux</h3>
		<div id="product_list">
		<?php
		 foreach ($products as $product) { ?>
			<div class=product>
						<?=$product['name']?> <br>
						<img src="<?=$product["image"]?>">
						<?=$product['price']?> EUR <br>
						<?=$product['quantity']?> restants<br>
						<form action="buy_button.php?id=<?= $product['id']; ?>&cat=<?= $category['id']; ?>" method="POST">
							<input type="submit" name="buy" value="Acheter">
						</form>
			</div>
	
		<?php
		}?>
		</div>
		</div>
		<?php
	}
	else
	{
		$req = 'SELECT * FROM categories WHERE id = ' . $category_id;
		$category = mysqli_query($connect, $req);
		$category = $category->fetch_assoc();
		$req = 'SELECT p.*
				FROM categories as c
					JOIN categories_products AS cp ON cp.category_id = c.id
					JOIN products AS p ON p.id = cp.product_id
				WHERE c.id = '. $category_id;
		$products = $connect->query($req);
		if ($products->num_raws == 1)
			$products = array(0 => $products->fetch_assoc());
		else
			$products = $products->fetch_all(MYSQLI_ASSOC);

	?>

	<div id="category">
		<h3><?=$category["name"];?></h3>
		<div id="product_list">
			<?php foreach ($products as $product) { ?>
				<div class=product>
							<?=$product['name']?> <br>
							<img src="<?=$product["image"]?>">
							<?=$product['price']?> EUR <br>
							<?=$product['quantity']?> restants<br>
							<form action="buy_button.php?id=<?= $product['id']; ?>&cat=<?= $category['id']; ?>" method="POST">
								<input type="submit" name="buy" value="Acheter">
							</form>
				</div>
			<?php
			} ?>
		</div>
	</div>
	<?php 
	}

?>

<?php
	include_once("footer.php");
?>