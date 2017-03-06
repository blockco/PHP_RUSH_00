<?php
	session_start();
	include 'auth.php';

	$user =  $_POST['login'] ?  $_POST['login'] : "";
	$pass =  $_POST['passwd'] ?  $_POST['passwd'] : "";
	$action =  $_POST['submit'] ?  $_POST['submit'] : "";

	if ($user != "" && $pass != "" && $action != "") {

		if ($action == "Login") { //Log in

			$lvl = auth($user, $pass);
			if ($lvl != -1) {
				$_SESSION["loggued_on_user"] = $user;
				$_SESSION["user_level"] = $lvl;

				echo '<script>window.location.href = "../../index.php";</script>';

			} else {
				$_SESSION["loggued_on_user"] = "";
				$_SESSION["user_level"] = "";

				$msg = "** Wrong username or password"; // user not exists
				echo '<script>window.location.href = "index.php?msg='.$msg.'";</script>';
			}

		} else { //Sign-Up

			echo '<script>window.location.href = "create.php?submit='.$action.'&passwd='.$pass.'&login='.$user.'";</script>';

		}

	} else {
		$msg = "** Empty username or password"; // user not exists
		echo '<script>window.location.href = "index.php?msg='.$msg.'";</script>';
	}

?>
