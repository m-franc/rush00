<?php

	include_once("header.php");
	include_once("navbar.php");
		$req = 'SELECT * FROM users WHERE id = '. $_SESSION["id_user"];
		$user = $connect->query($req);
		$user = $user->fetch_assoc();
		$req = $connect->prepare('SELECT * FROM purchase WHERE login = ?');
		$req->bind_param('s', $user["login"]);
		$req->execute();
		$purchase = $req->get_result()->fetch_all(MYSQLI_ASSOC);


?>

<div id="compte">
<form class="form" action="modif_process.php" method="POST">
	<label>Pseudo : </label>
	<input type="text" name="pseudo" pattern=".{4,}" required title="4 characteres minimum" value="<?=$user["login"]?>">
	<br>
	<label>E-mail : </label>
	<input type="email" name="email" value="<?=$user["email"]?>">
	<br>
	<label>Mot de passe : </label>
	<input type="password" name="passwd" pattern=".{6,}" required title="6 characteres minimum">
	<br>
	<label>Confirmation mot de passe : </label>
	<input type="password" name="confirm_passwd">
	<br>
	<input type="submit" name="submit" value="Valider">
</form>
</div>




<?php
	include_once("footer.php");
?>