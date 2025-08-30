  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Story Output</title>
  </head>
  <body>
    
  <?php
  
  /*getting user details*/
  if(isset($_POST['submit'])){
  $author=$_POST['author'];
  $title=$_POST['title'];
  $art=$_POST['para'];
  $str = "";
  
	// checking if the file is there or not
  if(isset($_FILES['wordFile'])&&$_FILES['wordFile']['error']==0){
    $storyFile=$_FILES['wordFile']['name'];
    move_uploaded_file($_FILES['wordFile']['tmp_name'],$storyFile);
	$str=file_get_contents($storyFile);  
  }
  
  // displaying the content
  echo "<h1>$title</h1>";
  echo "<div id='author'>-<em>$author</em></div><br/>";
  echo $art;	
  echo $str;

  }

  ?>

  </body>
  </html>
