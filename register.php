<?php  include('config.php'); ?>

<?php include('includes/head_section.php'); ?>

<title>Tlhogi lights | Sign up </title>
</head>
<body>
<div class="container">
	<!-- Navbar -->
		<?php include( ROOT_PATH . '/includes/navbar.php'); ?>
	<!-- // Navbar -->

	<?php $fileName = htmlspecialchars($_SERVER["PHP_SELF"]); ?>
	<!-- Source code for handling registration and login -->
	<?php  include('includes/register_login.php'); ?>

	<div style="width: 40%; margin: 20px auto;">
		<form method="post" action="<?php echo $fileName; ?>">
			<h2>Register on Tlhogi lights</h2>
			<?php include(ROOT_PATH . '/includes/errors.php') ?>
			<input type = "text" name = "your_name" placeholder = "Enter your name">
			 <input type = "text" name = "surname" placeholder = "Enter your surname">
			<input  type="text" name="username" value="<?php echo $username; ?>"  placeholder="Username">
			<input type="email" name="email" value="<?php echo $email ?>" placeholder="Email">
			<input type="password" name="password_1" placeholder="Password">
			<input type="password" name="password_2" placeholder="Password confirmation">
			<button type="submit" class="btn" name="reg_user">Register</button>
			<p>
				Already a member? <a href="login.php">Sign in</a>
			</p>
		</form>
	</div>
</div>
<!-- // container -->
<!-- Footer -->
	<?php include( ROOT_PATH . '/includes/footer.php'); ?>
<!-- // Footer -->
