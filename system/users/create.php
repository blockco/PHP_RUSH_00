<?php
	$submit =  $_GET['submit'];
	if ($submit == "Sign-Up") {

		$user =  $_GET['login'] ?  $_GET['login'] : "";
		$pass =  $_GET['passwd'] ?  $_GET['passwd'] : "";
		if ($user != "" && $pass != "") {

			$users = array();

			//Get data from file:
			if (file_exists('../private')) {
				if (file_exists('../private/users')) {
					$data = file_get_contents('../private/users');
					$users = unserialize($data);
				}
			} else {
				mkdir('../private');
			}

			$exists = true;
			foreach ($users as $us) {
				if ($us["login"] == $user)
					$exists = false;
			}
			if ($exists) {
				//Create new user array:
				$pw_hash = hash('whirlpool', $pass);
				$new = array("login" => $user, "passwd" => $pw_hash, "level" => "2");
				array_push($users, $new);

				//Save
				$data = serialize($users);
				 file_put_contents('../private/users', $data);

				 echo '<script>window.location.href = "../../index.php";</script>';

			} else {
				$msg = "** ERROR: user exists"; //user exists
				echo '<script>window.location.href = "index.php?msg='.$msg.'";</script>';
			}
		} else {
			$msg = "** ERROR: empty fields"; //empty username or password
			echo '<script>window.location.href = "index.php?msg='.$msg.'";</script>';
		}
	} else {
		$msg = "** ERROR: value of submit is not 'Sign-Up'"; //value of submit is not "OK"
		echo '<script>window.location.href = "index.php?msg='.$msg.'";</script>';
	}
?>
