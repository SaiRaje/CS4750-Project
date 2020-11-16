
<?php
session_start();
require("connect.php");
function get_all_public_collections(){
    global $db;
    $query = "SELECT * FROM Collection WHERE public = 1";
    $statement = $db ->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

$collections = get_all_public_collections();
?>

<!DOCTYPE html>
<html>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
</style>
<ul>
  <li><a href=<?php echo "http://www.people.virginia.edu/~ssr5ja/collection.php" . "?name=" . urlencode($_SESSION['user'])?>>Profile</a></li>
  <li><a href="http://www.people.virginia.edu/~ssr5ja/public_collections.php">Public Collections</a></li>
  <li><a href="http://www.people.virginia.edu/~ssr5ja/game_list.php">All Games</a></li>
</ul>
    <head>
        <meta charset="UTF-8">  
    </head>
    <h1><?php "Public Collections"?></h1>
    <h2>All Public Collections:<h2>
    <ul>
    <?php foreach ($collections as $item): ?>
        <li>
        <a href=<?php echo "http://www.people.virginia.edu/~ssr5ja/collection.php" . "?collection_name=" . urlencode($item['Collection_Name']) . "&username=" . urlencode($item["Username"])?>><?php echo $item["Collection_Name"] . " by: " . $item["Username"]?></a> 
        </li>
    <?php endforeach; ?>       
    </ul>
</html>