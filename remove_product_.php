<?php include 'head.php'; ?>

	<title>Remove product(s)</title>


	</head>

	<body>
	<header>
		<h1>Tlhogi Lights</h1>
		<h2>Remove product(s)</>
	</header>
	<link rel='stylesheet' href='styleMP.css' />
<?php 	
	
	include 'tlhogi_lights_online_shop_database_connection.php';
	$_SESSION["transaction"] = "remove_product";
?>
<?php include 'displays_products.php'; ?>
</body>
</html>
