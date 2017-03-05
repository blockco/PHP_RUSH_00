<?php
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
<style>

body {
	background-image: url("./img/paper.jpg");
	background-color: #EFEFEF;
}
/*
	product-
		name
		cat
		img
		price
		desc
		count
*/
.but{
	margin-left: 1vw;
	height: 1vw;
	width: 1vw;
}
.p_name{
	padding-top: .5vw;
	font-weight: bold;
	text-align: center;
	font-size: 2vw;
}

.p_cat{
	padding-top: .5vw;
	text-align: center;
	font-size: 1.5vw;
}
.p_price{
	padding-top: .5vw;
	padding-right: .5vw;
	text-align: bottom;
	text-align: right;
	font-size: 2vw;
}

.p_desc{
	padding-top: .5vw;
	text-align: center;
	font-size: 1vw;
}

.sidebar{
	margin-top: 2vw;
	border-radius: 25px;
	padding-top: 2vw;
	padding-left: .5vw;
	background-color: #06ABE2;
	margin-left: 10vw;
	opacity: 0.7;
	width: 15vw;
	height: 50vw;
	float: left;
	padding-bottom: 10vw;
	border-style: solid;
}

.header{
	opacity: 0.7;
	border-radius: 25px;
	border-style: solid;
	background-color: #394156;
	text-align: center;
	font-size: 200%;
	width: 95vw;
	height: 5vw;
}
.flex-container {
	margin: 0 auto;
	align-items: center;
	display: -webkit-flex;
	display: flex;
	width: 55vw;
	height: 15vw;
}

.flex-item {
	border-radius: 25px;
	background-color: #06ABE2;
	opacity: 0.7;
	margin: 5px auto;
	width: 25vw;
	height: 13vw;
	margin: 1vw;
}
</style>
</head>
<body>

<div class="header">
	this is the header
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
while ($i < $i + 3 && $i < count($temp)){
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
while ($i < $i + 3 && $i < count($temp)){
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
