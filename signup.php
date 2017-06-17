<?php

include_once("header.php");

?>

<form class="form" action="signup_process.php" method="POST">
	<label>Pseudo : </label>
	<input type="text" name="pseudo">
	<br>
	<label>Mot de passe : </label>
	<input type="text" name="passwd">
	<br>
	<label>Confirmation mot de passe : </label>
	<input type="text" name="confirm_passwd">
	<br>
	<label>E-mail : </label>
	<input type="email" name="email">
	<br>
	<label>Téléphone</label>
	<input type="text" name="tel">
	<br>
	<input type="submit" name="submit" value="Valider">
</form>


<?php

include_once("footer.php");

?>