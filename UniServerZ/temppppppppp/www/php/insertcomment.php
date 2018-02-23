<?php
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'logon');
define('DB_USER', 'root');
define('DB_PASSWORD', 'n41m4d');

$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to mysql: " . mysqli_error());
$db=mysqli_select_db(DB_NAME,$con) or die("Failed to connect to mysqli: " . mysqli_error());

session_start();

$commentpage = $_SESSION['commentpage'];
$comment=$_POST['comments'];
$userID=$_SESSION['UserNameID'];
$userAlias=$_SESSION['userAlias'];

if($userID > 0)
    {
        mysqli_query("INSERT INTO $commentpage(userID,userAlias,theComment) VALUES('$userID','$userAlias','$comment')");
        header('Location: ' . $_SERVER['HTTP_REFERER']);  
    }
else
    {
    echo 'Something went wrong' ;
    }

?>





