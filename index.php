<?php

include_once("header.php");
include_once("navbar.php");
include_once("user.php");

//$connect = mysqli_connect("localhost", "admin", "admin", "rush00") or die ("Error " . mysqli_error($connect));
//$verif_user = get_user_by_id($connect, $_SESSION["id_user"]);
//print_r($user = $verif_user->fetch_assoc());

//print $user["user_groupe"];

?>

<div id="home"><h1>Bienvenue sur 42-Games</h2>

Vous pouvez acceder a votre panier <a href="mycart.php">ici</a>.
<br>

<?php if ($_SESSION["login"]): ?>
	Vous pouvez aussi voir les informations de votre compte <a href="account.php">ici</a>.

<?php else: ?>
	Vous pouvez aussi <a href="signin.php">vous connecter</a> ou <a href="signup.php">vous inscrire</a>.

<?php endif; ?>
	<div id="actu">
		<h2>Bientôt sur 42-games...</h3>
		<div id="video">
			<iframe width="560" height="315" src="https://www.youtube.com/embed/5kcdRBHM7kM" frameborder="0" allowfullscreen></iframe>
		</div>
	</div>
</div>

<?php

include_once("footer.php");

?>