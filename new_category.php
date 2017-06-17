<?php
function 	new_category($category)
{
	if (!($query = mysqli_query($connect, "INSERT INTO categories (name) VALUES('".$category."')")))
		echo "ERROR\n";
}

?>