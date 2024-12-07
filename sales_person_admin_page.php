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
		<p> Place an order <a href="place_order.php"> Place an order<a/></p>
		<p> Pay debt<a href="find_customer.php"> Pay<a/></p>
		<div><button type = "submit" name = "credit_btn">Credit</button></div>

</form>
</content>
</body>
</html>