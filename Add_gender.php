<?php include 'head.php'; 
//include 'Tlhogi_lights_database_class.php';
?>

	<title>Add title</title>

<link rel='stylesheet' href='styleMP.css' />
	</head>

	<body>
	<header>
		<h1>Tlhogi Lights</h1>
	
		<h2>Enter your gender:</h2>

	</header>

	<content>
 	<div class='uploadpanel'>

	<?php include 'attribute_class.php';
		$report_err = "Gender is required";
	 echo $_SESSION["transaction"];
	$name->set_name("gender");
	$type->set_type("radio");
	
	if ($_SESSION["transaction"] == "cash")
	{
		$file_name->set_file_name("summary_products_plus_customerInfo.php");
	}
	else
	{
		$file_name->set_file_name("pay_date.php");
	}
		
		$button_caption->set_button_caption("Next"); 
	?>

<?php include "html_form_code.php"; ?>

	</div>
	</content>
	</form>
<?php include 'footer.php'; ?>
</html>