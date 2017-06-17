<?php

$connect = mysqli_connect("localhost", "admin", "admin", "rush00") or die ("Error " . mysqli_error($connect));

$type_list = $_POST["admin_list"];

if (!($list = mysqli_query($connect, "SELECT * FROM ".$type_list."")))
	echo "ERROR\n";
else
{
	if ($type_list == "users")
	{
		echo "<ul>";
		echo "<li><a href='list_new.php?type=".$type_list."'>Ajouter</a></li>";
		foreach($list as $user)
			echo "<li>".$user["id"]." - ".$user["login"]." - ".$user["email"]."</li>";
		echo "</ul>";
	}
	else if ($type_list == "products")
	{
		echo "<ul>";
		echo "<li><a href='list_new.php?type=".$type_list."'>Ajouter</a></li>";
		foreach($list as $user)
			echo "<li>".$user["id"]." - ".$user["name"]." - ".$user["price"]." - ".$user["quantity"]."</li>";
		echo "</ul>";
	}
	else if ($type_list == "categories")
	{
		echo "<ul>";
		echo "<li><a href='list_new.php?type=".$type_list."'>Ajouter</a></li>";
		foreach($list as $user)
			echo "<li>".$user["id"]." - ".$user["name"]."</li>";
		echo "</ul>";
	}
	$list = mysqli_fetch_array($list);
}

?>