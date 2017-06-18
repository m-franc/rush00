#!/usr/bin/php
<?php



	$connect = mysqli_connect("localhost", "admin", "admin") or die ("Error " . mysqli_error($connect));

	$sql = "CREATE DATABASE IF NOT EXISTS `rush00`";


	if (mysqli_query($connect, $sql))
		echo "DB CREATED\n";
	else
	{
		echo "DB NOT CREATED\n";
		die();
	}


	$sql = "CREATE TABLE `rush00`.`users` (
		`id` INT NOT NULL AUTO_INCREMENT ,
		`login` VARCHAR(32) NOT NULL ,
		`password` TEXT NOT NULL ,
		`email` VARCHAR(100) NOT NULL ,
		`user_groupe` INT NOT NULL,
		PRIMARY KEY (`id`)
		) ENGINE = InnoDB;";

	if (mysqli_query($connect, $sql))
		echo "TABLE CREATED WITH SUCCESS\n";
	else
	{
		echo "ERROR\n";
		die();
	}

	$pass = hash("sha512", "batman");

	$sql = "INSERT INTO `rush00`.`users` (
	`id`,
	`login`,
	`password`,
	`email`,
	`user_groupe`)
	VALUES (
	NULL, 
	'batman',
	'$pass',
	'batman@yopmail.com',
	'1');";

	if (mysqli_query($connect, $sql))
		echo "USER INSERTED\n";
	else
	{
		echo "USER NOT INSERTED\n";
		die();
	}

	$sql = "CREATE TABLE `rush00`.`categories` (
		`id` INT NOT NULL AUTO_INCREMENT ,
		`name` VARCHAR(25) NOT NULL ,
		PRIMARY KEY (`id`)
		) ENGINE = InnoDB;";

	if (mysqli_query($connect, $sql))
			echo "CATEGORIES TABLE CREATED\n";
	else
	{
		echo "CATEGORIES TABLE NOT CREATED\n";
		die();
	}

	$sql = "INSERT INTO `rush00`.`categories` (
	`id`,
	`name`)
	VALUES (
	NULL,  
	'PC');";

	if (mysqli_query($connect, $sql))
		echo "CATEGORY CREATED\n";
	else
	{
		echo "CATEGORY NOT CREATED\n";
		die();
	}

	$sql = "INSERT INTO `rush00`.`categories` (
	`id`,
	`name`)
	VALUES (
	NULL,  
	'PS4');";

	if (mysqli_query($connect, $sql))
		echo "CATEGORY CREATED\n";
	else
	{
		echo "CATEGORY NOT CREATED\n";
		die();
	}

	$sql = "INSERT INTO `rush00`.`categories` (
	`id`,
	`name`)
	VALUES (
	NULL,  
	'XBOX ONE');";

	if (mysqli_query($connect, $sql))
		echo "CATEGORY CREATED\n";
	else
	{
		echo "CATEGORY NOT CREATED\n";
		die();
	}

	$sql = "INSERT INTO `rush00`.`categories` (
	`id`,
	`name`)
	VALUES (
	NULL,  
	'SWITCH');";

	if (mysqli_query($connect, $sql))
		echo "CATEGORY CREATED\n";
	else
	{
		echo "CATEGORY NOT CREATED\n";
		die();
	}

	$sql = "CREATE TABLE `rush00`.`products` (
		`id` INT NOT NULL AUTO_INCREMENT ,
		`date` TIMESTAMP NOT NULL ,
		`name` VARCHAR(255) NOT NULL ,
		`price` INT NOT NULL ,
		`quantity` INT NOT NULL ,
		`image` TEXT NOT NULL ,
		PRIMARY KEY (`id`)
		) ENGINE = InnoDB;";

	if (mysqli_query($connect, $sql))
			echo "PRODUCT TABLE CREATED\n";
	else
	{
		echo "PRODUCT TABLE NOT CREATED\n";	
		die();
	}

	$sql = "INSERT INTO `rush00`.`products` (
	`id` ,
	`name` ,
	`price` ,
	`quantity` ,
	`image`)
	VALUES
	(
	NULL ,
	'Isaac' ,
	'20' ,
	'50' ,
	'https://images-eds-ssl.xboxlive.com/image?url=8Oaj9Ryq1G1_p3lLnXlsaZgGzAie6Mnu24_PawYuDYIoH77pJ.X5Z.MqQPibUVTcS1g7UHgtZ0NWD9ve93BSxt2j5Jy0yRoDVxSIvxTJNTUn0LjnG65kWh3iwPpYAZc2FsGhwpvLDQNsJx7Joe0.78LPJ394P5fzSOmi.hxtzj_yXsnzGCh7HxOPIvm9kxwzuYQ7hrpnv0EJi8uxjwnog0xpSkfhi6TME04RastfINQ-&w=200&h=300&format=jpg'
	);";

	if (mysqli_query($connect, $sql))
			echo "PRODUCT CREATED\n";
	else
	{
		echo "PRODUCT NOT CREATED\n";	
		die();
	}
	
	$sql = "INSERT INTO `rush00`.`products` (
	`id` ,
	`name` ,
	`price` ,
	`quantity` ,
	`image`)
	VALUES
	(
	NULL ,
	'Portal 2' ,
	'40' ,
	'12' ,
	'http://i15.kanobu.ru/c/d4d299055148b240caa25eecf443e360/225x320/u.kanobu.ru/games/42/cc5be322cc0e4634811f0d9f42b370a8'
	);";

	if (mysqli_query($connect, $sql))
			echo "PRODUCT CREATED\n";
	else
	{
		echo "PRODUCT NOT CREATED\n";	
		die();
	}
	
	$sql = "CREATE TABLE `rush00`.`categories_products` (
		`category_id` INT NOT NULL ,
		`product_id` INT NOT NULL
		) ENGINE = InnoDB;";

	if (mysqli_query($connect, $sql))
			echo "LINK TABLE CREATED\n";
	else
	{
		echo "LINK TABLE NOT CREATED\n";	
		die();
	}

	$sql = "INSERT INTO `rush00`.`categories_products` (
	`category_id`,
	`product_id`)
	VALUES (
	1,  
	1);";

	if (mysqli_query($connect, $sql))
			echo "CATEGORIES TABLE CREATED\n";
	else
	{
		echo "CATEGORIES TABLE NOT CREATED\n";
		die();
	}
	$sql = "INSERT INTO `rush00`.`categories_products` (
	`category_id`,
	`product_id`)
	VALUES (
	2,  
	1);";

	if (mysqli_query($connect, $sql))
			echo "CATEGORIES TABLE CREATED\n";
	else
	{
		echo "CATEGORIES TABLE NOT CREATED\n";
		die();
	}
	$sql = "INSERT INTO `rush00`.`categories_products` (
	`category_id`,
	`product_id`)
	VALUES (
	3,  
	1);";
	
	if (mysqli_query($connect, $sql))
			echo "CATEGORIES TABLE CREATED\n";
	else
	{
		echo "CATEGORIES TABLE NOT CREATED\n";
		die();
	}
	$sql = "INSERT INTO `rush00`.`categories_products` (
	`category_id`,
	`product_id`)
	VALUES (
	4,  
	1);";
	
	if (mysqli_query($connect, $sql))
			echo "CATEGORIES TABLE CREATED\n";
	else
	{
		echo "CATEGORIES TABLE NOT CREATED\n";
		die();
	}
	$sql = "INSERT INTO `rush00`.`categories_products` (
	`category_id`,
	`product_id`)
	VALUES (
	1,  
	2);";
	
	if (mysqli_query($connect, $sql))
			echo "CATEGORIES TABLE CREATED\n";
	else
	{
		echo "CATEGORIES TABLE NOT CREATED\n";
		die();
	}



	$sql = "CREATE TABLE `rush00`.`purchase` (
		`id` INT NOT NULL AUTO_INCREMENT ,
		`id_user` INT NOT NULL,
		`login` VARCHAR(32) NOT NULL ,
		`products` TEXT NOT NULL ,
		`price` INT NOT NULL,
		PRIMARY KEY (`id`)
		) ENGINE = InnoDB;";

	if (mysqli_query($connect, $sql))
			echo "CATEGORIES TABLE CREATED\n";
	else
	{
		echo "CATEGORIES TABLE NOT CREATED\n";
		die();
	}

	include_once("user.php");
	include_once("product.php");
	include_once("categories.php");

	$connect = mysqli_connect("localhost", "admin", "admin", "rush00") or die ("Error " . mysqli_error($connect));

	new_category($connect, "DS");
	new_product($connect, "Battlefield 1", 60, 40, "https://d3isma7snj3lcx.cloudfront.net/optim/images/gallery/10/105345/battlefield-1-pc-521f5b10.jpg", array("XBOX ONE", "PS4", "PC"));
	new_product($connect, "Mario Kart", 50, 20, "http://www.mundodescargas.com/videojuegos/2k14/06/mario_kart_8/imagenes/portada_mario_kart_8.jpg", array("SWITCH", "DS"));
	new_product($connect, "Half-Life 2", 200, 2, "http://static.fnac-static.com/multimedia/images_produits/ZoomPE/2/5/3/3348542180352/tsp20130828194456/Half-Life-2.jpg", array("PC"));
	new_product($connect, "Star Craft 2", 40, 7, "http://media.ldlc.com/ld3/zoom/2010/LD0000777610.jpg", array("PC"));
	new_product($connect, "Halo 5", 60, 100, "https://www.halo.fr/wp-content/uploads/2014/06/1_1_4_halo-guardians-jaquette.jpg", array("XBOX ONE"));
	new_product($connect, "Fire Emblem", 40, 40, "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_R6NJHAY7rqnfs8LWiaoSz1_lZV0rl5a-vd5g4DM9reYSHMs3", array("DS"));
	new_product($connect, "GTAV", 60, 100, "https://img.generation-nt.com/gta-5-pochette_090224000001382682.jpg", array("PS4", "XBOX ONE", "PC"));
	mysqli_close($connect);

?>