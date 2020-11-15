<?php
require('connect.php');
function getallgames()
{
	global $db;
	$query = "SELECT Game_Name, Game_Release_Year, Max_Player_Count, Min_Player_Count, Avg_Rating, Play_Time FROM Board_Game";
    $statement = $db->prepare($query);
    $statement->execute();
	
	// fetchAll() returns an array for all of the rows in the result set
	$results = $statement->fetchAll();
	
	// closes the cursor and frees the connection to the server so other SQL statements may be issued
	$statement->closecursor();
	
    return $results;
}
$games = getallgames();
?>

<!DOCTYPE html>
<html>
<h1>List of Games</h1>
<table class="w3-table w3-bordered w3-card-4 center" style="width:70%">
  <thead>
  <tr style="background-color:#B0B0B0">
    <th width="25%">Game Name</th>        
    <th width="25%"> Release Year</th>        
    <th width="25%">Max Players</th> 
    <th width="10%">Min Players</th>
    <th width="10%">Play Time</th>
    <th width="10%">Rating</th> 
  </tr>
  </thead>
  <?php foreach ($games as $item): ?>
  <tr>
    <td>
        <a href=<?php echo "http://www.people.virginia.edu/~ssr5ja/game_page.php" . "?name=" . urlencode($item['Game_Name']) . "&year=" . urlencode($item['Game_Release_Year'])?>><?php echo $item["Game_Name"] ?></a> 
    </td>
    <td><?php echo $item['Game_Release_Year']; ?></td>
    <td><?php echo $item['Max_Player_Count']; ?></td> 
    <td><?php echo $item['Min_Player_Count']; ?></td>
    <td><?php echo $item['Play_Time']; ?></td>        
    <td><?php echo $item['Avg_Rating']; ?></td>                                  
  </tr>
  <?php endforeach; ?>
</table>
</html>