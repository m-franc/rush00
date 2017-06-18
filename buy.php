<?php
	session_start();

	$connect = mysqli_connect("localhost", "admin", "admin", "rush00") or die ("Error " . mysqli_error($connect));
	$total = 0;
	$text = "";
	foreach ($_COOKIE as $id => $q) {
		if (strlen($id) < 4 && strlen($q) < 4)
		{
			$req = $connect->prepare('SELECT * FROM products WHERE id = ?');
			$req->bind_param('s', $id);
			$req->execute();
			$pr = $req->get_result()->fetch_assoc();
			$prname = $pr['name'];
			$prprice = $pr['price'] * $q;
			$total += $prprice;
			$text .= "$q * $prname pour $prprice EUR, ";
			setcookie($id, "", time());
		}
	}

	$add_buy = $connect->prepare("INSERT INTO purchase (id_user, login, price, products) VALUES (?, ?, ?, ?)");
	// var_dump($add_buy);
	// die();
	$add_buy->bind_param('ssis', $_SESSION['id_user'], $_SESSION['login'], $total, $text);
	$add_buy->execute();

	header("Location: index.php");

?>