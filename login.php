<?php

		require "db_connect.php";
	if (isset($_POST["submit"])) {
		$uname = $_POST["uname"];
		$pwd   = $_POST["pwd"];
		
		$select = "SELECT * FROM user WHERE username = '$uname' AND password = '$pwd'";
		$result = mysqli_query($con, $select) or die("Retrieval Error");

		$n = mysqli_num_rows($result);
		if ($n > 0)
			echo "Welcome user";
		else{
			echo "Please register this account or check your username and password and try again";
			echo "</br>";
			echo "<a href='login.html'>Login again</a>";
		}
	}
?>
