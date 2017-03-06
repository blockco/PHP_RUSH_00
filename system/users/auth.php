<?php

	function auth($login, $passwd) {
		$data = file_get_contents('../private/users');
		$users = unserialize($data);

		$pw_hash = hash('whirlpool', $passwd);
		foreach ($users as $user) {
			if ($user['login'] == $login && $user['passwd'] == $pw_hash) {
				return ($user['level']);
			}
		}

		return (-1);
	}

?>
