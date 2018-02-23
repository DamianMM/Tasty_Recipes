<?php
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'logon');
define('DB_USER', 'root');
define('DB_PASSWORD', 'n41m4d');

$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
$db=mysqli_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysqli_error());

/*
$ID=$_POST['user'];
$Password=$_POST['pass'];
*/

function SignIn()
{
session_start();

if(!empty($_POST['user']))
{	  	
	$query=mysqli_query("SELECT * FROM UserName WHERE userName = '$_POST[user]' AND pass= '$_POST[pass]'");
	$row= mysqli_fetch_array($query);
        if(!empty($row['userName']) and !empty($row['pass']))
        {
            $_SESSION['userName'] = $row['userName'];
            $_SESSION['UserNameID'] = $row['UserNameID'];
	    $_SESSION['userAlias'] = $row['userAlias'];
        }
        else
        {
            echo "Failed to login";
        }
	
}
}


if (isset($_POST['submit']))
{
    SignIn();
    header ('Location: http://localhost/index.php');
}

?>
