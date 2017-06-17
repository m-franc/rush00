<?php

include_once("header.php");

//if (!($verif_user = mysqli_query($connect, "SELECT id, login FROM users WHERE id = ".$_SESSION["id_user"]." AND users.admin = 1")))
//	echo "ERROR\n";
//else
//{
//	$user = mysqli_fetch_array($verif_user);
	?>
	<h2 class="titre">Administrateur : <?php echo $user["login"]; ?></h2>
	<form method="post" cible="admin_list.php" class="form">
		<select name="admin_list">
			<option value="users">Utilisateurs</option>
			<option value="products">Produits</option>
			<option value="categories">Catégories</option>
		</select>
		<input type="submit" name="submit" value="valider">
	</form>

	<?php

//}
include_once("admin_list.php");
include_once("footer.php");

?>
