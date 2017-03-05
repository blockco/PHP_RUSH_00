<?php include 'admin_auto.php' ?>

<?php
	// Get all categories
	$data = file_get_contents('../system/private/categories');
	$cats = unserialize($data);

	if (!$cats) {
		$msg = "You dont have any category to remove";
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
					<div id="top-right">&nbsp;&nbsp;&nbsp;&nbsp;Dashboard - Remove Category</div>

					<div id="down-left">
						<br /><br /><br /><br />
						<?php include 'menu.html' ?>
					</div>

					<div id="down-right">
						<div id="text-area">
							<p>
								<form action="../system/category_remove.php" method="get">
									Category Name:
									<select name="name">
										<?php
											foreach ($cats as $cat) {
												echo '<option value="'.$cat['name'].'">'.$cat['name'].'</option>';
											}
										?>
									</select>
									<input type="submit" value="Remove">
								</form>
							</p>
						</div>
					</div>

		</div>
	</body>
</html>
