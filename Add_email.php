<?php include 'head.php'; 
//include 'Tlhogi_lights_database_class.php';
?>

	<title>Add address</title>

<link rel='stylesheet' href='styleMP.css' />
	</head>

	<body>
	<header>
		<h1>Tlhogi Lights</h1>
	
		<h2>Enter your email address:</h2>

	</header>

	<content>
 	<div class='uploadpanel'>

	<?php 	include 'attribute_class.php';
	 	$report_err = "";
		echo $_SESSION["phone_number"]."***";
	$fileName = "Add_title.php";
	/* if (isset($_SESSION['link']))
	{
		$fileName = "Add_telnumber.php";
	} */
		
	$name->set_name("email");
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