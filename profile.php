<?php
    session_start();
    require('connect.php');
    function get_all_friends($username){
        global $db;
        $query = "SELECT Friend_Username FROM User_Friends WHERE Username= :name";
        $statement = $db ->prepare($query);
        $statement->bindValue(':name', $username);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }
    function get_all_collections($username){
        global $db;
        $query = "SELECT * FROM Collection WHERE Username= :name";
        $statement = $db ->prepare($query);
        $statement->bindValue(':name', $username);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }
    function get_all_subscriptions($username){
        global $db;
        $query = "SELECT * FROM User_Subscribe WHERE Username= :name";
        $statement = $db ->prepare($query);
        $statement->bindValue(':name', $username);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }
    $name = $_GET["name"];
    if($_SERVER['REQUEST_METHOD'] == "GET"){
        echo $logged_in_user;
        $friends = get_all_friends($name);
        $collections = get_all_collections($name);
        $subscriptions = get_all_subscriptions($name);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">  
    </head>
    <h1><?php echo $name . "'s" . " Profile Page"?></h1>
    <h1><?php echo $_SESSION['user']?></h1>
    <h2>Friends List:<h2>
    <ul>
    <?php foreach ($friends as $item): ?>
        <li><?php echo $item["Friend_Username"] ?></li>
    <?php endforeach; ?>       
    </ul>
    <h2>Collections:<h2>
    <ul>
    <?php foreach ($collections as $item): ?>
        <li>
        <a href=<?php echo "http://www.people.virginia.edu/~ssr5ja/collection.php" . "?collection_name=" . urlencode($item['Collection_Name']) . "&username=" . urlencode($item["Username"])?>><?php echo $item["Collection_Name"] ?></a> 
        </li>
    <?php endforeach; ?>       
    </ul>
    <h2>Subscribed To Collections:<h2>
    <ul>
    <?php foreach ($subscriptions as $item): ?>
        <li>
            <a href=<?php echo "http://www.people.virginia.edu/~ssr5ja/collection.php" . "?collection_name=" . urlencode($item['Collection_Name']) . "&username=" . urlencode($item["Collection_Creator"])?>><?php echo $item["Collection_Name"] . " by: " . $item["Collection_Creator"]?></a> 
        </li>
    <?php endforeach; ?>       
    </ul>
</html>