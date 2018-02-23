<?php 

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'logon');
define('DB_USER', 'root');
define('DB_PASSWORD', 'n41m4d');

$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to mysql: " . mysqli_error());
$db=mysqli_select_db(DB_NAME,$con) or die("Failed to connect to mysql: " . mysqli_error());


session_start();
$_SESSION['commentpage'] = 'commentmeat';
?>

<!DOCTYPE html>
<html>

<head>
<title>Tasty Recipes, Meatballs Recipe</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<meta charset="UTF-8">

</head>

<body>

<!-- HEADER -->
<h1> <a href="../index.php" class="button"> Tasty Recipes. </a></h1>


<!-- 3 BIG LINK BUTTONS -->
<div class="linx"><a class="button" href="calendar.html">calendar</a></div>
<div class="linx"><a class="button" href="recipes.html">recipes</a></div>
<div class="linx"><a class="button" href="member.html">members</a></div>

<!-- Recipe -->
<h2> Meatballs. </h2>

<!-- Picture -->
<img src="../images/meatballs.jpeg" alt="Meatballs" class="meatball-big">

<!-- Info -->
<div class="it-p"> Meatball recipe for 4 servings, approx. 40 minutes (15 min. prep) . </div>

<!-- Ingredient -->
<h3> Ingredients </h3>

<ul class="ing-list">
	<li> 1 lb lean (at least 80%) ground beef  </li>
	<li> 1/2 cup bread crumbs </li>
	<li> 1/4 cup milk </li>
	<li> 1/2 teaspoon salt </li>
	<li> 1/2 teaspoon Worcestershire sauce</li>
	<li> 1 small onion, finely chopped (1/4 cup) </li>
	<li> 1 egg </li>
</ul>

<!-- Direction -->
<h3> Directions </h3>

<ol class="dir-list">
	<li> Heat oven to 400 degrees F. Line 13x9-inch pan with foil; spray with cooking spray. </li>
	<li> In large bowl, mix all ingredients. Shape mixture into 20 to 24 (1 1/2-inch) meatballs. Place 1 inch apart in pan. </li>
	<li> Bake uncovered 18 to 22 minutes or until no longer pink in center. </li>
</ol>

<!-- Nutritional facts -->
<h3> Nutritional Facts </h3>

<p> Every meatball contains: </p>
<table class="nut-fact">
	<tr class="nuts"> 
		<td class="nut-name"> <p> Calories </td>
		<td class="nut-name"> <p> Fat </td>	
		<td class="nut-name"> <p> Carbs </td>
		<td class="nut-name"> <p> Protein </td>
	</tr>
	<tr class="nuts"> 
		<td class="nut-name"> <p> 57 </td>
		<td class="nut-name"> <p> 3.69g </td>	
		<td class="nut-name"> <p> 2.12g </td>
		<td class="nut-name"> <p> 3.47g </td>
	</tr>
	</table>

<!-- Comments -->
<?php

$getQuery=mysqli_query("SELECT * FROM comment ORDER BY commentID");
while($rows= mysqli_fetch_array($getQuery))
{
    $commentID=$rows['commentID'];
    $userID=$rows['userID'];
    $comment=$rows['theComment'];
    $userAlias=$rows['userAlias'];
    $editComment= "<a class=\"editButton\" href= \"../recipes/editpage.php?commentID=" . $commentID . "  \"> edit </a> </br> </p>";
    $_SESSION['uri'] = $_SERVER['REQUEST_URI'];
    
    
    if ($userAlias == $_SESSION['userAlias'])
    {
      echo '<p class="commentAlias">' . $userAlias . ": " . '</p>' . '<p class="commentText">'  . $comment . $editComment . '</p>';
    }
    else
    {
      echo "<p>" . $userAlias . " says:" . $comment . "</br> </p>";  
    }

}

?>




<h3>Leave a comment:</h3>

<form action="../php/insertcomment.php" method="POST">
<textarea id="text" rows="4" cols="50" name="comments"> Write a comment... </textarea>
 
<div>
<input type="submit" value="Click to comment" /> 
</br>
</br>


</div>

</form>
</body>
</html>
 