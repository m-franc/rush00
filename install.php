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
		`fname` VARCHAR(32) NOT NULL ,
		`lname` VARCHAR(32) NOT NULL ,
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
	`fname`,
	`lname`,
	`password`,
	`email`,
	`user_groupe`)
	VALUES (
	NULL, 
	'batman', 
	'Bruce',
	'Wayne',
	'$pass',
	'batman@yopmail.com',
	'0');";

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
	'PLOP');";

	if (mysqli_query($connect, $sql))
		echo "CATEGORY CREATED\n";
	else
	{
		echo "CATEGORY NOT CREATED\n";
		die();
	}

	$sql = "CREATE TABLE `rush00`.`products` (
		`id` INT NOT NULL AUTO_INCREMENT ,
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
	'plop' ,
	'2' ,
	'10' ,
	'http://www.jqueryscript.net/images/Simplest-Responsive-jQuery-Image-Lightbox-Plugin-simple-lightbox.jpg'
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

	mysqli_close($connect);

?>