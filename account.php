<?php

	include_once("header.php");
	include_once("navbar.php");
		$req = 'SELECT * FROM users WHERE id = '. $_SESSION["id_user"];
		$user = $connect->query($req);
		$user = $user->fetch_assoc();
		$req = $connect->prepare('SELECT * FROM purchase WHERE id_user = ?');
		$req->bind_param('s', $user["id"]);
		$req->execute();
		$purchase = $req->get_result()->fetch_all(MYSQLI_ASSOC);


?>

<div id="compte">
	<h3>Mon compte</h3>
	Nom : <?= $user["login"] ?><br>
	Email : <?= $user["email"] ?><br><br><br>
	<div id="purchase">
	<h4>Commandes passees :</h4>
	<?php
		if ($purchase) {
		foreach ($purchase as $p) {
		echo ('<div>' .$p["products"]. ' pour un total de '.$p["price"].'EUR</div>');
	}} else
		echo ('<div>Vous n\'avez pas encore passe de commamde.</div>');?>
	</div>
	<br>
	<a id="delete" class="button" href="#" onclick="myFunction()">Supprimer le compte</a>
	<a id="modif" class="button" href="modif.php">Modifier le compte</a>
</div>

<?php
	include_once("footer.php");
?>

<script>
function myFunction() {
    if (confirm("Voulez vous vraiment suprimer votre compte ?"))
    	window.location.href = 'delete_process.php';
}
</script>