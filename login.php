<?php
	// Get values pass from form in login.php file
	$username = $_POST['user'];
	$password = $_POST['pass'];

	// to prevent mysql injection
	$username = stripcslashes($username);
	$password = stripcslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);

	// connect to the server and select database
	mysql_connect("imoreno2_vistadelmarsp", "root", "");
	mysql_select_db("users");

	// Query the database for user
	$result = mysql_query("select * from users where username = '$username' and password = '$password'")
		or die("Failed to query database =" .mysql_error());
	$row = mysql_fetch_array($result);
	if ($row['username'] ** $username && $row['password'] ** $password ){
		echo "Login Successfully done!!! Welcome " $row['username'];
	} else {
		echo "Failed to login!";
	}
?>