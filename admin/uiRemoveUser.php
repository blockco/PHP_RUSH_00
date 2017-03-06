<?php include 'admin_auto.php' ?>
<html>
	<head>
		<title>Admin Control Panel</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<div id="container">
					<div id="top-left"><a href="index.php">Admin Panel</a></div>
					<div id="top-right">&nbsp;&nbsp;&nbsp;&nbsp;Dashboard - Remove user</div>

					<div id="down-left">
						<br /><br /><br /><br />
						<?php include 'menu.html' ?>
					</div>

					<div id="down-right">
						<div id="text-area">
							<p>
								<form action="../system/user_remove.php" method="get">
									User login: <input type="text" name="login" />
									<input type="submit" value="Remove">
								</form>
							</p>
						</div>
					</div>

		</div>
	</body>
</html>
