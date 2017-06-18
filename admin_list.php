<?php

include_once("user.php");
session_start();

$connect = mysqli_connect("localhost", "admin", "admin", "rush00") or die ("Error " . mysqli_error($connect));
$verif_user = get_user_by_id($connect, $_SESSION["id_user"]);
$user = $verif_user->fetch_assoc();
if ($user["user_groupe"] == 0)
{
	header("Location: index.php");
	die();
}

include_once("admin.php");

if ($_GET["submit"] == "valider")
{
	$type_list = $_GET["admin_list"];
	if (!($list = mysqli_query($connect, "SELECT * FROM ".$type_list."")))
		echo "ERROR\n";
	else
	{
		echo "<div id='content_admin'>";
		if ($type_list == "users")
		{
			echo "<h3>Utilisateurs : </h3>\n";
			echo "<a class='button' href='list_new.php?type=".$type_list."'>Ajouter</a>";
			echo "<table class='list_admin'>";
			foreach($list as $user)
				echo "<tr><td>".$user["id"]."</td><td>".$user["login"]."</td><td>".$user["email"]."</td><td><a class='button' href='list_new.php?type=".$type_list."&id=".$user["id"]."'>Modifier</a></td><td><a class='button' href='delete_elem.php?type=".$type_list."&id=".$user["id"]."'>Supprimer</a></td></tr></li>";
			echo "</table>";
		}
		else if ($type_list == "products")
		{
			echo "<h3>Produits : </h3>\n";
			echo "<a class='button' href='list_new.php?type=".$type_list."'>Ajouter</a>";
			echo "<table class='list_admin'>";
			foreach($list as $user)
				echo "<tr><td>".$user["id"]."</td><td>".$user["name"]."</td><td><img id='img_product'src='".$user["image"]."'></td><td>Prix : ".$user["price"]."</td><td>Quantité : ".$user["quantity"]."</td><td><a class='button' href='list_new.php?type=".$type_list."&id=".$user["id"]."'>Modifier</a></td><td><a class='button' href='delete_elem.php?type=".$type_list."&id=".$user["id"]."'>Supprimer</a></td></tr>";
			echo "</table>";
		}
		else if ($type_list == "categories")
		{
			echo "<h3>Catégories : </h3>\n";
			echo "<a class='button' href='list_new.php?type=".$type_list."'>Ajouter</a>";
			echo "<table class='list_admin'>";
			foreach($list as $user)
				echo "<tr><td>".$user["id"]."</td><td>".$user["name"]."</td><td><a class='button' href='list_new.php?type=".$type_list."&id=".$user["id"]."'>Modifier</a></td><td><a class='button' href='delete_elem.php?type=".$type_list."&id=".$user["id"]."'>Supprimer</a></td></tr>";
			echo "</table>";
		}
		else if ($type_list == "purchase")
		{
			echo "<h3>Commandes : </h3>\n";
			echo "<table class='list_admin'>";
			foreach($list as $purchase)
				echo "<tr><td>".$purchase["id"]."</td><td>".$purchase["login"]."</td><td>".$purchase["products"]."</td><td>".$purchase["price"]."</td><td><a class='button' href='delete_elem.php?type=".$type_list."&id=".$purchase["id"]."'>Supprimer</a></td></tr>";
			echo "</table>";
		}
		echo "</div>";
		//$list = mysqli_fetch_array($list);
	}
}
include_once("footer.php");
?>