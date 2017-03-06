<?php
	session_start();

	$product = unserialize($_POST[product]);

	$data = $_SESSION['cart'];
	$cart = unserialize($data);

	if ($cart)
		array_push($cart, $product);
	else
		$cart = array($product);

	$data = serialize($cart);
	$_SESSION['cart'] = $data;

	echo '<script>window.location.href = "../index.php" ;</script>';
?>
