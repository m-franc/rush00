<?php

include_once("new_category.php");
include_once("new_user.php");
include_once("new_product.php");

if ($_GET["type"] == NULL)
	echo "ERROR\n";
else
{
	include_once("../header.php");
	if ($_GET["type"] == "categories")
	{
		?>
		<form class="form" method="post" cible="list_new.php">
			<label>Nom de la catégorie : </label>
			<input type="text" name="name_categorie">
			<br>
			<input type="submit" name="submit" value="valider">
		</form>
		<?php
		new_category($_POST["name_categorie"]);
		
	}
	else if ($_GET["type"] == "users")
	{
		?>
		<form class="form" method="post" cible="list_new.php">
			<label>Pseudo : </label>
			<input type="text" name="pseudo">
			<br>
			<label>Mot de passe : </label>
			<input type="password" name="password">
			<br>
			<label>Confirmation mot de passe : </label>
			<input type="password" name="confirm_password">
			<br>
			<label>E-mail : </label>
			<input type="email" name="email">
			<br>
			<label>Admin : </label>
			Oui <input type="radio" name="user_groupe" value="1">
			Non <input type="radio" name="user_groupe" value="0">
			<br>
			<input type="submit" name="submit" value="Valider">
		</form>
		<?php
		new_user($_POST["pseudo"], $_POST["fname"], $_POST["lname"], $_POST["password"], $_POST["confirm_password"], $_POST["email"], intval($_POST["user_groupe"]));
	}
	else if ($_GET["type"] == "products")
	{
		$category = get_category();
		?>
		<form class="form" method="post" cible="list_new.php">
			<label>Nom : </label>
			<input type="text" name="name">
			<br>
			<label>Prix : </label>
			<input type="text" name="price">
			<br>
			<label>Quantité : </label>
			<input type="text" name="quantity">
			<br>
			<label>Image : </label>
			<input type="text" name="image">
			<br>
			<input type="submit" name="submit" value="Valider">
		</form>
		<?php
		new_product($_POST["name"], intval($_POST["price"]), intval($_POST["quantity"]), $_POST["image"]);
	}
	else
		echo "ERROR\n";
	include_once("footer.php");

}

?>