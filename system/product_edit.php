<?php
	$id = $_GET['id'] ? $_GET['id'] : "";
	$category = $_GET['category'] ? $_GET['category'] : "";
	$p_name = $_GET['name'] ? $_GET['name'] : "";
	$p_img = $_GET['image'] ? $_GET['image'] : "../img/no-img.jpg";
	$p_price = $_GET['price'] ? $_GET['price'] : "-1";
	$p_description = $_GET['desc'] ? $_GET['desc'] : "";
	$_count = $_GET['count'] ? $_GET['count'] : "-1";

	if ($category != "" && $p_name != "" && $id != "") {

		// Get all products
		$data = file_get_contents('private/products');
		$products = unserialize($data);

		// Find and edit product
		foreach ($products as &$product) {
			if ($product["ID"] == $id) {
				$product = array("ID" => $id, "category" => $category, "name" => $p_name, "image" => $p_img, "price" => $p_price, "desc" => $p_description, "count" => $_count);
				break ;
			}
		}

		// Save to file
		$data = serialize($products);
		file_put_contents('private/products', $data);

		$msg = "Product: $p_name update!";
		echo '<script>window.location.href = "../admin/index.php?msg='.$msg.'";</script>';

	} else {
		$msg = "ERROR: Empty fields";
		echo '<script>window.location.href = "../admin/index.php?msg='.$msg.'";</script>';
	}
?>
