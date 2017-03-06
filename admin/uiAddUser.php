<?php include 'admin_auto.php' ?>

<html>
	<head>
		<title>Admin Control Panel</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<div id="container">
					<div id="top-left"><a href="index.php">Admin Panel</a></div>
					<div id="top-right">&nbsp;&nbsp;&nbsp;&nbsp;Dashboard - Add New User</div>

					<div id="down-left">
						<br /><br /><br /><br />
						<?php include 'menu.html' ?>
					</div>

					<div id="down-right">
						<div id="text-area">
							<p>
								<form action="../system/user_add.php" method="post">
									<table>
										<tr>
											<td>User Type:</td>
											<td>
												<select name="lvl">
													<option value="1">Admin</option>
													<option value="2">Normal</option>
												</select>
											</td>
										</tr><tr>
											<td>Username:</td>
											<td><input type="text" name="login" /></td>
										</tr><tr>
											<td>Password:</td>
											<td><input type="password" name="passwd" /></td>
										</tr><tr>
											<td></td><td><input type="submit" value="Add"></td>
										</tr>
									</table>
								</form>
							</p>
						</div>
					</div>

		</div>
	</body>
</html>
