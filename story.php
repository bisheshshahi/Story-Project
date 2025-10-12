<?php
	session_start();
	require "db_connect.php";
	
	if(!isset($_COOKIE['uname'])){
		echo "Please login first";
		exit();
	}
	$uname = $_COOKIE['uname'];

	if(isset($_POST['submit'])) {
		
		$title = htmlspecialchars($_POST['title']);
		$content = htmlspecialchars($_POST['para']);

		if(empty($title) || empty($content)){
			echo "Please fill in both Title and Story content!";
		} else {
			
			$insert = "INSERT INTO stories (username, title, content) VALUES ('$uname', '$title', '$content')";
			mysqli_query($con, $insert) or die("Error saving story");
			echo "Your story has been saved successfully!";
		}
	}

?>