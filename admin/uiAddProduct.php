<?php include 'admin_auto.php' ?>

<?php
	// Get all categories
	$data = file_get_contents('../system/private/categories');
	$cats = unserialize($data);

	if (!$cats) {
		$msg = "To add new product you have at least one category!";
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
					<div id="top-right">&nbsp;&nbsp;&nbsp;&nbsp;Dashboard - Add New Product</div>

					<div id="down-left">
						<br /><br /><br /><br />
						<?php include 'menu.html' ?>
					</div>

					<div id="down-right">
						<div id="text-area">
							<p>
								<form action="../system/product_add.php" method="get">
									<table>
										<tr>
											<td>Category Name:</td>
											<td>
												<select name="category">
													<?php
														foreach ($cats as $cat) {
															echo '<option value="'.$cat['name'].'">'.$cat['name'].'</option>';
														}
													?>
												</select>
											</td>
										</tr><tr>
											<td>Product Name:</td>
											<td><input type="text" name="name" /></td>
										</tr><tr>
											<td>Product Image URL:</td>
											<td><input type="text" name="image" /></td>
										</tr><tr>
											<td>Product Price:</td>
											<td><input type="text" name="price" /></td>
										</tr><tr>
											<td>Product Description:</td>
											<td><input type="text" name="desc" /></td>
										</tr><tr>
											<td>Product Stock Count:</td>
											<td><input type="text" name="count" /></td>
										</tr><tr>
											<td></td>
											<td><input type="submit" value="Add"></td>
										</tr>
									</table>
								</form>
							</p>
						</div>
					</div>

		</div>
	</body>
</html>
