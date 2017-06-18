<?php

include_once("header.php");

?>

<form class="form" action="signup_process.php" method="POST">
	<label>Pseudo : </label>
	<input type="text" name="pseudo" pattern=".{4,}" required title="4 characteres minimum">
	<br>
	<label>Mot de passe : </label>
	<input type="password" name="passwd" pattern=".{6,}" required title="6 characteres minimum">
	<br>
	<label>Confirmation mot de passe : </label>
	<input type="password" name="confirm_passwd">
	<br>
	<label>E-mail : </label>
	<input type="email" name="email">
	<br>
	<input type="submit" name="submit" value="Valider">
</form>


<?php

include_once("footer.php");

?>