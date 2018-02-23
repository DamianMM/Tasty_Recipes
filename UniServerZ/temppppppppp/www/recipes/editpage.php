<!DOCTYPE HTML>


<?php 

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'logon');
define('DB_USER', 'root');
define('DB_PASSWORD', 'n41m4d');

$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
$db=mysqli_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysqli_error());


session_start();
?>

<html>
<head>

<?php

$_SESSION['editCommentID']=$_GET['commentID'];

?> 

<form action="../php/editcomment.php" method="POST">
<textarea id="text" rows="4" cols="50" name="newcomments"> Edit comment... </textarea>
<input type="submit" value="Click to edit" />



<div>
 
</body>
</html>