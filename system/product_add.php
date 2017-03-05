<?php
	$category = $_GET['category'] ? $_GET['category'] : "";
	$p_name = $_GET['name'] ? $_GET['name'] : "";
	$p_img = $_GET['image'] ? $_GET['image'] : "../img/no-img.jpg";
	$p_price = $_GET['price'] ? $_GET['price'] : "-1";
	$p_description = $_GET['desc'] ? $_GET['desc'] : "";
	$_count = $_GET['count'] ? $_GET['count'] : "-1";

	if ($category != "" && $p_name != "") {

		$products = array();

		// Get all products
		$data = file_get_contents('private/products');
		if ($data)
			$products = unserialize($data);

		// Build new product
		$new = array("ID" => rand(424242, 42424242424242), "category" => $category, "name" => $p_name, "image" => $p_img, "price" => $p_price, "desc" => $p_description, "count" => $_count);

		// Add product
		if ($products)
			array_push($products, $new);
		else
			$products = array($new);

		// Save to file
		$data = serialize($products);
		file_put_contents('private/products', $data);

		$msg = "New product: $p_name added!";
		echo '<script>window.location.href = "../admin/index.php?msg='.$msg.'";</script>';

	} else {
		$msg = "ERROR: Empty fields";
		echo '<script>window.location.href = "../admin/index.php?msg='.$msg.'";</script>';
	}
?>
