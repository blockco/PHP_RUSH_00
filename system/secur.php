<?php

	function security($lvl) {
		$user = $_SESSION["loggued_on_user"] ? $_SESSION["loggued_on_user"] : "";
		$level = $_SESSION["user_level"] ? $_SESSION["user_level"] : "";

		if ($user != "" && ($level == "1" || $level == "2")) {

			if (($lvl == "1" && $level == "1") || ($lvl == "2")) {

				//evrything good!

			} else {
				//Only admin!
				$msg = "** ERROR: Admin area!"; //user exists
				echo '<script>window.location.href = "http://localhost:8081/index.php?msg='.$msg.'";</script>';
			}
		} else {
			$msg = "** ERROR: Need to login";
			echo '<script>window.location.href = "http://localhost:8081/system/users/index.php?msg='.$msg.'";</script>';
		}
	}

?>
