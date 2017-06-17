<?php
	$req = 'SELECT * FROM categories';
	$category = mysqli_query($connect, $req);
	$category = $category->fetch_all(MYSQLI_ASSOC);
?>

<div id="navbar">
<?php foreach ($category as $cat) { ?>
	<div class="tab">
		<a href="category.php?id=<?= $cat["id"]?>">
			<div>
				<?= $cat["name"]?>
			</div>
		</a>
	</div>
<?php } ?>
</div>