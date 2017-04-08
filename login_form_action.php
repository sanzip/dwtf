<?php
	session_start();
	require_once 'db_connection.php';

if(isset($_POST['btn_login']) && ($_SERVER['REQUEST_METHOD']== "POST"))
	{
		$username=$_POST['email'];
		$password= $_POST['password'];
	if (!empty($username)&&!empty($password)) {
	$sql= "SELECT * FROM login WHERE email='$username' AND password='$password'";
	$result= pg_query($conn, $sql);
	$row = pg_fetch_array($result);
	if ($row>0) {
		//echo"success";

		$_SESSION['login_user']=$row['username']; // Initializing Session// Redirecting To Other Page
		header("location:homepage.php");
	exit();
	} 
	else
	 {
	 
	 	header("location:index.php");
		//echo "Username or Password is invalid";
		exit();
	}
	pg_close($conn); 

	
		//echo "Username or Password is invalid";
	}
	}


?>