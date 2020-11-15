<?php
require('connect.php');
function getgame($game_name, $game_release_year)
{
	global $db;
	$query = "SELECT * FROM Board_Game WHERE Game_Name = :game_name AND Game_Release_Year = :game_release_year";
    $statement = $db->prepare($query);
    $statement->bindValue(':game_name', $game_name);
    $statement->bindValue(':game_release_year', $game_release_year);
	$statement->execute();
	
	// fetchAll() returns an array for all of the rows in the result set
	$results = $statement->fetch();
	
	// closes the cursor and frees the connection to the server so other SQL statements may be issued
	$statement->closecursor();
	
    return $results;
}

function getgenre($game_name, $game_release_year)
{
	global $db;
	$query = "SELECT * FROM Board_Game_Genre WHERE Game_Name = :game_name AND Game_Release_Year = :game_release_year";
    $statement = $db->prepare($query);
    $statement->bindValue(':game_name', $game_name);
    $statement->bindValue(':game_release_year', $game_release_year);
	$statement->execute();
	
	// fetchAll() returns an array for all of the rows in the result set
	$results = $statement->fetchAll();
	
	// closes the cursor and frees the connection to the server so other SQL statements may be issued
	$statement->closecursor();
	
    return $results;
}

function getartist($game_name, $game_release_year)
{
	global $db;
	$query = "SELECT * FROM Board_Game_Artist WHERE Game_Name = :game_name AND Game_Release_Year = :game_release_year";
    $statement = $db->prepare($query);
    $statement->bindValue(':game_name', $game_name);
    $statement->bindValue(':game_release_year', $game_release_year);
	$statement->execute();
	
	// fetchAll() returns an array for all of the rows in the result set
	$results = $statement->fetchAll();
	
	// closes the cursor and frees the connection to the server so other SQL statements may be issued
	$statement->closecursor();
	
    return $results;
}

function getdesigner($game_name, $game_release_year)
{
	global $db;
	$query = "SELECT * FROM Board_Game_Designer WHERE Game_Name = :game_name AND Game_Release_Year = :game_release_year";
    $statement = $db->prepare($query);
    $statement->bindValue(':game_name', $game_name);
    $statement->bindValue(':game_release_year', $game_release_year);
	$statement->execute();
	
	// fetchAll() returns an array for all of the rows in the result set
	$results = $statement->fetchAll();
	
	// closes the cursor and frees the connection to the server so other SQL statements may be issued
	$statement->closecursor();
	
    return $results;
}

function getreview($game_name, $game_release_year)
{
	global $db;
	$query = "SELECT * FROM Review WHERE Game_Name = :game_name AND Game_Release_Year = :game_release_year";
    $statement = $db->prepare($query);
    $statement->bindValue(':game_name', $game_name);
    $statement->bindValue(':game_release_year', $game_release_year);
	$statement->execute();
	
	// fetchAll() returns an array for all of the rows in the result set
	$results = $statement->fetchAll();
	
	// closes the cursor and frees the connection to the server so other SQL statements may be issued
	$statement->closecursor();
	
    return $results;
}
$name = urldecode($_GET["name"]);
$year = urldecode($_GET["year"]);
$game = getgame($name, $year);
$genres = getgenre($name, $year);
$artists = getartist($name, $year);
$designers = getdesigner($name, $year);
$reviews = getreview($name, $year);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">  
    </head>
    <body>
		<h1><?php echo $name?></h1>
		<h2><?echo "Release Date: " . $year ?></h2>
		<h2><?php echo "Description:" . " " . $game["Description"]?></h2>
		<h2><?php echo "Rating:" . " " . strval($game["Avg_Rating"])?></h2>
		<h2>Genres:</h2>
		<?php foreach ($genres as $item): ?>
			<li><?php echo $item["Genre"] ?></li>
		<?php endforeach; ?>
		<h2>Artists:</h2>
		<ul>
		<?php foreach ($artists as $item): ?>
			<li><?php echo $item["Artist"] ?></li>
		<?php endforeach; ?>
		</ul>
		<h2>Designers:</h2>
		<ul>
		<?php foreach ($designers as $item): ?>
			<li><?php echo $item["Designer"] ?></li>
		<?php endforeach; ?>
		</ul>
		<h2>Reviews:</h2>
		<?php foreach ($reviews as $item): ?>
			<h3><?php echo $item["Review_Title"] . ", By User: " . $item["Username"] . ", Rating: " . $item["Rating"]?></h3>
			<h4><? echo $item["Body"] ?></h4>
		<?php endforeach; ?>
    </body>
</html>