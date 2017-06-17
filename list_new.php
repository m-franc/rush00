<?php


if ($_GET["type"] == NULL)
	echo "ERROR\n";
else
{
	include_once("header.php");
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
		$name_categorie = $_POST["name_categorie"];
		echo "La nouvelle categories : ".$name_categorie."\n";
		if (!($query = mysqli_query($connect, "INSERT INTO categories (name) VALUES('".$name_categorie."')")))
			echo "ERROR\n";
	}
	else if ($_GET["type"] == "users")
	{
		?>
		<form class="form" method="post" cible="list_new.php">
			<label>Pseudo : </label>
			<input type="text" name="pseudo">
			<br>
			<label>Prénom : </label>
			<input type="text" name="fname">
			<br>
			<label>Nom : </label>
			<input type="text" name="lname">
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
		$login = $_POST["pseudo"];
		$fname = $_POST["fname"];
		$lname = $_POST["lname"];	
		if ($_POST["password"] != $_POST["confirm_password"])
		{
			echo "Le champs mot de passe et confirmation de mot de passe ne sont pas identique\n";
			die();
		}
		$password = hash("sha512", $_POST["password"]);
		$email = $_POST["email"];
		$user_groupe = intval($_POST["user_groupe"]);
		if (!($query = mysqli_query($connect, "INSERT INTO users (login,
																fname, 
																lname, 
																password, 
																email, 
																user_groupe) VALUES('".$login."',
																				'".$fname."',
																				'".$lname."',
																				'".$password."',
																				'".$email."',
																				'".$user_groupe."')")))
		{
			echo "fail";
			echo "ERROR\n";
		}
	}
	else if ($_GET["type"] == "products")
	{
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
		$name = $_POST["name"];
		$price = intval($_POST["price"]);
		$quantity = intval($_POST["quantity"]);
		$image = $_POST["image"];
		if (!($query = mysqli_query($connect, "INSERT INTO products (name,
																price, 
																quantity, 
																image) VALUES('".$name."',
																				'".$price."',
																				'".$quantity."',
																				'".$image."')")))
		{
			echo "fail";
			echo "ERROR\n";
		}
	}
	else
		echo "ERROR\n";
	include_once("footer.php");

}

?>