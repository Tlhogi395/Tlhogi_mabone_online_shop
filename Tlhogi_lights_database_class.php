
<?php
include 'tlhogi_lights_online_shop_database_connection.php';
class Validate_and_sanitize
{
	private $data;
	function sanitize($data)
	{
		$data = trim($data);
 	 	$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}
}
$strip = new Validate_and_sanitize();
class Tlhogi_database
{
	private $balance;		
	private $pay;
	private $contact_number;
	private $error_msg;
	function get_balance($phone_number)
	{
		include 'tlhogi_lights_online_shop_database_connection.php';
		$sql = "SELECT ContactNumber, Title, Name, Surname, Address, Email, Gender FROM customer_table";
		$result = $conn->query($sql);
		
		$sql2 = "SELECT Contact_number, Balance FROM transaction";
		$result2 = $conn->query($sql2);
		$no = 0;
		$this->contact_number = $phone_number;	
		if ($result->num_rows > 0)	
		{
			while ($row = $result->fetch_assoc())
			{	
				if ($this->contact_number == $row["ContactNumber"])
				{
					while ($row2 = $result2->fetch_assoc())
					{
						if ($this->contact_number == $row2["Contact_number"])						
						{
							if ($row2["Balance"] > 0 )
							{
								$this->balance = $row2["Balance"];
							}
							else
							{
								$error_msg = "You do not have any outstanding amount";
								return  $error_msg;
							}
							$no = 1;
						}
					}
				}
			}	
		}
		if ($no ==1)
		{
			return  $this->balance;
			
		}
		else
		{
			$error_msg = "The record does not exist";
			return  $error_msg;
		}
	}
	function find_customer($name, $surname, $phone_number)
	{
		include 'tlhogi_lights_online_shop_database_connection.php';
		$query = "SELECT * FROM customer_table";
		$result = $conn->query($query);
		$does_customer_exist = "0";
		if ($result->num_rows > 0)
		{
			while ($row = $result->fetch_assoc())
			{
				if ($row["ContactNumber"] == $phone_number && $row["Name"] == $name && $row["Surname"] == $surname)
				{
					$does_customer_exist = "1";
				}
				else
				{
					if ($row["ContactNumber"] == $phone_number)
					{
						$does_customer_exist = "2";
					}	
				}
			}	
		}
		return $does_customer_exist;
	}
	
	function make_payment($pay)
	{
		echo $pay; echo "<br>";
		include 'tlhogi_lights_online_shop_database_connection.php';
		$contact =  $_SESSION["phone_number"];
		//echo "<br>"; echo $contact;

		$query = "SELECT * FROM Credit_inforamtion";
		$result2 = $conn->query($query);
		$payment_date = "***";
		$date_time_of_credit = "";
		if ($result2->num_rows > 0)
		{
			while ($row = $result2->fetch_assoc())
			{
				if ($row["Contact_number"] == $contact)
				{
					$payment_date = $row["Pay_date"];
					$date_time_of_credit = $row["Date_time_of_credit"];
				}
			}
		}
		$date_time_of_credit = $dateTime->format('Y-m-d');
		$query = "SELECT Contact_number, Balance FROM transaction";
		$result2 = $conn->query($query);
		$new_balance = 0;
		if ($result2->num_rows > 0)
		{
			while ($row = $result2->fetch_assoc())
			{
				if ($row["Contact_number"] == $contact)
				{
					$new_balance = $row["Balance"] - $pay; 
				}
			}
		}	
		echo $new_balance;
		$sql = "UPDATE transaction SET Balance = $new_balance WHERE Contact_number = '$contact'";
		if ($conn->query($sql) == TRUE)
		{
			echo "Record updated successfully";
		}
		else
		{
			echo "Error connecting table",$conn->error;
		}
		
		$sql2 = "SELECT Contact_number, Balance FROM transaction";
		$result = $conn->query($sql2);

		 
		
		if ($result->num_rows > 0)
		{
			while ($row = $result->fetch_assoc())
			{	
				if ($contact == $row["Contact_number"])
				{	
					$user = $_SESSION['user']; echo $contact; echo "<br>"; echo $user; echo "<br>"; echo $payment_date; echo "<br>"; echo $pay; echo "<br>";
					$query = "INSERT INTO credit_payment (Contact_number, Date_time_of_credit, Date_time_of_payment, Payment_made, Sales_person) VALUES ('$contact', '$date_time_of_credit', '$payment_date', '$pay', '$user')";
 					if ($conn->query($query) == TRUE)
					{
						echo "Record updated successfully";
					}
					else
					{
						echo "Error connecting table",$conn->error;
					}
					echo $contact ."<br>";
					//echo "Date of credit ". $credit_date ."<br>";
					//echo "Payment date ". $payment_date ."<br>";
					echo "Payment ". $pay; 
					//$stmt->execute();
					//header('location: admin_page.php');
                			exit("Record has been updated");		
				}
			}
		}	 	
	}
	function delete_database()
	{
		include 'tlhogi_lights_online_shop_database_connection.php';
		$sql = "DELETE FROM transaction";
		$conn->query($sql);
		$sql = "DELETE FROM Credit_payment";
		$conn->query($sql);
		$sql = "DELETE FROM credit_inforamtion";
		$conn->query($sql);
		$sql = "DELETE FROM cash_online_transaction";
		$conn->query($sql);
		$sql = "DELETE FROM customer_table";
		$conn->query($sql);
		$sql = "DELETE FROM orders_table";
		$conn->query($sql);
	}
}
class Customer_biography
{
	private $name;
	private $surname;
	private $title;
	private $gender;
	private $address;
	private $phone_number;
	private $email;
	private $payDate;

