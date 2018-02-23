<?php 

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'logon');
define('DB_USER', 'root');
define('DB_PASSWORD', 'n41m4d');

$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to mysql: " . mysqli_error());
$db=mysqli_select_db(DB_NAME,$con) or die("Failed to connect to mysql: " . mysqli_error());


session_start();
$_SESSION['commentpage'] = 'comment';
?>

<!DOCTYPE html>
<html>

<head>
<title>Tasty Recipes, Pancakes Recipe</title>
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
<h2> Pancakes. </h2>

<!-- Picture -->
<img src="../images/pancakes.png" alt="Pancakes" class="meatball-big">

<!-- Info -->
<div class="it-p"> Pancake recipe for 9 small pancakes, approx. 10 mins. (5 mins. prep) . </div>

<!-- Ingredient -->
<h3> Ingredients </h3>

<ul class="ing-list">
	<li> 1 egg </li>
	<li> 3/4 cup milk </li>
	<li> 2 tablespoons butter or 2 tablespoons margarine, melted </li>
	<li> 1 cup flour </li>
	<li> 1 tablespoon sugar</li>
	<li> 1 teaspoon baking powder </li>
	<li> 1/2 teaspoon salt </li>
</ul>

<!-- Direction -->
<h3> Directions </h3>

<ol class="dir-list">
	<li> Beat egg until fluffy. </li>
	<li> Add milk and melted margarine. </li>
	<li> Heat a heavy griddle or fry pan which is greased with a little butter on a paper towel. </li>
	<li> The pan is hot enough when a drop of water breaks into several smaller balls which 'dance' around the pan. </li>
	<li> Pour a small amount of batter (approx 1/4 cup) into pan and tip to spread out or spread with spoon. </li>
	<li> When bubbles appear on surface and begin to break, turn over and cook the other side. </li>
</ol>

<!-- Nutritional facts -->
<h3> Nutritional Facts </h3>

<p> 1 portion contains: </p>
<table class="nut-fact">
	<tr class="nuts"> 
		<td class="nut-name"> <p> Calories  </td>
		<td class="nut-name"> <p> Fat </td>	
		<td class="nut-name"> <p> Carbs </td>
		<td class="nut-name"> <p> Protein </td>
	</tr>
	<tr class="nuts"> 
		<td class="nut-name"> <p> 99.8 </td>
		<td class="nut-name"> <p> 4g </td>	
		<td class="nut-name"> <p> 13.1g </td>
		<td class="nut-name"> <p> 2.8g </td>
	</tr>
	</table>


<h3>Comments</h3>

<?php

$commentpage=$_SESSION['commentpage'];

$getQuery=mysqli_query("SELECT * FROM $commentpage ORDER BY commentID");
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
      echo '<p class="commentAlias">'  . $userAlias . ": " . '</p>'. '<p class="commentText">' . $comment . ' </br> </br>  </p>'; 
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
 