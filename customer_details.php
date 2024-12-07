<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="description" content="Adds details of missing people">
<meta name="keywords" content="Missing people, Khumbula ekhaya, Lost and found">
<meta name="author" content="Lehlohonolo Nzama">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tlhogi Lights</title>
<link rel='stylesheet' href='styleMP.css' />
</head>
<body>
<header>
	<h1>Tlhogi Lights</h1>
	<h2>Customer database</h2>
</header>

<style>
table, th, td {
  border: 1px solid black;
}
</style>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "tlhogi_lights_online_shop";
 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
<content>
<div class = "uploadpanel">
<form>
<?php

	$sql = "SELECT Name, Surname, Address, Telnumber, Gender, Item_name, Dog_constraint, Gate_constraint, Order_date, Order_time, Telnumber FROM customer_tb";
	$result = $conn->query($sql);

	$sql2 ="SELECT Price_per_item, Quantity, Subtotal, Total, Product_name, Telnumber FROM Customer_order";
	$result2 = $conn->query($sql2);
 
	if ($result->num_rows > 0) 
	{
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			 $personal_details[] = $row;
		}
		for ($x = 0; $x < count($personal_details); $x++)
		{
?>	
			<div>
			<h2>Customer buying history</h2>
  			<?php echo $personal_details[$x]["Name"] . " ". $personal_details[$x]["Surname"]; "<br>" ?>
  			<p><?php echo $personal_details[$x]["Address"]; "<br>" ?></p>
			<p><?php echo $personal_details[$x]["Telnumber"]; "<br>" ?></p>
 			
			<table style="width:100%">
			<tr>
				<th>Product name</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Sell date</th>
				<th>Total</th>
			</tr>
<?php			$product_name; $price; $quantity; $subtotal; $telnumber;
			while($row2 = $result2->fetch_assoc())
			{
				$buying_history[] = $row2;
				/* $product_name[$count] = $row2["Product_name"];
				$price[$count] = $row2["Price_per_item"];
				$quantity[$count] = $row2["Quantity"];
				$subtotal[$count] = $row2["Subtotal"]; 
				$telnumber[$count] = $row2["Telnumber"]; */
						
			}
			$total;
			for ($y = 0; $y < count($buying_history); $y++)
			{
				if($buying_history[$y]["Telnumber"] == $personal_details[$x]["Telnumber"])
				{ 
?>					
					<tr>
					<td><?php echo $buying_history[$y]["Product_name"]; ?></td>
					<td><?php echo $buying_history[$y]["Price_per_item"]; ?></td>
					<td><?php echo $buying_history[$y]["Quantity"]; ?></td>
					<td><?php echo $personal_details[$x]["Order_date"]; ?></td>
					<td><?php echo $buying_history[$y]["Subtotal"]; ?></td>
					</tr>
<?php					
						
				}	
				 
			}
?>			
			</table>
			</div>
 
<?php		}
	} ?>
	  	
  	</form>
  	</div>
  	</content>



<footer>
 <p> Copyright &copy; 2021 </p>
 </footer>

<style>
body{
background-image: url('images (2).jpeg');
		background-repeat: no-repeat;
	 	background-attachment: fixed;
		background-size: 100% 100%;}
</style>
</body>
</html>
