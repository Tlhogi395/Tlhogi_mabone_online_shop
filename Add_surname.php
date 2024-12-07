<?php include 'head.php'; 
//include 'Tlhogi_lights_database_class.php';
?>

	<title>Add surname</title>

<link rel='stylesheet' href='styleMP.css' />
	</head>

	<body>
	<header>
		<h1>Tlhogi Lights</h1>
	
		<h2>Enter your surname:</h2>

	</header>

	<content>
 	<div class='uploadpanel'>

	<?php 	include 'attribute_class.php';
		$fileN = "Add_address.php";
		if (isset($_SESSION['link']))
		{
			$fileN = "Add_telnumber.php";
		}
		
	 	$report_err = "Surname is required";
	$name->set_name("surname");
	$type->set_type("text");
	$file_name->set_file_name($fileN);
	$button_caption->set_button_caption("Next");
	//echo $_SESSION["name_s"];
	?>

<?php include "html_form_code.php"; ?>

	</div>
	</content>
	</form>
<?php include 'footer.php'; ?>
</html>

