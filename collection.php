<?php
require("connect.php");
function get_all_games($name, $user){
    global $db;
    $query = "SELECT *  FROM Contains WHERE Collection_Name= :name AND Username= :user";
    $statement = $db ->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':user', $user);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}
    $collection_name = $_GET["collection_name"];
    $username = $_GET["username"];
    $games = get_all_games($collection_name, $username);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">  
    </head>
<h2>Games:<h2>
    <ul>
    <?php foreach ($games as $item): ?>
        <a href=<?php echo "http://www.people.virginia.edu/~ssr5ja/game_page.php" . "?name=" . urlencode($item['Game_Name']) . "&year=" . urlencode($item['Game_Release_Year'])?>><?php echo $item["Game_Name"] ?></a> 
    <?php endforeach; ?>       
    </ul>
</html>