<?php
	$user =  $_POST['login'] ?  $_POST['login'] : "";
	$pass =  $_POST['passwd'] ?  $_POST['passwd'] : "";
	$lvl = $_POST['lvl'] ?  $_POST['lvl'] : "";
	if ($user != "" && $pass != "" && $lvl != "") {

		$users = array();

		//Get data from file:
		if (file_exists('private')) {
			if (file_exists('private/users')) {
				$data = file_get_contents('private/users');
				$users = unserialize($data);
			}
		} else {
			mkdir('private');
		}

		$exists = true;
		foreach ($users as $us) {
			if ($us["login"] == $user)
				$exists = false;
		}
		if ($exists) {
			//Create new user array:
			$pw_hash = hash('whirlpool', $pass);
			$new = array("login" => $user, "passwd" => $pw_hash, "level" => $lvl);

			if ($users)
				array_push($users, $new);
			else
				$users = array($new);

			//Save
			$data = serialize($users);
			 file_put_contents('private/users', $data);

			 $msg = "User $user create.";
			 echo '<script>window.location.href = "../admin/index.php?msg='.$msg.'";</script>';
		} else {
			$msg = "ERROR: user exists"; //user exists
			echo '<script>window.location.href = "../admin/index.php?msg='.$msg.'";</script>';
		}
	} else {
		$msg = "ERROR: empty fields"; //empty username or password
		echo '<script>window.location.href = "../admin/index.php?msg='.$msg.'";</script>';
	}
?>
