<html>
	<head>
		<title>Change password</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div id="container2">
			<div id="title_area">
				Login / Sign-Up
			</div>
			<div id="text_area">
				<table>
					<form action="modif.php" method="post">
						<tr>
							<td>Username:</td>
							<td><input type="text" name="login" value="" /></td>
						</tr><tr>
							<td>Old Password:</td>
							<td><input type="password" name="oldpw" value="" /></td>
						</tr><tr>
							<td>New Password:</td>
							<td><input type="password" name="newpw" value="" /></td>
						</tr><tr>
							<td></td>
							<td style="text-align: right;"><input type="submit" name="submit" value="Save" /></td>
						</tr>
					</form>
				</table>
				<?php
					$msg = $_GET['msg'] ? $_GET['msg'] : "";
					echo "&nbsp;&nbsp;".$msg;
				?>
			</div>
		</div>
	</body>
</html>
