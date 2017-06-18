<?php

include_once("header.php");
include_once("navbar.php");

?>

<div id="home">Bienvenue sur Site E-commerce

Vous pouvez acceder a votre panier <a href="mycart.php">ici</a>.
<br>

<?php if ($_SESSION["login"]): ?>
	Vous pouvez aussi voir les informations de votre compte <a href="account.php">ici</a>.

<?php else: ?>
	Vous pouvez aussi <a href="signin.php">vous connecter</a> ou <a href="signup.php">vous inscrire</a>.

<?php endif; ?>
</div>
<?php

include_once("footer.php");

?>