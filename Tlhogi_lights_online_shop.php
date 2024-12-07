<?php include 'head.php'; ?>
	<title>Home</title>


	</head>

	<body>
	<header>
		<h1>Tlhogi Lights</h1>
	</header>
	

<?php 	
	unset($_SESSION['link']);
	unset($_SESSION["pay"]);
	//unset($_SESSION["pay_date"]);
	unset($_SESSION["gender_s"]);
	unset($_SESSION['email_s']);
	unset($_SESSION["title_s"]);
	unset($_SESSION["address_s"]);
	unset($_SESSION["surname_s"]);
	unset($_SESSION["name_s"]);
	unset($_SESSION["phone_number"]);
	unset($_SESSION["file_name"]);
	unset($_SESSION["existing_customer"]);
include 'horizontal_menu.php'; 
$_SESSION["transaction"] = "cash";

?>
<?php include 'displays_products.php'; ?>
</body>
</html>
