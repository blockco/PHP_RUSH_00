<?php
session_start();
$temp = [];

if (file_exists("./system/private/products"))
{
	$prods = unserialize(file_get_contents("./system/private/products"));
}

$a = 0;

foreach ($_GET as $key => $value)
{
	foreach ($prods as $key1 => $value)
	{
		$a++;
		if ($value[category] === $key)
		{
			array_push($temp, $value);
		}
	}
}
if ($a == 0)
{
	$temp = unserialize(file_get_contents("./system/private/products"));
}
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<div class="header">
	Online Store!
	<div class="login">
		<div class="p_login">
			<?php if ($_SESSION[loggued_on_user] == "")
			{
				echo "<a href='./system/users/login.php'>login</a>";
			}
			else
			{
				echo "<a href='./system/users/logout.php'>logout</a>";
			}
			echo "
			<a href='./cart/cart.php'>cart</a>";
			?>
		</div>
	</div>
	</div>
</div>


<div class="sidebar">
	<form action="index.php" method="get">
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





<div class='flex-container'>
<?php
$i = 0;
while ($i < 3 && $i < count($temp)){
?>
	<div class="flex-item">
		<div class='p_name'>
			<?php echo $temp[$i][name]; ?>
		</div>

		<div class='p_cat'>
			<?php echo $temp[$i][category]; ?>
		</div>

		<div class='p_desc'>
			<?php echo $temp[$i][desc]; ?>
		</div>

		<div class='p_price'>
			$<?php echo $temp[$i][price]; ?>
		</div>
		<div class='but'>
			<form action="product.php" method="post">
			<button name="product" type="hidden" value='<?php echo serialize($temp[$i]); ?>'>See more</button>
		</div>
	</div>
		<?php $i++; }?>
</div>

<!-- ANOTHER -->

<div class='flex-container'>
<?php
$a = $i + 3;
while ($i < $a && $i < count($temp)){
?>
<div class="flex-item">
	<div class='p_name'>
		<?php echo $temp[$i][name]; ?>
	</div>

	<div class='p_cat'>
		<?php echo $temp[$i][category]; ?>
	</div>

	<div class='p_desc'>
		<?php echo $temp[$i][desc]; ?>
	</div>

	<div class='p_price'>
		$<?php echo $temp[$i][price]; ?>
	</div>
	<div class='but'>
		<form action="product.php" method="post">
		<button name="product" type="hidden" value='<?php echo serialize($temp[$i]); ?>'>See more</button>
	</div>
</div>
	<?php $i++; }?>
</div>

<!-- Another -->
<div class='flex-container'>
<?php
$a = $i + 3;
while ($i < $a && $i < count($temp)){
?>
<div class="flex-item">
	<div class='p_name'>
		<?php echo $temp[$i][name]; ?>
	</div>

	<div class='p_cat'>
		<?php echo $temp[$i][category]; ?>
	</div>

	<div class='p_desc'>
		<?php echo $temp[$i][desc]; ?>
	</div>
</div>
	<?php $i++; }?>
</div>
</body>
</html>
