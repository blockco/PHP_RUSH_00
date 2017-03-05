<?php include 'admin_auto.php' ?>
<html>
	<head>
		<title>Admin Control Panel</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<div id="container">
					<div id="top-left"><a href="index.php">Admin Panel</a></div>
					<div id="top-right">&nbsp;&nbsp;&nbsp;&nbsp;Dashboard - Remove product</div>

					<div id="down-left">
						<br /><br /><br /><br />
						<?php include 'menu.html' ?>
					</div>

					<div id="down-right">
						<div id="text-area">
							<p>
								<form action="../system/product_remove.php" method="get">
									Product ID: <input type="text" name="id" />
									<input type="submit" value="Remove">
								</form>
							</p>
						</div>
					</div>

		</div>
	</body>
</html>
