<?php
require("connect.php");
function add_game_to_collection($game_name, $game_release_year){
    global $db;
    global $username;


    $query = "SELECT body FROM Review WHERE Username= :name AND Game_Name= :game_name AND Game_Release_Year= :game_release_year";
    $statement = $db ->prepare($query);
    $statement->bindValue(':name', $username);
    $statement->bindValue(':game_name', $game_name);
    $statement->bindValue(':game_release_year', $game_release_year);
    $statement->execute();
    $users = $statement->fetchAll();
    $statement->closeCursor();

    //Get sublist of individuals who have left a review on the game already to prevent duplication

    if(!in_array(strtolower($username), $users)){
        $query = "INSERT INTO 'Review' (`Review_Title`, `Username`, `Game_Name`, `Game_Release_Year`, `Rating`, `Body`) VALUES (:Review_Title, :Username, :game_Name, :game_release_year, :rating, :body);"
        $statement = $db->prepare($query);
        $statement->bindValue(':Username', $username);

        $statement->bindValue(':game_name', $game_name);
        $statement->bindValue(':game_release_year', $game_release_year);
        $statement->bindValue(':rating', $rating);
        $statement->bindValue(':body', $body);
	    $statement->execute();
	    $statement->closecursor();
	    echo "Thank you for your feedback!";
        }
        else{
            echo "You have already left a review.";
        }
}



?>
<!DOCTYPE html>

</html>