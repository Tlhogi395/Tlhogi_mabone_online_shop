<?php include 'head.php'; 
//include 'Tlhogi_lights_database_class.php';
?>

	<title>Add address</title>

<link rel='stylesheet' href='styleMP.css' />
	</head>

	<body>
	<header>
		<h1>Tlhogi Lights</h1>
	
		<h2>Enter your title:</h2>

	</header>

	<content>
 	<div class='uploadpanel'>

	<?php 	include 'attribute_class.php';
	 	$report_err = "Title is required";
	$name->set_name("title");
	$type->set_type("text");
	$file_name->set_file_name("Add_gender.php");
	$button_caption->set_button_caption("Next");
	?>

<?php include "html_form_code.php"; ?>
	</div>
	</content>
	</form>
<?php include 'footer.php'; ?>
</html>