<?php
	$num_rows = count($_SESSION["products_total"]);
	$rows = $_SESSION["products_total"];
	$total = $_SESSION["total_for_all_products_s"];
	for ($x = 0; $x < $num_rows; $x++)
	{
		echo $rows[$x];
		
	}
	echo "Total: R" .$total;
?>