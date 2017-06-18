<?php

include_once("categories.php");

if ($_GET["type"] == NULL)
	echo "ERROR\n";
else
{
	include_once("header.php");
	if ($_GET["type"] == "categories")
	{
		?>
		<form class="form" method="post" action="new_category.php">
			<label>Nom de la catégorie : </label>
			<input type="text" name="name_categorie">
			<br>
			<input type="hidden" name="id" value="<?php if (isset($_GET["id"])) echo $_GET["id"]; ?>">
			<input type="submit" name="submit" value="valider">
		</form>
		<?php	
	}
	else if ($_GET["type"] == "users")
	{
		?>
		<form class="form" method="post" action="new_user.php">
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
			<input type="hidden" name="id" value="<?php if (isset($_GET["id"])) echo $_GET["id"]; ?>">
			<input type="submit" name="submit" value="Valider">
		</form>
		<?php

	}
	else if ($_GET["type"] == "products")
	{
		?>
		<form class="form" method="post" action="new_product.php">
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