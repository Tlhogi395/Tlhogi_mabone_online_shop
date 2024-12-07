<?php include 'head.php'; ?>

	<title>Credit</title>


	</head>

	<body>
	<header>
		<h1>Tlhogi Lights</h1>
	</header>
	<link rel='stylesheet' href='styleMP.css' />
<?php 	
	
	include 'tlhogi_lights_online_shop_database_connection.php';
	$_SESSION["transaction"] = "credit";
?>
	<form action="displays_products.php" enctype="multipart/form-data" method="post">
		<div>
		<label for="order">Do you want product on credit</label>
		<br><br>
		<button>Credit</button>
		</div>
</body>
</html>
