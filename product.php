<?php
$product = unserialize($_POST[product]);
?>

<!DOCTYPE html>
<html>
<style>
body {
	background-image: url("./img/paper.jpg");
	background-color: #EFEFEF;
}
.productimg{
	margin: auto;
	height: 25vw;
	width: 50vw;
	margin-bottom: 5vw;
	border-style: dashed;
}

.descbox{
	border-radius: 25px;
	margin: auto;
	background-color: #06ABE2;
	opacity: 0.7;
	height: 25vw;
	width: 50vw;
	border-style: solid;
}

.p_name{
	padding-top: .5vw;
	font-weight: bold;
	text-align: center;
	font-size: 4vw;
}

.p_desc{
	padding-top: .5vw;
	text-align: center;
	font-size: 2.5vw;
}

.p_quat{
	padding-top: .5vw;
	text-align: center;
	font-size: 2vw;
}

.p_price{
	padding-top: .5vw;
	text-align: bottom;
	text-align: right;
	font-size: 2vw;
}
</style>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<div class="productimg">
			<img class="productimg" src='<?php echo $product[image] ?>' alt="">
		</div>
		<div class="descbox">
			<div class="p_name">
				<?php echo $product[name]; ?>
			</div>
			<div class="p_desc">
				<?php echo $product[desc]; ?>
			</div>
			<div class="p_quat">
				# Availible <?php echo $product[count]; ?>
			</div>
			<div class="p_price">
				$<?php echo $product[price]; ?>
			</div>
		</div>

	</body>
</html>
