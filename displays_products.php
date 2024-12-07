<?php	//Displays the products by name, image, price, quantity required.
	//Saves the following in the session variables from the products displayed in the "Tlhogi_lights_online_shop.php page":
	//1. Names of the products.
	//2. Quantity of the products
	//3. Price for each item

	
?>
<link rel='stylesheet' href='styleMP.css' />
<?php 
include 'tlhogi_lights_online_shop_database_connection.php';
	
?>
<content>
<div class = "uploadpanel">
<?php
 $fileName = "product_summary.php";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{	
	if (isset($_SESSION["transaction"]))
	{
	 if ($_SESSION["transaction"] == "remove_product")
	{	echo $_SESSION["product_quantity"];
		for ($x = 0; $x < $_SESSION["product_quantity"]; $x++)
		{	echo $_POST["check".$x];
			$fileName = "remove_product_.php";

				if (isset($_POST[$x]))
				{
				$selected_product = $_POST["check".$x];
				echo $selected_product;
				 $sql = "DELETE FROM products WHERE id = $selected_product";
				if ($conn->query($sql) == TRUE)
				{
					echo "Record updated successfully";
				}
				else
				{ 
					echo "Error connecting table".$conn->error;
				} 
				}
			
		}
	} 
	}
}
	//echo $_SESSION["pay_date"];
?>
<form action = "<?php echo $fileName; ?>" enctype="multipart/form-data"  method ="post">
  <?php
	
  $sql = "SELECT Name, Picture, Price, id FROM products";
  $result = $conn->query($sql);

  $name = "";
  $price = 0;
  $items;
  $total = 0;
  $quantity = 0;
  $count = 0;
  $product_name_array;
$row_id = array();
 
if ($result->num_rows > 0) 
   {
 	 while($row = $result->fetch_assoc()) 
  	{ ?>
<?php		if (isset($_SESSION["transaction"]))
		{
		if ($_SESSION["transaction"] == "remove_product")
		{ ?>
		
			<input type="checkbox" id="<?php echo "check".$row["id"]; ?>" name= "<?php echo "check".$row["id"]; ?>" value = "<php echo $row["id"]; ?>">
<?php			$row_id[$count] = $row["id"];
			
		}
		}
?>
  		<div>
  		<p><img width='250' height='auto' src='<?php echo $row["Picture"]; ?>' /></p>
  		<p><?php echo  $row["Name"]; "<br>" ?></p>
  		<p><?php echo "R" .$row["Price"]; "<br>" ?></p>
  
  		<p><label for = "quantity">How many do you need</label></p>
  		<?php $product_name = $row["Name"]; ?>
  		<p><input type = "number" name = "<?php echo "product" .$count; ?>" ></p>	
	<?php	$price = $row["Price"];	
		$prod_name_array[$count] = $product_name;
		$prod_price[$count] = $price; 
		//$sql2 = "UPDATE products SET products.id = $count ON $row[7];";
		//$conn->query($sql2);	 
		$count++;				
		
				?>
		</div> 
		
		
 <?php }
	$transaction = ""; 
	if (isset($_SESSION["transaction"]))
	{
		$transaction = $_SESSION["transaction"];
	if ($_SESSION["transaction"] != "remove_product")
	{	 
		 
		$_SESSION["product_name"] = $prod_name_array;
		$_SESSION["prod_price_s"] = $prod_price;	
		$_SESSION["num_rows_s"] = $result->num_rows;
		
	}
	}
		$_SESSION["product_quantity"] = $count; echo $_SESSION["product_quantity"];  
		$_SESSION["row_id"] = $row_id;
	
 	?>
	<button type = "submit" name = "<?php echo $transaction; ?>" > <?php echo $transaction; ?></button>
<?php } 
echo $_SESSION["product_quantity"];
?> 
	
   
</form> 
</div>
</content>
