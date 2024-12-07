<?php  include('config.php'); ?>
<?php include 'head.php'; ?> 
<?php include 'tlhogi_lights_online_shop_database_connection.php'; ?>
	<title>Tlhogi lights | Sign in </title>
</head>
<body>
<div class="container">
	<!-- Navbar -->
	<?php include( ROOT_PATH . '/includes/navbar.php'); ?>
	<!-- // Navbar -->
<?php
	$username = "";
	$password = "";
	$fileName = htmlspecialchars($_SERVER["PHP_SELF"]);
  	include('includes/register_login.php'); 

	

?>
	<div style="width: 40%; margin: 20px auto;">
		<form method="post" action="<?php echo $fileName; ?>" >
			<h2>Login</h2>
			<?php include(ROOT_PATH . '/includes/errors.php') ?>
			<input type="text" name="username" value="<?php echo $username; ?>" value="" placeholder="Username" autocomplete="off">
			<input type="password" name="password" placeholder="Password">
			<button type="submit" class="btn" name="login_btn">Login</button>
			
		</form>
	</div>
</div>
<!-- // container -->

<!-- Footer -->
	<?php include( ROOT_PATH . '/includes/footer.php'); ?>
<!-- // Footer -->