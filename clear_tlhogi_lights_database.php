<?php include 'head.php'; ?>
	<title>Clear Tlhogi Lights database</title>
	</head>
	
	<body>
	<header>
		<h1>Tlhogi Lights</h1>
	</header>
<link rel='stylesheet' href='styleMP.css' />


<content>
 	<div class='uploadpanel'>
<?php
 	include 'Tlhogi_lights_database_class.php';
 	$debt = new Tlhogi_database();
?>
	<form action="admin_page.php" enctype="multipart/form-data" method="post">
	<div>
	<?php	$debt->delete_database(); ?>
	<button>clear</button>
	</div>
</div>
	</content>
</form>

</body>
</html>