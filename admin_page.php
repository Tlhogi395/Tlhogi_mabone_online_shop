<?php include 'head.php'; ?> 

<title>Admin page</title>
<link rel='stylesheet' href='styleMP.css' />
</head>
<body>

<header>
	<h1>Tlhogi Lights</h1>
	<h2>Welcome back <?php echo $_SESSION['user']; ?></h2>
</header>

<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: rgba(255, 2,2, 0);
}

li {
  float: left;
}

li a {
  display: inline;
  color: black;
  text-align: center;
  padding: 14px 16px ;
  text-decoration: none;
}

/* Change the link color to #111 (black) on hover */
li a:hover {
  background-color: #444;
}
.active {
  background-color: #4CAF50;
}

</style>
<ul>
  <li><a class="active" href="display missing people's details.php">Home</a></li>
  <li><a href="login_page.php">Login</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#About us">About us</a></li>
</ul>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "tlhogi_lights_online_shop"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
	
	
		
?>

<content>
<form action = "give_credit.php" enctype="multipart/form-data" method ="post"><br>
<?php
		if ($_SESSION["role"] == "Manager")
		{ 
?>
		<p>Add new admin <a href="register.php">Sign up</a> </p>
		<p>Disaply all customers <a href="customer_details.php"> All customers</a></p>
		<p> Filter customers<a href="customers_paid_on_this_date.php"> Filter<a/></p>
		<p> Clear Tlhogi Lights database<a href="clear_tlhogi_lights_database.php"> Clear<a/></p>
		<p> Remove product<a href="remove_product_.php"> Remove product<a/></p>
		<p> Add product(s)<a href= "add_products_on_home_page.php" > Add product(s) <a/></p>
		<p> Search customer<a href="Add_name.php?link=Search">Search<a/></p>
<?php		}
	
?>		<p> Place an order <a href="find_customer.php?link=Order"> Place an order<a/></p>
		<p> Pay debt<a href="find_customer.php?link=Pay"> Pay<a/></p>
		<p> Give product on credit<a href="find_customer.php?link=Credit"> Credit<a/></p>
		<p> Record door-door cash transaction <a href="Add_name.php?link=Door_to_door"> Record door-door cash transaction<a/></p>	

	
<?php
	unset($_SESSION["surname_s"]);
	unset($_SESSION["name_s"]); 
?>
		

</form>
</content>
</body>
</html>