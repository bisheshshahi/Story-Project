<?php
	session_start();
	require "db_connect.php";
	if (isset($_COOKIE['uname'])){
		echo "You've logged in ";
		
		$select = "select * from author where username = '{$_COOKIE['uname']}' and password = '{$_COOKIE['pwd']}'";
		$result = mysqli_query($con, $select) or die("Retrieval error");
		
		$arr = mysqli_fetch_array($result);
		
		echo " ".$arr['username']." "."Welcome to our page";
	}
	
	else{
		echo "Please login first to access this page";
	}
?>