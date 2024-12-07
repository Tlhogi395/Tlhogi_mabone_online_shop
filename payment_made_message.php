<?php include 'head.php'; ?>
	<title>Payment made message</title>
	</head>
	
	<body>
	<header>
		<h1>Tlhogi Lights</h1>
	</header>
<link rel='stylesheet' href='styleMP.css' />

<?php	include "Tlhogi_lights_database_class.php"; 
	$payment = new Tlhogi_database();
	echo "Im here";
	$payment->make_payment($_SESSION["pay"]);
?>
	<content>
	<div class = "uploadpanel">
	<form action = "admin_page.php" enctype="multipart/form-data"  method ="post">
	<button> OK </button>
	</div>
	</content>
	</form>

