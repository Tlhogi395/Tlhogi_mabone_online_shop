<?php include 'head.php'; 
//include 'Tlhogi_lights_database_class.php';
?>

	<title>Add address</title>

<link rel='stylesheet' href='styleMP.css' />
	</head>

	<body>
	<header>
		<h1>Tlhogi Lights</h1>
	
		<h2>Enter your address:</h2>

	</header>

	<content>
 	<div class='uploadpanel'>

	<?php 	include 'attribute_class.php';
	
	$fileName = "";
	if (isset($_SESSION['link']))
	{
		$fileName = "add_email.php";
	}
	else
	{
		if (isset($_SESSION["phone_number"]))
		{
			$fileName = "add_email.php";
		}
		else
		{
			$fileName = "Add_telnumber.php";
		}
	}
	 $report_err = "Address is required";
	$name->set_name("address");
	$type->set_type("text");
	$file_name->set_file_name($fileName);
	$button_caption->set_button_caption("Next");
	?>

<?php include "html_form_code.php"; ?>

	</div>
	</content>
	</form>
<?php include 'footer.php'; ?>
</html>