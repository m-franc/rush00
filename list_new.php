<?php

session_start();
include_once("categories.php");
include_once("user.php");
include_once("product.php");

$connect = mysqli_connect("localhost", "admin", "admin", "rush00") or die ("Error " . mysqli_error($connect));
$verif_user = get_user_by_id($connect, $_SESSION["id_user"]);
$user = $verif_user->fetch_assoc();
if ($user["user_groupe"] == 0)
{
	header("Location: index.php");
	die();
}

if ($_GET["type"] == NULL)
	echo "ERROR\n";
else
{
	include_once("header.php");
	if ($_GET["type"] == "categories")
	{
		$category = get_category_by_id($connect, $_GET["id"])->fetch_assoc();
		?>
		<form class="form" method="post" action="new_category.php">
			<label>Nom de la catégorie : </label>
			<input type="text" name="name_categorie" value="<?= $category["name"] ?>">
			<br>
			<input type="hidden" name="id" value="<?php if (isset($_GET["id"])) echo $_GET["id"]; ?>">
			<input type="submit" name="submit" value="valider">
		</form>
		<?php	
	}
	else if ($_GET["type"] == "users")
	{
		$user = get_user_by_id($connect, $_GET["id"])->fetch_assoc();
		?>
		<form class="form" method="post" action="new_user.php">
			<label>Pseudo : </label>
			<input type="text" name="pseudo" value="<?= $user["login"] ?>">
			<br>
			<label>Mot de passe : </label>
			<input type="password" name="password">
			<br>
			<label>Confirmation mot de passe : </label>
			<input type="password" name="confirm_password">
			<br>
			<label>E-mail : </label>
			<input type="email" name="email" value="<?= $user["email"] ?>">
			<br>
			<label>Admin : </label>
			Oui <input type="radio" name="user_groupe" value="1">
			Non <input type="radio" name="user_groupe" value="0">
			<br>
			<input type="hidden" name="id" value="<?php if (isset($_GET["id"])) echo $_GET["id"]; ?>">
			<input type="submit" name="submit" value="Valider">
		</form>
		<?php
	}
	else if ($_GET["type"] == "products")
	{
		$product = get_product_by_id($connect, $_GET["id"])->fetch_assoc();
		?>
		<form class="form" method="post" action="new_product.php">
			<label>Nom : </label>
			<input type="text" name="name" value="<?= $product["name"] ?>">
			<br>
			<label>Prix : </label>
			<input type="text" name="price" value="<?= $product["price"] ?>">
			<br>
			<label>Quantité : </label>
			<input type="text" name="quantity" value="<?= $product["quantity"] ?>">
			<br>
			<label>Image : </label>
			<input type="text" name="image" value="<?= $product["image"] ?>">
			<br>
			<?php

			$categories = get_categories($connect);
			echo "<select name='category[]' multiple>";
			foreach ($categories as $category)
				echo "<option value='".$category["name"]."'>".$category["name"]."<br>";
			echo "</select>";
			?>
			<br>
			<input type="hidden" name="id" value="<?php if (isset($_GET["id"])) echo $_GET["id"]; ?>">
			<input type="submit" name="submit" value="Valider">

		</form>
		<?php
	}
	else
		echo "ERROR\n";
	include_once("footer.php");

}

?>