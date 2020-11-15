<?php
    require('connect.php');
    function get_all_friends($username){
        global $db;
        $query = "SELECT Friend_Username FROM User_Friends WHERE Username= :name";
        $statement = $db ->prepare($query);
        $statement->bindValue(':name', $username);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        $formatted_results = array();
        for($i = 0; $i < count($results); $i++){
            array_push($formatted_results, $results[$i][0]);
        }
        return $formatted_results;
    }
    function get_all_collections($username){
        global $db;
        $query = "SELECT Collection_Name, public FROM Collection WHERE Username= :name";
        $statement = $db ->prepare($query);
        $statement->bindValue(':name', $username);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        $formatted_results = array();
        for($i = 0; $i < count($results); $i++){
            array_push($formatted_results, $results[$i][0]);
        }
        return $formatted_results;
    }
    function get_all_subscriptions($username){
        global $db;
        $query = "SELECT Collection_Name FROM User_Subscribe WHERE Username= :name";
        $statement = $db ->prepare($query);
        $statement->bindValue(':name', $username);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        $formatted_results = array();
        for($i = 0; $i < count($results); $i++){
            array_push($formatted_results, $results[$i][0]);
        }
        return $formatted_results;
    }
    $name = $_GET["name"];
    if($_SERVER['REQUEST_METHOD'] == "GET"){
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
    <h2>Friends List:<h2>
    <ul>
    <?php foreach ($friends as $item): ?>
        <li><?php echo $item ?></li>
    <?php endforeach; ?>       
    </ul>
    <h2>Collections:<h2>
    <ul>
    <?php foreach ($collections as $item): ?>
        <li><?php echo $item ?></li>
    <?php endforeach; ?>       
    </ul>
    <h2>Subscribed To Collections:<h2>
    <ul>
    <?php foreach ($subscriptions as $item): ?>
        <li><?php echo $item ?></li>
    <?php endforeach; ?>       
    </ul>
</html>