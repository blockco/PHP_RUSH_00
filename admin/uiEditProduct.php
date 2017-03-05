<?php include 'admin_auto.php' ?>

<?php
	// Get all Products
	$data = file_get_contents('../system/private/products');
	$products = unserialize($data);

	if (!$products) {
		$msg = "You dont have any product to edit";
		echo '<script>window.location.href = "index.php?msg='.$msg.'";</script>';
	}
?>

<html>
	<head>
		<title>Admin Control Panel</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<div id="container">
					<div id="top-left"><a href="index.php">Admin Panel</a></div>
					<div id="top-right">&nbsp;&nbsp;&nbsp;&nbsp;Dashboard - Edit Product</div>

					<div id="down-left">
						<br /><br /><br /><br />
						<?php include 'menu.html' ?>
					</div>

					<div id="down-right">
						<div id="text-area">
							<p>
								<table>
										<?php
											foreach ($products as $product) {

												$id = $_GET['id'] ? $_GET['id'] : "";
												$category = $_GET['category'] ? $_GET['category'] : "";
												$p_name = $_GET['name'] ? $_GET['name'] : "";
												$p_img = $_GET['image'] ? $_GET['image'] : "../img/no-img.jpg";
												$p_price = $_GET['price'] ? $_GET['price'] : "-1";
												$p_description = $_GET['desc'] ? $_GET['desc'] : "";
												$_count = $_GET['count'] ? $_GET['count'] : "-1";

												echo '
														<form action="../system/product_edit.php" method="get">
															<tr>
																<td><input type="text" name="id" value="'.$product["ID"].'" /></td>
																<td><input type="text" name="category" value="'.$product["category"].'" /></td>
																<td><input type="text" name="name" value="'.$product["name"].'" /></td>
																<td><input type="text" name="image" value="'.$product["image"].'" /></td>
																<td><input type="text" name="price" value="'.$product["price"].'" /></td>
																<td><input type="text" name="desc" value="'.$product["desc"].'" /></td>
																<td><input type="text" name="count" value="'.$product["count"].'" /></td>
																<td><input type="submit" value="Save"></td>
															</tr>
														</form>
												';
											}
										?>
								</table>
							</p>
						</div>
					</div>

		</div>
	</body>
</html>
