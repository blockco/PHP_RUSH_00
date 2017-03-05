<?php

	$category_name = $_GET["name"];

	// Protact
	if (!$category_name || $category_name == "") {
		$msg = "ERROR: Empty field";
		echo '<script>window.location.href = "../admin/index.php?msg='.$msg.'";</script>';
		return ;
	}

	$cats = array();

	// Get the all categories:
	$data = file_get_contents('private/categories');
	if ($data)
		$cats = unserialize($data);

	// Check if exists
	foreach ($cats as $cat) {
		if ($cat["name"] == $category_name) {
			$msg = "ERROR: Category '$category_name' exists";
			echo '<script>window.location.href = "../admin/index.php?msg='.$msg.'";</script>';
			return ;
		}
	}

	// Add new
	$new = array("name" => $category_name);
	if ($cats)
		array_push($cats, $new);
	else
		$cats = array($new);

	// Save to file
	$data = serialize($cats);
	file_put_contents('private/categories', $data);

	$msg = "New category: '$category_name' added!";
	echo '<script>window.location.href = "../admin/index.php?msg='.$msg.'";</script>';
?>
