<?php

	include 'extra_functions.php';

	$category_name = $_GET["name"];

	// Protact
	if (!$category_name || $category_name == "") {
		$msg = "ERROR: Empty field";
		echo '<script>window.location.href = "../admin/index.php?msg='.$msg.'";</script>';
		return ;
	}

	// Get the all categories:
	$data = file_get_contents('private/categories');
	$cats = unserialize($data);

	// Remove category if exists
	$i = 0;
	foreach ($cats as $cat) {
		if ($cat["name"] == $category_name) {
			array_splice($cats, $i, 1);
			$i = -1;
			break ;
		}
		++$i;
	}

	// Save to file
	$data = serialize($cats);
	file_put_contents('private/categories', $data);

	// Remove all products of this category
	remove_products_of($category_name);

	if ($i == -1)
		$msg = "Category: '$category_name' removed!";
	else
		$msg = "Category: '$category_name' not exists!";
	echo '<script>window.location.href = "../admin/index.php?msg='.$msg.'";</script>';

?>
