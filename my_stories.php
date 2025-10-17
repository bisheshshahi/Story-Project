<?php
session_start();
require "db_connect.php";

if (!isset($_COOKIE['uname'])) {
  echo "Please log in first";
  exit();
}

$uname = $_COOKIE['uname'];
$checkstory = "SELECT * FROM stories WHERE username = '$uname'";
$result = mysqli_query($con, $checkstory);
?>

<!DOCTYPE html>
<html>
<head>
  <title>My Stories</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #74b9ff, #a29bfe);
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      min-height: 100vh;
    }

    .container {
      background-color: #fff;
      width: 80%;
      max-width: 800px;
      margin-top: 50px;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 30px;
    }

    .story {
      border: 1px solid #ccc;
      padding: 15px 20px;
      margin-bottom: 20px;
      border-radius: 8px;
      background-color: #fafafa;
    }

    .story h3 {
      margin: 0 0 10px 0;
      color: #2d3436;
    }

    .story p {
      color: #555;
      line-height: 1.5;
    }

    .no-story {
      text-align: center;
      font-size: 18px;
      color: #555;
      background-color: #f8f8f8;
      padding: 20px;
      border-radius: 8px;
    }

    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .left {
      font-weight: bold;
      color: #333;
    }

    .right {
      display: flex;
      gap: 10px;
    }

    a.button {
      display: inline-block;
      text-decoration: none;
      background-color: #0984e3;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      transition: 0.3s;
      font-weight: bold;
    }

    a.button:hover {
      background-color: #74b9ff;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="topbar">
      <span class="left">👋 <?php echo htmlspecialchars($uname); ?></span>
      <div class="right">
        <a href="story.html" class="button">➕ Add Story</a>
        <a href="logout.php" class="button">Logout</a>
      </div>
    </div>

    <h2>My Stories</h2>

    <?php
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='story'>";
        echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
        echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
        echo "</div>";
      }
    } else {
      echo "<div class='no-story'>You haven't written any stories yet.</div>";
    }
    ?>
  </div>
</body>
</html>
