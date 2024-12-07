<?php  
	include 'Tlhogi_lights_database_class.php';
	$attributeName = $name->get_name();
	$type = $type->get_type();
	$button_caption = $button_caption->get_button_caption();
	$fileName = htmlspecialchars($_SERVER["PHP_SELF"]);
	$report_err = ""; 
	$debt = new Tlhogi_database();
	//unset($_SESSION["outstanding_amaount"]);
	echo "<br>"; echo $attributeName."****";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  	if (isset ($_POST[$attributeName]))
	{
		if ($_POST[$attributeName] != "") 
		{	echo "<br>"; echo $attributeName."****"; 
    			$report_err = $_POST[$attributeName];
			$_SESSION["file_name"] = $file_name->get_file_name();
			$fileName = $_SESSION["file_name"];
			echo $attributeName." == telnumber"; echo "<br>";
			if ($attributeName == "telnumber")
			{	
				$_SESSION["phone_number"] = $report_err;
				if (preg_match('/^[0-9]{10}+$/', $report_err))			//Phone number be 10 numbers of length
				{	
						if (isset($_SESSION['link'])) 
						{
							if ($_SESSION["link"] == "credit")
							{
								if (isset($_SESSION["name_s"]) && isset($_SESSION["surname_s"]) && isset($_SESSION["phone_number"]))
								{	
									//$report_err = $debt->find_customer($_SESSION["name_s"], $_SESSION["surname_s"], $_SESSION["phone_number"]);
									if ($debt->find_customer($_SESSION["name_s"], $_SESSION["surname_s"], $_SESSION["phone_number"]) == "1")	//return true if the customer (name, surname and phone number) exist in the customer_table
									{	
										if ($debt->get_balance($report_err) > 0)	//if the balance is greater than 0, then no more credit can be given
										{
											$fileName = "Make_payment.php";
											$report_err = "You need to settle the outstanding amount of R".$debt->get_balance($report_err);
							
										}
										else
										{
											$fileName = "Add_address.php";
											$_SESSION["existing_customer"] = "no outstanding amount";
											//$report_err = "Phone number already exists";
											if (isset($_SESSION['link']) && $_SESSION['link'] == "Search")
											{
												$fileName = "no_outstanding.php"; 
											}
										}
									}
									else if ($debt->find_customer($_SESSION["name_s"], $_SESSION["surname_s"], $_SESSION["phone_number"]) == "0")
									{
										//$report_err = $debt->get_balance($report_err);
										$_SESSION["existing_customer"] = "phone number does not exist";
										$fileName = "Add_address.php";	
									}
									else
									{			//echo $_SESSION["name_s"]; echo "<br>"; echo $_SESSION["surname_s"]; 
										$fileName = htmlspecialchars($_SERVER["PHP_SELF"]);
										$report_err = "Phone number already exist, please enter another one";
									}
								}
							}
						
						}
		
				}
				else
				{
					$report_err = "please enter valid phone number";
					$fileName = htmlspecialchars($_SERVER["PHP_SELF"]);
					//header('Location:  '. $fileName);	
				}
			}
			else if ($attributeName == "name")
			{
				$_SESSION["name_s"] = $strip->sanitize($_POST['name']);
				echo "<br>"; echo $_SESSION["name_s"];
				
			}
			else if ($attributeName == "surname")
			{
				$_SESSION["surname_s"] = $strip->sanitize($_POST['surname']);
				echo "<br>"; echo $_SESSION["surname_s"];	
			}
			else if ($attributeName == "payDate")
			{
				$_SESSION["pay_date"] = $strip->sanitize($_POST["payDate"]);
				echo "<br>"; echo $_SESSION["pay_date"];
			}
			else if ($attributeName == "address")
			{
				$_SESSION["address_s"] = $strip->sanitize($_REQUEST['address']);
			}		
			else if ($attributeName == "title")
			{
				$_SESSION["title_s"] = $strip->sanitize($_REQUEST['title']);
			}
			else if ($attributeName == "email")
			{
				$_SESSION['email_s'] = $strip->sanitize($_REQUEST['email']);
			} 
			else if ($attributeName == "gender")
			{
				$_SESSION["gender_s"] = $strip->sanitize($_REQUEST['gender']);
			}
		 
			else if ($attributeName == "pay")
			{
				$_SESSION["pay"] = $_POST["pay"];
			} 
			if ($fileName != htmlspecialchars($_SERVER["PHP_SELF"]))
			{
				header('Location:  '. $fileName);
			}
		}
	}				
}

	
	
		echo $fileName;  echo "<br>"; echo $attributeName; 
		/* if (isset($_SESSION["current_file_name"]))
		{
			$report_err = "You need to settle the outstanding amount";
		} */
		?>
		<form action="<?php echo $fileName;  ?>" enctype="multipart/form-data" method="post">
		<div>
	<?php	if ($attributeName == "gender")
		{ ?>
			<p> Please select your gender </p>
			<input type ="radio" id = "male" name = "gender" value = "Male">
			<label for = "male">Male</label>
			<br>
			<input type = "radio" id = "female" name = "gender" value = "Female">
			<label for = "male">Female</label>
			<br>
	<?php	} 
		else if ($attributeName == "title")
		{ ?>
			<p> Please select your title </p>
			<input type ="radio" id = "mr" name = "title" value = "Mr">
			<label for = "mr">Mr</label>
			<br>
			<input type = "radio" id = "miss" name = "title" value = "Miss">
			<label for = "miss">Miss</label>
			<br>
			<input type ="radio" id = "mrs" name = "title" value = "Mrs">
			<label for = "mrs">Mrs</label>
			<br>
			<input type = "radio" id = "prof" name = "title" value = "Prof">
			<label for = "prof">Prof</label>
			<br>
			<input type ="radio" id = "dr" name = "title" value = "Dr">
			<label for = "Dr">Dr</label>
			<br>
			<input type = "radio" id = "other" name = "title" value = "other">
			<label for = "other">Other</label>
			<br>
<?php		}
		
		else
		{ ?>			
			<label for="<?php echo $attributeName;  ?>"><?php echo $attributeName;  ?>:</label>
			<input type="<?php echo $type;  ?>" name="<?php echo $attributeName;  ?>" id = '<?php echo $attributeName;  ?>' autocomplete="off">
			<span class="error"> <?php echo $report_err; ?></span>
			<br><br>
			
	 <?php } ?>
		<button><?php echo $button_caption;  ?></button>
		
			</div>