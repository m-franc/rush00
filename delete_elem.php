<?

session_start();

include_once("user.php");
include_once("categories.php");
include_once("product.php");



$connect = mysqli_connect("localhost", "admin", "admin", "rush00") or die ("Error " . mysqli_error($connect));
$verif_user = get_user_by_id($connect, $_SESSION["id_user"]);
$user = $verif_user->fetch_assoc();

if ($user["user_groupe"] == 0)
{
	header("Location: index.php");
	die();
}

function 	del_purchase_by_id($connect, $id)
{
	if (!($query = mysqli_query($connect, "DELETE FROM purchase WHERE id = '".$id."'"))) {
		echo "FAIL DELETE PURCHASE";
		die();
	}
}

if ($_GET["type"] == "users")
	del_user_by_id($connect, $_GET["id"]);
else if ($_GET["type"] == "products")
{
	del_categories_product_by_product_id($connect, $id);
	del_product_by_id($connect, $_GET["id"]);
}
else if ($_GET["type"] == "categories")
{
	del_categeories_product_by_category_id($connect, $id);
	del_category_by_id($connect, $_GET["id"]);
}
else if ($_GET["type"] == "purchase")
	del_purchase_by_id($connect, $_GET["id"]);
header("Location: admin_list.php?admin_list=".$_GET["type"]."&submit=valider");
die();

?>