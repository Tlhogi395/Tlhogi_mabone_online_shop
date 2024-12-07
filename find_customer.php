<?php include 'head.php'; ?>

	<title>Find customer</title>
	<link rel='stylesheet' href='styleMP.css' />
	</head>
	
	<body>
	<header>
		<h1>Tlhogi Lights</h1>
	</header>


<content>
 	<div class='uploadpanel'>

	<?php include 'attribute_class.php';
	 //include 'Tlhogi_lights_database_class.php';
	
	$name->set_name("name");
	$type->set_type("text");
	$file_names = "add_surname.php";
	
	 //$_SESSION["current_file_name"] = "find_customer.php";
	if (isset($_GET['link']))
	{
		$_SESSION['link'] = $_GET['link'];
		if ($_SESSION['link'] == "Credit")
		{
			$_SESSION["transaction"] = "credit";
		}
		else if ($_SESSION['link'] == "Order")
		{
			$_SESSION["transaction"] = "order";
		}
	} 
	echo $file_names;
	$file_name->set_file_name($file_names);
	$button_caption->set_button_caption("Continue");
	?>

<?php include "html_form_code.php"; ?>
	</div>
	</content>
</form>
</body>
</html>