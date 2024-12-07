<?php include 'head.php'; 
//include 'Tlhogi_lights_database_class.php';
?>

	<title>Add address</title>

<link rel='stylesheet' href='styleMP.css' />
	</head>

	<body>
	<header>
		<h1>Tlhogi Lights</h1>
	
		<h2>Enter your phone number:</h2>

	</header>

	<content>
 	<div class='uploadpanel'>

	<?php include 'attribute_class.php';
	$report_err = "Phone number is required";
	$fileN = "Add_email.php";
	if (isset($_SESSION['link']))
	{
		$fileN = "Add_address.php";
	}
				

	$name->set_name("telnumber");
	$type->set_type("number");
	$file_name->set_file_name($fileN);
	$button_caption->set_button_caption("Next");
		
	?>

<?php include "html_form_code.php"; ?>

	</div>
	</content>
	</form>
<?php include 'footer.php'; ?>
</html>