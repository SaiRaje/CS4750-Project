<?php
    require('connect.php');
    function get_all_users(){
        global $db;
        $query = "SELECT Username FROM User";
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closecursor();
        return $results;
    }
    function create($user, $pass){
        global $db;
        /*
        $query = "INSERT INTO User VALUES(:user, :pass)";
        $statement = $db ->prepare($query);
        $statement->bindValue(':user', $user);
        $statement->bindValue(':pass', $pass);
        $statement->execute();
        */
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">  
    </head>
    <body>
        <form method="post">
            <div name="username">
                New Username:
                <input type="text"  name="username">
            </div>
            <div>
                New Password:
                <input type="text"  name="password">
            </div>
            <div>
                <input type="submit">
            </div>
        </form>
    </body>
</html>