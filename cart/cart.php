<?php
	session_start();

	include "../system/secur.php";
	security("2");
	$total = 0;
?>
	<html>
		<head>
			<link rel="stylesheet" type="text/css" href="../styles.css">
		</head>
		<body>
	<?php

	if ($_SESSION[cart])
	{
		$data = $_SESSION["cart"];
		$products = unserialize($data);
	$i = 0;

			foreach ($products as $value)
			{
					if ($i < count($products));
						echo "<div class='flex-container'>";
					$a = $i + 3;
					while ($i < $a && $i < count($products))
					{
						echo "<div class='flex-item'>
							<div class='p_name'>
								".$value['name']."
							</div>

							<div class='p_cat'>
								".$value['category']."
							</div>

							<div class='p_desc'>
								".$value['desc']."
							</div>
							<div class='p_price'>
								".$value['price']."
							</div>";
						if ($i < count($products));
							echo "</div>";
				 		$i++;
						$total += (int)$value[price];
					}
				echo "</div>";
			}
			echo "<div class='flex-container'>";
			echo "<div class='flex-item'>";
			echo "
			<div class='p_total'>
								total: $total
							</div>";
			echo"
			<div class='but1'>
			<button type='button'><a href='./validate_cart.php'>Place Order Now!</a>
			</button>
			</div>";
			echo '</div>';
			echo '</div>';
		echo '</body>
	</html>';
	}
	else {
		echo "<div class='flex-container'>";
		echo "<div class='flex-item'>";
		echo "
		<div class='p_total'>
							total: $total
						</div>";
		echo '</div>';
		echo '</div>';
		echo '</body>
	</html>';
	}
?>
