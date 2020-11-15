<?php
require('connect.php');
function getgame($game_name, $game_release_year)
{
	global $db;
	$query = "SELECT * FROM board_game WHERE Game_Name = :game_name AND Game_Release_Year = :game_release_year";
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
	$query = "SELECT * FROM board_game_genre WHERE Game_Name = :game_name AND Game_Release_Year = :game_release_year";
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
	$query = "SELECT * FROM board_game_artist WHERE Game_Name = :game_name AND Game_Release_Year = :game_release_year";
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
	$query = "SELECT * FROM board_game_designer WHERE Game_Name = :game_name AND Game_Release_Year = :game_release_year";
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
	$query = "SELECT * FROM review WHERE Game_Name = :game_name AND Game_Release_Year = :game_release_year";
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
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">  
    </head>
    <body>
        
    </body>
</html>