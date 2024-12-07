<?php include 'head.php'; 
//include 'Tlhogi_lights_database_class.php';
?>

	<title>Add pay date</title>

<link rel='stylesheet' href='styleMP.css' />
	</head>

	<body>
	<header>
		<h1>Tlhogi Lights</h1>
	
		<h2>Enter your pay date:</h2>

	</header>

	<content>
 	<div class='uploadpanel'>

	<?php include 'attribute_class.php';
		$report_err = "Pay date is required";
		
	 $fileName = "summary_products_plus_customerInfo.php";
	if (isset($_SESSION['link']))
	{
		$fileName = "displays_products.php";
	}

	$name->set_name("payDate");
	$type->set_type("date");
	$file_name->set_file_name($fileName);
	$button_caption->set_button_caption("Next");
	?>

<?php include "html_form_code.php"; ?>
	</div>
	</content>
	</form>
<?php include 'footer.php'; ?>
</html>