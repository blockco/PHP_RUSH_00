<?php

	function remove_products_of($category_name) {

		// Get the all products:
		$data = file_get_contents('private/products');
		$products = unserialize($data);

		// Remove products of category
		$i = 0;
		$tmp = $products;
		foreach ($products as $product) {
			if ($product["category"] == $category_name) {
				array_splice($tmp, $i, 1);
				$i--;
			}
			++$i;
		}

		// Save to file
		$data = serialize($tmp);
		file_put_contents('private/products', $data);
		
	}

?>
