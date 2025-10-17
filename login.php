<?php
session_start();
require "db_connect.php";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login Result</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #74b9ff, #a29bfe);
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      background-color: #fff;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
      width: 400px;
      text-align: center;
    }

    h2 {
      color: #333;
      margin-bottom: 20px;
    }

    p {
      color: #444;
      font-size: 16px;
      margin-bottom: 25px;
    }

    a {
      display: inline-block;
      text-decoration: none;
      background-color: #0984e3;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      transition: 0.3s;
    }

    a:hover {
      background-color: #74b9ff;
    }
  </style>
</head>

<body>
  <div class="container">
    <?php
    if (isset($_POST["submit"])) {
        $uname = $_POST["uname"];
        $pwd   = $_POST["pwd"];

        $select = "SELECT * FROM author WHERE username = '$uname' AND password = '$pwd'";
        $result = mysqli_query($con, $select) or die("Retrieval Error");

        $n = mysqli_num_rows($result);
        if ($n > 0) {
            echo "<h2>Welcome, " . htmlspecialchars($uname) . "!</h2>";
            setcookie('uname', $uname, time()+86400);
            setcookie('pwd', $pwd, time()+86400);
            echo "<a href='my_stories.php'>My Stories</a>";
        } else {
            echo "<p>Please register this account or check your username and password and try again.</p>";
            echo "<a href='login.html'>Login Again</a>";
        }
    }
    ?>
  </div>
</body>
</html>
