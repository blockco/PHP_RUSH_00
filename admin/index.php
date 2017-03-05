<?php include 'admin_auto.php' ?>
<html>
	<head>
		<title>Admin Control Panel</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<div id="container">
					<div id="top-left"><a href="index.php">Admin Panel</a></div>
					<div id="top-right">&nbsp;&nbsp;&nbsp;&nbsp;Dashboard</div>

					<div id="down-left">
						<br /><br /><br /><br />
						<?php include 'menu.html' ?>
					</div>

					<div id="down-right">
						<div id="text-area">
							<p>
								Hello <?php $_SESSION['login']?>, Welcome to your dashboard!
								<br />
								<br />
								Status / Action Log:
								<div id="status-area">
									<p>
										<?php
											$msg = $_GET['msg'] ? $_GET['msg'] : "Empty, nothing to show...";
											echo $msg;
										?>
									</p>
								</div>
							</p>
						</div>
					</div>

		</div>
	</body>
</html>
