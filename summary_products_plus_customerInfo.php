<?php include 'head.php'; ?>

	<title>Upload page</title>


	</head>

	<body>
	<header>
		<h1>Tlhogi Lights</h1>
	</header>
	<link rel='stylesheet' href='styleMP.css' />
	<form action="Tlhogi_lights_online_shop.php" enctype="multipart/form-data" method="post">
	<div>
<?php 	
	
	include 'product_total_display.php';
?>
	<?php

	include 'customer_info.php';
	include 'tlhogi_lights_online_shop_database_connection.php';
	include 'Tlhogi_lights_database_class.php';
	
	$transaction = new Cash_and_Credit_transaction();
	$transaction->set_product_name_list($_SESSION["prod_name_s"]);
	$transaction->set_price_per_product($_SESSION["price_s"]);
	$transaction->set_quantity_per_product($_SESSION["prod_quantity_s"]);
	$transaction->set_total_per_product($_SESSION["total_per_product_s"]);
	$transaction->set_total_for_all_products($_SESSION["total_for_all_products_s"]);

	if (isset($_SESSION["transaction"]))
	{
		$transaction->set_pay_date($_SESSION["pay_date"]);
		$sales_person = $_SESSION['user'];
	}
	 
	$transaction->set_name($_SESSION['name_s']);
	$transaction->set_surname($_SESSION['surname_s']);
	$transaction->set_title($_SESSION['title_s']);
	$transaction->set_gender($_SESSION['gender_s']);
	$transaction->set_address($_SESSION['address_s']);
	$transaction->set_phone_number($_SESSION['phone_number']);
	$transaction->set_email($_SESSION["email_s"]);

	$contact = $transaction->get_phone_number();
	$title = $transaction->get_title();
	$name = $transaction->get_name();
	$gender = $transaction->get_gender();
	$address = $transaction->get_address();
	$surname = $transaction->get_surname();
	$email = $transaction->get_email();
	echo "<br>"; echo $name. "****".$surname; echo "<br>";
	$pay_date = $transaction->get_pay_date(); echo $pay_date. "pay date"; echo "<br>";
	$transaction->save_customer_to_database($name, $surname, $contact, $title, $address, $email, $gender);
	

	date_default_timezone_set('Africa/Johannesburg');
	$date = date('Y-m-d h:i a', time());
	echo "CurrentTimeDate: ".$date;
	if ($_SESSION["transaction"] == "cash")
	{	
		$product_name = $transaction->get_product_name_list();
		$price_p_product = $transaction->get_price_per_product();
		$quantity_p_product = $transaction->get_quantity_per_product();
		

		for ($x = 0; $x < $_SESSION['quantity_of_products_selected']; $x++)
		{
			$subtotal = $quantity_p_product[$x]*$price_p_product[$x];
			$product_names = $transaction->get_product_name_list();
			echo "<br>";
			echo $product_names[$x];
			$query = "INSERT INTO cash_online_transaction (Product_name, Price_per_item, Date_time_of_purchase, Quantity_per_product, Contact_number, Subtotal) VALUES ('$product_names[$x]','$price_p_product[$x]', '$date', '$quantity_p_product[$x]', '$contact', '$subtotal')";
			mysqli_query($conn, $query);	
		}
	} 
	
	 else if ($_SESSION["transaction"] == "credit")
	{	
		$net_total = 0;
		$product_name = $transaction->get_product_name_list();
		$price_p_product = $transaction->get_price_per_product();
		$quantity_p_product = $transaction->get_quantity_per_product();

		for ($x = 0; $x < $_SESSION['quantity_of_products_selected']; $x++)
		{
			echo "<br>";
			echo $pay_date;
			echo $product_name[$x]; echo "<br>"; echo $pay_date; echo "<br>"; echo $price_p_product[$x]; echo "<br>"; echo "<br>"; echo $quantity_p_product[$x]; echo "<br>"; echo $contact; echo "<br>"; echo $pay_date; echo "<br>"; 
			$subtotal = $quantity_p_product[$x] * $price_p_product[$x];
			$net_total += $subtotal;
			$query = "INSERT INTO credit_inforamtion(Product_name, Price_per_item, Date_time_of_credit, Quantity_per_product, Contact_number, Pay_date, Total_per_product, Sales_person) VALUES ('$product_name[$x]', '$price_p_product[$x]', '$date', '$quantity_p_product[$x]', '$contact', '$pay_date', '$subtotal', '$sales_person')";
			mysqli_query($conn, $query);
			
		}
			if (isset($_SESSION["existing_customer"]))
			{
				if ($_SESSION["existing_customer"] == "no outstanding amount")
				{
					$sql = "UPDATE transaction SET Balance = $net_total WHERE Contact_number = $contact";
					if ($conn->query($sql) == TRUE)
					{
						echo "Record updated successfully";
					}
					else
					{
						echo "Error connecting table",$conn->error;
					}
				}
				else
				{
					echo '$date = $date(Y-m-d)';
					$query = "INSERT INTO transaction(Contact_number, Balance, Date_of_credit)VALUES('$contact', '$net_total', now())";
					mysqli_query($conn, $query);
				}
			}
	} 
	else if ($_SESSION["transaction"] == "order")
	{
		//$transaction->set_pay_date($pay);
		
		$product_name = $transaction->get_product_name_list();
		$price_p_product = $transaction->get_price_per_product();
		$quantity_p_product = $transaction->get_quantity_per_product();
		//$pay_date = $transaction->get_pay_date();
		
		for ($x = 0; $x < $_SESSION['quantity_of_products_selected']; $x++)
		{
			$query = "INSERT INTO orders_table(Contact_number, Product_name, Price_per_item, Quantity_per_product, Date_time_of_transaction, Order_date, Sales_person) VALUES ('$contact', '$product_name[$x]', '$price_p_product[$x]', '$quantity_p_product[$x]', '$date', '$pay_date', '$sales_person')";
			mysqli_query($conn, $query);
		}
	}
	else if ($_SESSION["transaction"] == "door_to_door")
	{
		$product_name = $transaction->get_product_name_list();
		$price_p_product = $transaction->get_price_per_product();
		$quantity_p_product = $transaction->get_quantity_per_product();
		

		for ($x = 0; $x < $_SESSION['quantity_of_products_selected']; $x++)
		{
			$subtotal = $quantity_p_product[$x]*$price_p_product[$x];
			$product_names = $transaction->get_product_name_list();
			echo "<br>";
			echo $product_names[$x]."***";
			$query = "INSERT INTO physical_purchase_table (Product_name, Total_per_product, Date_time_of_purchase, Quantity_per_product, Phone_number, Sales_person) VALUES ('$product_names[$x]', '$subtotal', '$date', '$quantity_p_product[$x]', '$contact', '$sales_person')";
			mysqli_query($conn, $query);	
		}	
	} ?>
	<button>Done</button>
<?php
	unset($_SESSION["prod_name_s"]);
	unset($_SESSION["price_s"]);
	unset($_SESSION["prod_quantity_s"]);
	unset($_SESSION["total_per_product_s"]);
	unset($_SESSION["total_for_all_products_s"]);
	unset($_SESSION["credit"]);
	unset($_SESSION["order"]);	
	unset($_SESSION["pay_date"]);
	unset($_SESSION['user']);
	unset($_SESSION['name_s']);
	unset($_SESSION['surname_s']);
	unset($_SESSION['title_s']);
	unset($_SESSION['gender_s']);
	unset($_SESSION['address_s']);
	unset($_SESSION['phone_number']);
	unset($_SESSION["email_s"]);
	unset($_SESSION['quantity_of_products_selected']);
?>



</form>
</html>
