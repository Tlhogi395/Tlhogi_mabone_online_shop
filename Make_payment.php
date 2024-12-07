<?php include 'head.php'; ?>
	<title>Make payment</title>
	</head>
	
	<body>
	<header>
		<h1>Tlhogi Lights</h1>
	</header>
<link rel='stylesheet' href='styleMP.css' />


<content>
 	<div class='uploadpanel'>
<?php
 	//include 'Tlhogi_lights_database_class.php';
 	//$debt = new Tlhogi_database();
	//echo $debt->get_balance($_SESSION["phone_number"]);
?>
<?php include 'attribute_class.php';
	// $_SESSION["contact_number_s"] = $_POST["telnumber"];
	$current_file_name = "Make_payment.php";
	$name->set_name("pay");
	$type->set_type("number");
	$file_name->set_file_name("payment_made_message.php");
	$button_caption->set_button_caption("Pay");
	?>

<?php include "html_form_code.php"; 
	/* unset($_SESSION["file_name"]);
	unset($_SESSION["name_s"]);
	unset($_SESSION["pay"]); */
?>
	</div>
	</content>
</form>

</body>
</html>