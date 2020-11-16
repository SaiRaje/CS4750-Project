<?php
require("connect.php");
function add_game_to_collection($collection_name, $game_name, $game_release_year){
      global $db;
      $query = "INSERT INTO 'Contains' (`Collection_Name`, `Game_Name`, `Game_Release_Year`) VALUES (:collection_name, :game_name, :game_release_year);"
      $statement = $db->prepare($query);
      $statement->bindValue(':collection_name', $collection_name);
      $statement->bindValue(':game_name', $game_name);
      $statement->bindValue(':game_release_year', $game_release_year);
	  $statement->execute();
	  $statement->closecursor();

}




?>
<!DOCTYPE html>
<html>

</html>