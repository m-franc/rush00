<?php

	include_once("header.php");
	include_once("navbar.php");
	$category_id = $_GET["id"];
	if (is_numeric($category_id)) {
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
	}

?>

<div id="cart">
		<?php	foreach ($_COOKIE as $id => $q) {
				if (strlen($id) < 4 && strlen($q) < 4)
				{
					$req = $connect->prepare('SELECT * FROM products WHERE id = ?');
					$req->bind_param('s', $id);
					$req->execute();
					$pr = $req->get_result()->fetch_assoc();
					$prname = $pr['name'];
					$prprice = $pr['price'] * $q;
					$total += $prprice;
					echo "vous avez $q $prname : $prprice EUR";
					?><br><?php
				}
			} 
			echo "<br><br>Prix Total: $total EUR"; ?>

		<br>

		<?php if (isset($_SESSION['login'])) {?>
			<form method="POST" action="buy.php">	
				<input type="submit" name="OK" value="Valider">
			</form>
		<?php }
		else
		{ ?>
			<p>Vous devez <a href="signin.php">vous connecter</a> a votre compte pour valider vos achat.</p>
			<p>Si vous n'en avez pas, <a href="signup.php">inscrivez vous</a>.</p>
		<?php } ?>
</div>




<?php
	include_once("footer.php");
?>