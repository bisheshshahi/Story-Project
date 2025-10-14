<?php

session_start();

		require "db_connect.php";
	if (isset($_POST["submit"])) {
		$uname = $_POST["uname"];
		$pwd   = $_POST["pwd"];
		
		$select = "select * from author where username = '$uname' and password = '$pwd'";
		$result = mysqli_query($con, $select) or die("Retrieval Error");

		$n = mysqli_num_rows($result);
		if ($n > 0){
			echo "Welcome user, $uname";
			setcookie('uname', $uname, time()+86400);
			setcookie('pwd', $pwd, time()+86400);
		
?>
<br>
			<a href='my_stories.php'>My stories</a>
	
<?php
		}
		else{
			echo "Please register this account or check your username and password and try again";
			echo "</br>";
			echo "<a href='login.html'>Login again</a>";
		}
	}
?>
