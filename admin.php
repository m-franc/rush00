<?php

session_start();

include_once("user.php");

$connect = mysqli_connect("localhost", "admin", "admin", "rush00") or die ("Error " . mysqli_error($connect));
$verif_user = get_user_by_id($connect, $_SESSION["id_user"]);
$user = $verif_user->fetch_assoc();
if ($user["user_groupe"] == 0)
{
	header("Location: index.php");
	die();
}

include_once("header.php");

?>
	<h2 class="titre">Administrateur : <?php echo $user["login"]; ?></h2>
	<form method="get" action="admin_list.php" class="form">
		<select name="admin_list">
			<option value="users">Utilisateurs</option>
			<option value="products">Produits</option>
			<option value="categories">Catégories</option>
			<option value="purchase">Commandes</option>
		</select>
		<input type="submit" name="submit" value="valider">
	</form>