	function set_name($nam)
	{
		$this->name = $nam;
	}
	function set_surname($surnam)
	{
		$this->surname = $surnam;
	}
	function set_title($titl)
	{
		$this->title = $titl;
	}
	function set_gender($gend)
	{
		$this->gender = $gend;
	}
	function set_address($addres)
	{
		$this->address = $addres;
	}
	function set_phone_number($phone)
	{
		$this->phone_number = $phone;
	}
	function set_email($email_address)
	{
		$this->email = $email_address;
	}
	
	function get_name()
	{
		return $this->name;
	}
	function get_surname()
	{
		return $this->surname;
	}
	function get_title()
	{
		return $this->title;
	}
	function get_gender()
	{
		return $this->gender;
	}
	function get_address()
	{
		return $this->address;
	}
	function get_phone_number()
	{
		return $this->phone_number;
	}
	function get_email()
	{
		return $this->email;
	}
	//saves the customer to Customer_table if the following does not exist in the database:
	//1. Name
	//2. Surname
	//3. Contact number
	function save_customer_to_database($name_p, $surname_p, $contact_p, $title_p, $address_p, $email_p, $gender_p)
	{		
		include 'tlhogi_lights_online_shop_database_connection.php';
		$query = "SELECT ContactNumber, Title, Name, Surname, Address, Email, Gender FROM Customer_table";
		$result = $conn->query($query);
		$yes_no = 0;
		
		if ($result->num_rows > 0)
		{
			while ($row =  $result->fetch_assoc())
			{
				if (($row["Name"] == $name_p) && ($row["Surname"] == $surname_p) && ($row["ContactNumber"] == $contact_p))
				{	
					
					$yes_no = 1;
				}

			}
		}
		if ($yes_no == 0)
		{ 
			$stmt = $conn->prepare("INSERT INTO Customer_table (ContactNumber, Title, Name, Surname, Address, Email, Gender) VALUES (?,?,?,?,?,?,?)");
  			$stmt->bind_param("issssss", $contact_p, $title_p, $name_p, $surname_p, $address_p, $email_p, $gender_p);
 			$stmt->execute();
		}
	}

}
class Cash_and_Credit_transaction extends Customer_biography
{
	private $date_to_collect;
	private $product_name_list;
	private $price_per_product;
	private $quantity_per_product;
	private $total_per_product;
	private $total_for_all_products;
	private $pay_date;
	
	function set_pay_date($p_date)
	{
		$this->pay_date = $p_date;
	}
	function set_total_for_all_products($total)
	{
		$this->total_for_all_products = $total;
	}
	function set_date_to_collect($colect_date)
	{
		$this->date_to_collect = $colect_date;
	}
	function set_product_name_list($product_list)
	{
		$this->product_name_list = $product_list;
	}
	function set_price_per_product($price_p_product)
	{
		$this->price_per_product = $price_p_product;
	}
	function set_quantity_per_product($quantity_p_product)
	{
		$this->quantity_per_product = $quantity_p_product;
	}
	function set_total_per_product($total_p_product)
	{
		$this->total_per_product = $total_p_product;
	}
	

	function get_date_to_collect()
	{
		return $this->date_to_collect;
	}
	function get_product_name_list()
	{
		return $this->product_name_list;
	}
	function get_price_per_product()
	{
		return $this->price_per_product;
	}
	function get_quantity_per_product()
	{
		return $this->quantity_per_product;
	}
	function get_total_per_product()
	{
		return $this->total_per_product;
	}
	
	function get_today_dateTime()
	{
		return $this->today_dateTime;
	}
	function get_total_for_all_products()
	{
		return $this->total_for_all_products;
	}
	function get_pay_date()
	{
		return $this->pay_date;
	}
}

?>