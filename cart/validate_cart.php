<?php
	session_start();

	include "../system/secur.php";
	security("2");

$toSave = array();
$file = unserialize(file_get_contents("../system/private/purchase"));
	if ($_SESSION['cart'])
	{
		$data = $_SESSION['cart'];
		$products = unserialize($data);
		foreach ($products as $item)
		{
			$new = array(
				"name" => $item[name],
				"login" => $_SESSION[login],
				"time" => time()
			);
			if ($file)
				array_push($file, $new);
			else
				$file = array($new);
		}
		$final = serialize($final);
		file_put_contents("../system/private/purchase", $final);
	}
	$_SESSION['cart'] = "";
	echo '<script>window.location.href = "../index.php" ;</script>';
?>
