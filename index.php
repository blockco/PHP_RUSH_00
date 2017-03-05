<html>
<head>
<style>

body {
	background-image: url("file:///nfs/2016/r/rpassafa/phprush00/img/paper.jpg");
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
	background-color: green;
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
	background-color: green;
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
	background-color: green;
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
</div>
<div class='flex-container'>
<?php
if (file_exists("./system/private/products"))
{
	$temp = unserialize(file_get_contents("./system/private/products"));
	// print_r($temp);
}
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
		<?php echo $temp[$i][price]; ?>
	</div>
	</div>
	<?php $i++; }?>
</div>

<!-- ANOTHER -->

<div class='flex-container'>
<?php
if (file_exists("./system/private/products"))
{
	$temp = unserialize(file_get_contents("./system/private/products"));
	// print_r($temp);
}
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
		<?php echo $temp[$i][price]; ?>
	</div>
	</div>
	<?php $i++; }?>
</div>
</body>
</html>
