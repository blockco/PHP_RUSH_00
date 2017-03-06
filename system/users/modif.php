<?php
	$submit =  $_POST['submit'];
	if ($submit == "Save") {

		$user =  $_POST['login'] ?  $_POST['login'] : "";
		$old_pw =  $_POST['oldpw'] ?  $_POST['oldpw'] : "";
		$new_pw = $_POST['newpw'] ?  $_POST['newpw'] : "";
		if ($user != "" && $old_pw != "" && $new_pw != "") {

			//Get data from file:
			$data = file_get_contents('../private/users');
			$users = unserialize($data);

			$exists = false;
			foreach ($users as &$us) {
				if ($us["login"] == $user) {
					$exists = true;

					//Check old pass:
					$old_hash = hash('whirlpool', $old_pw);
					if ($old_hash == $us["passwd"]) {

						//Update password
						$new_hash = hash('whirlpool', $new_pw);
						$us["passwd"] = $new_hash;

						//Save:
						$data = serialize($users);
						file_put_contents('../private/users', $data);

						echo '<script>window.location.href = "../../index.php";</script>';

					} else {
						$msg = "** ERROR: Worng old password";
						echo '<script>window.location.href = "newPass.php?msg='.$msg.'";</script>';
					}
					break ;
				}
			}

			if ($exists == false) {
				$msg = "** ERROR: user not exist";
				echo '<script>window.location.href = "newPass.php?msg='.$msg.'";</script>';
			}
		} else {
			$msg = "** ERROR: empty username or old/new password";
			echo '<script>window.location.href = "newPass.php?msg='.$msg.'";</script>';
		}
	} else {
		$msg = "** ERROR: value of submit is not 'Save'";
		echo '<script>window.location.href = "newPass.php?msg='.$msg.'";</script>';
	}
?>
