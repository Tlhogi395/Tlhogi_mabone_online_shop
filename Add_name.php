<?php include 'head.php'; 
//include 'Tlhogi_lights_database_class.php';
?>

	<title>Add name</title>

<link rel='stylesheet' href='styleMP.css' />
	</head>

	<body>
	<header>
		<h1>Tlhogi Lights</h1>
	
		<h2>Enter your name:</h2>

	</header>

	<content>
 	<div class='uploadpanel'>

	<?php include 'attribute_class.php';
	
	 $report_err = "Name is required";
	$name->set_name('name');
	$type->set_type("text");
	
	$file_names = "Add_surname.php";
	
	 //$_SESSION["current_file_name"] = "find_customer.php";
	if (isset($_GET['link']))
	{
		$_SESSION['link'] = $_GET['link'];
		if ($_SESSION['link'] == "credit")		
		{
			$_SESSION["transaction"] = "credit";
		}
		else if ($_SESSION['link'] == "Door_to_door")
		{
			$_SESSION["transaction"] = "door_to_door";
		}
	}
	echo $_SESSION["transaction"] ; echo "<br>";
	echo $file_names;
	$file_name->set_file_name($file_names);
	$button_caption->set_button_caption("Next");
	?>

<?php include "html_form_code.php"; ?>

	</div>
	</content>
	</form>
<?php include 'footer.php'; ?>
</html>
