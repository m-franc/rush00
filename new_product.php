<?php

function 	new_product($name, $price, $quantity, $image)
{
	if (!($query = mysqli_query($connect, "INSERT INTO products (name,
																price, 
																quantity, 
																image) VALUES('".$name."',
																				'".$price."',
																				'".$quantity."',
																				'".$image."')")))
	{
		echo "fail";
		echo "ERROR\n";
	}
}

?>