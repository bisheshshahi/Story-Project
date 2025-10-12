<?php
	session_start();
	require "db_connect.php";
	
	if(!isset($_COOKIE['uname'])){
		echo "Please log in first";
		exit();
	}
	
	$uname = $_COOKIE['uname'];
	
	$checkstory = "select * from stories where username = '$uname'";
	$result = mysqli_query($con, $checkstory);
?>

<h2>My Stories</h2>

<?php
	if (mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){
        echo "<div style='border:1px solid #ccc; padding:10px; margin:10px 0;'>";
        echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
        echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
        echo "</div>";
    }
} else {
    echo "You haven't written any stories yet.";
}
?>