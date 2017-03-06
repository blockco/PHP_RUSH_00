<?php

	$old_login = $_POST['o_login'] ?  $_POST['o_login'] : "";
	$login =  $_POST['login'] ?  $_POST['login'] : "";
	$pass =  $_POST['passwd'] ?  $_POST['passwd'] : "";
	$lvl = $_POST['lvl'] ?  $_POST['lvl'] : "";

	if ($old_login != "" && $login != "" && $pass != "" && $lvl != "") {

		$users = array();
		$pw_hash = hash('whirlpool', $pass);

		// Get users
		$data = file_get_contents('private/users');
		$users = unserialize($data);

		// Find and edit user
		foreach ($users as &$user) {
			if ($user["login"] == $old_login) {
				$user = array("login" => $login, "passwd" => $pw_hash, "level" => $lvl);
				break ;
			}
		}

		//Save
		$data = serialize($users);
		file_put_contents('private/users', $data);

		$msg = "User $login Edit.";
		echo '<script>window.location.href = "../admin/index.php?msg='.$msg.'";</script>';

	} else {
		$msg = "ERROR: empty fields"; //empty username or password
		echo '<script>window.location.href = "../admin/index.php?msg='.$msg.'";</script>';
	}

?>
