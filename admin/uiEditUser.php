<?php include 'admin_auto.php' ?>

<?php
	// Get all Users
	$data = file_get_contents('../system/private/users');
	$users = unserialize($data);

	if (!$users) {
		$msg = "You dont have any user to edit";
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
					<div id="top-right">&nbsp;&nbsp;&nbsp;&nbsp;Dashboard - Edit User</div>

					<div id="down-left">
						<br /><br /><br /><br />
						<?php include 'menu.html' ?>
					</div>

					<div id="down-right">
						<div id="text-area">
							<p>
								<table>
										<?php
											foreach ($users as $user) {

												$login = $_GET['login'] ? $_GET['login'] : "";

												echo '
														<form action="../system/user_edit.php" method="post">
														<input type="hidden" name="o_login" value="'.$user["login"].'">
															<tr>
																<td>
																	';
																	if ($user["level"] == "1") {
																		echo '
																			<select name="lvl">
																				<option value="1">Admin</option>
																				<option value="2">Normal</option>
																			</select>
																		';
																		}
																	else {
																		echo '
																			<select name="lvl">
																				<option value="2">Normal</option>
																				<option value="1">Admin</option>
																			</select>
																		';
																	}
																echo '								
																</td>
																<td><input type="text" name="login" value="'.$user["login"].'" /></td>
																<td><input type="password" name="passwd" value="" /></td>
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
