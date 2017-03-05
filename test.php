<?php
$temp = [];

if (file_exists("./system/private/products"))
{
	$prods = unserialize(file_get_contents("./system/private/products"));
}

foreach ($_GET as $key => $value) {
	foreach ($prods as $key1 => $value) {
		if ($value[category] === $key)
		{
			array_push($temp, $value);
		}
	}
}
?>
<div class="sidebar">
	<form action="test.php" method="get">
	<?php
	if (file_exists("./system/private/products"))
	{
		$cats = unserialize(file_get_contents("./system/private/categories"));
	}
	$i = 0;
	while ($i < count($cats)){
	?>
		<input type="checkbox" name=<?php echo $cats[$i][name]?> value="OK"><?php echo $cats[$i][name]?><br>
		<?php $i++;} ?>
		<input type="submit" value="Submit">
	</form>
</div>
