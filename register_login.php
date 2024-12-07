<?php 
	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 

	// REGISTER USER
	if (isset($_POST['reg_user'])) 
	{
		// receive all input values from the form
		$name = esc($_POST['your_name']);
		$surname = esc($_POST['surname']);
		$username = esc($_POST['username']);
		$email = esc($_POST['email']);
		$password_1 = esc($_POST['password_1']);
		$password_2 = esc($_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($name)) {  array_push($errors, "Uhmm...We gonna need your name"); }
		if (empty($surname)) {  array_push($errors, "Uhmm...We gonna need your surname"); }
		if (empty($username)) {  array_push($errors, "Uhmm...We gonna need your username"); }
		if (empty($email)) { array_push($errors, "Oops.. Email is missing"); }
		if (empty($password_1)) { array_push($errors, "uh-oh you forgot the password"); }
		if ($password_1 != $password_2) { array_push($errors, "The two passwords do not match");}

		// Ensure that no user is registered twice. 
		// the email and usernames should be unique
		$user_check_query = "SELECT * FROM admin_user_login WHERE username='$username' 
								OR email='$email' LIMIT 1";

		$result = mysqli_query($conn, $user_check_query);
		$user = mysqli_fetch_assoc($result);

		if ($user) 
		{ // if user exists
			if ($user['username'] === $username) 
			{
			  array_push($errors, "Username already exists");
			}
			if ($user['email'] === $email) 
			{
			  array_push($errors, "Email already exists");
			}
		}
		// register user if there are no errors in the form
		if (count($errors) == 0) 
		{
			$role = "Sales_person";
			$filename = "sales_person_admin_page.php";
			if ($username == "Hloks_1104")
			{
				$role = "Manager";
				$file_name = "admin_page.php";
			}
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO admin_user_login (Username, Email, Password, Created_at, Updated_at, Role, Name, Surname) 
					  VALUES('$username', '$email', '$password', now(), now(), '$role', '$name', '$surname')";
			mysqli_query($conn, $query);
				$_SESSION['user'] = $username;
				$_SESSION['message'] = "You are now logged in";
				// redirect to admin area
				header('location: ' . $filename);
				exit(0);
		}
	}

	// LOG USER IN
	if (isset($_POST['login_btn'])) 
	{
		$username = esc($_POST['username']);
		$password = esc($_POST['password']);

		if (empty($username)) { array_push($errors, "Username required"); }
		if (empty($password)) { array_push($errors, "Password required"); }
		if (empty($errors)) 
		{
			$password = md5($password); // encrypt password
			$sql = "SELECT * FROM admin_user_login WHERE username='$username' and password='$password' LIMIT 1";

			$result = $conn->query($sql);
			while ($row = $result->fetch_assoc())
			{
				
				// if user is admin, redirect to admin area
				if ( $row['Role'] == 'Sales_person') 
				{
					$_SESSION['message'] = "You are now logged in";
					$_SESSION["role"] = "Sales_person";
					$_SESSION['user'] = $username;
					// redirect to admin area
					header('location: ' . BASE_URL . '/admin_page.php');
					exit(0);
				}
				else
				{
					$_SESSION['message'] = "You are now logged in";
					$_SESSION["role"] = "Manager";
					$_SESSION['user'] = $username;
					// redirect to admin area
					header('location: ' . BASE_URL . '/admin_page.php');
					exit(0);
				}
			} 
		}
		else 
		{
			array_push($errors, 'Wrong credentials');
		}
	}
	// escape value from form
	function esc(String $value)
	{	
		// bring the global db connect object into function
		global $conn;

		$val = trim($value); // remove empty space surrounding string
		$val = mysqli_real_escape_string($conn, $value);

		return $val;
	}
	
?>
