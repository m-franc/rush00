<?php

include_once("header.php");

?>

<form class="form" action="login_process.php" method="POST">
	<label>Pseudo : </label>
	<input type="text" name="pseudo">
	<br>
	<label>Mot de passe : </label>
	<input type="password" name="passwd">
	<br>
	<input type="submit" name="submit" value="Valider">
</form>


<?php

include_once("footer.php");

?>