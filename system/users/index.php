<html>
	<head>
		<title>Login / Sign-Up</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div id="container">
			<div id="title_area">
				Login / Sign-Up
			</div>
			<div id="text_area">
				<table>
					<form action="login.php" method="post">
						<tr>
							<td>Username:</td>
							<td colspan="2"><input type="text" name="login" value="" /></td>
						</tr><tr>
							<td>Password:</td>
							<td colspan="2"><input type="password" name="passwd" value="" /></td>
						</tr><tr>
							<td></td>
							<td><input type="submit" name="submit" value="Login" /></td>
							<td style="text-align: right;"><input type="submit" name="submit" value="Sign-Up" /></td>
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
