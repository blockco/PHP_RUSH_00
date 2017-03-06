<?php
	$login = $_GET['login'] ? $_GET['login'] : "";

	if ($login != "") {

		// Get all users
		$data = file_get_contents('private/users');
		$users = unserialize($data);

		// Find and remove user
		$i = 0;
		foreach ($users as $user) {
			if ($user["login"] == $login) {
				array_splice($users, $i, 1);
				break ;
			}
			$i++;
		}

		// Save to file
		$data = serialize($users);
		file_put_contents('private/users', $data);

		$msg = "User named: $login Removed!";
		echo '<script>window.location.href = "../admin/index.php?msg='.$msg.'";</script>';


	} else {
		$msg = "ERROR: Empty fields";
		echo '<script>window.location.href = "../admin/index.php?msg='.$msg.'";</script>';
	}
?>
