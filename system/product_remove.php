<?php
	$id = $_GET['id'] ? $_GET['id'] : "";

	if ($id != "") {

		// Get all products
		$data = file_get_contents('private/products');
		$products = unserialize($data);

		// Find and remove product
		$i = 0;
		foreach ($products as $product) {
			if ($product["ID"] == $id) {
				array_splice($products, $i, 1);
				break ;
			}
			$i++;
		}

		// Save to file
		$data = serialize($products);
		file_put_contents('private/products', $data);

		$msg = "Product number: $id Removed!";
		echo '<script>window.location.href = "../admin/index.php?msg='.$msg.'";</script>';


	} else {
		$msg = "ERROR: Empty fields";
		echo '<script>window.location.href = "../admin/index.php?msg='.$msg.'";</script>';
	}
?>
