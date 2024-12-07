<?php /* It displays the products that are selected by a customer as a summary: */
/*	1. Product name					*/
/*	2. Price per product				*/
/*	3. Quantity of products selected		*/
/*	4. Total					*/
/*	5. It saves these values on session variables */

include 'head.php';
?>
	<title>Summary of ordered products</title>


	</head>

	<body>
	<header>
		<h1>Tlhogi Lights</h1>
	</header>
	<link rel='stylesheet' href='styleMP.css' />
<?php
$fileName = "Add_name.php";
	if (isset($_SESSION['link']))
	{
		$fileName = "summary_products_plus_customerInfo.php";
	}
?>

<form action="<?php echo $fileName; ?>" enctype="multipart/form-data" method="post">
<?php
		$quantity = $_SESSION["product_quantity"];
		$price_for_all_products = $_SESSION["prod_price_s"]; 
		$price_for_ordered_products = [];
		$all_products = $_SESSION["product_name"];
		$orderd_products = [];
		$quantity_for_odered_products = [];
		$total_per_product = [];
		$total_for_all_products_s = 0;
		$products_total;
		$y = 0; 	//counts the number of products that have a quantity that is >0
		//$total_per_product_s;
			for ($x = 0; $x < $_SESSION["product_quantity"]; $x++)
			{		
					//echo $_POST["product".$x];
				if ($_POST["product". $x] > 0)
				{
					$quantity_for_odered_products[$y] = $_POST["product".$x];
					
					$ordered_products[$y] = $all_products[$x];	
					$total_per_product[$y] = $_POST["product".$x] * $price_for_all_products[$x];
					$price_for_ordered_products[$y] = $price_for_all_products[$x];
					$products_total[$y] = $price_for_ordered_products[$y] ."     ".  $ordered_products[$y] ."       " .$_POST["product".$x] . "       R" .$total_per_product[$y]. "<br><br>"; 	
					$total_for_all_products_s += $total_per_product[$y]; 
					$y++;
				}
			}
		$_SESSION['quantity_of_products_selected'] = $y;
		$_SESSION['products_total'] = $products_total;
		$_SESSION["price_s"] = $price_for_ordered_products;
		$_SESSION["prod_quantity_s"] = $quantity_for_odered_products;
		$_SESSION["prod_name_s"] = $ordered_products;
		$_SESSION["total_per_product_s"] = $price_for_ordered_products;
		$_SESSION["total_for_all_products_s"] = $total_for_all_products_s;   
		include 'product_total_display.php';
?>
<div class = "uploadpanel">

<button>Order</button>
</div>
