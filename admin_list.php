<?php

$connect = mysqli_connect("localhost", "admin", "admin", "rush00") or die ("Error " . mysqli_error($connect));

if ($_POST["submit"] == "valider")
{
	$type_list = $_POST["admin_list"];

	if (!($list = mysqli_query($connect, "SELECT * FROM ".$type_list."")))
		echo "ERROR\n";
	else
	{
		if ($type_list == "users")
		{
			echo "<h3>Utilisateurs : </h3>\n";
			echo "<ul>";
			echo "<li><a href='list_new.php?type=".$type_list."'>Ajouter</a></li>";
			foreach($list as $user)
				echo "<li>".$user["id"]." - ".$user["login"]." - ".$user["email"]." - <a href='list_new.php?type=".$type_list."&id=".$user["id"]."'>Modifier</a> - <a href='delete_elem.php?type=".$type_list."&id=".$user["id"]."'>Supprimer</a></li>";
			echo "</ul>";
		}
		else if ($type_list == "products")
		{
			echo "<h3>Produits : </h3>\n";
			echo "<ul>";
			echo "<li><a href='list_new.php?type=".$type_list."'>Ajouter</a></li>";
			foreach($list as $user)
				echo "<li>".$user["id"]." - ".$user["name"]." - ".$user["price"]." - ".$user["quantity"]." - <a href='list_new.php?type=".$type_list."&id=".$user["id"]."'>Modifier</a> - <a href='delete_elem.php?type=".$type_list."&id=".$user["id"]."'>Supprimer</a></li>";
			echo "</ul>";
		}
		else if ($type_list == "categories")
		{
			echo "<h3>Catégories : </h3>\n";
			echo "<ul>";
			echo "<li><a href='list_new.php?type=".$type_list."'>Ajouter</a></li>";
			foreach($list as $user)
				echo "<li>".$user["id"]." - ".$user["name"]." - <a href='list_new.php?type=".$type_list."&id=".$user["id"]."'>Modifier</a> - <a href='delete_elem.php?type=".$type_list."&id=".$user["id"]."'>Supprimer</a></li>";
			echo "</ul>";
		}
		$list = mysqli_fetch_array($list);
	}
}

?>