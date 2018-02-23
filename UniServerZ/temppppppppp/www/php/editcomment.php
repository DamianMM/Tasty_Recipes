<?php
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'logon');
define('DB_USER', 'root');
define('DB_PASSWORD', 'n41m4d');


session_start(); 

$commentpage=$_SESSION['commentpage'];


$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to mysql: " . mysqli_error());
$db=mysqli_select_db(DB_NAME,$con) or die("Failed to connect to mysql: " . mysqli_error());

$editCommentID=$_SESSION['editCommentID'];
$newComments=$_POST['newcomments'];
$backAgain=$_SESSION['uri'];



mysqli_query("UPDATE `logon`.`$commentpage` SET `theComment` = '$newComments' WHERE `comment`.`commentID` = '$editCommentID' ");
header ("Location: $backAgain " );


?>