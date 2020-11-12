<?php
    require('connect.php');
    function login($user, $pass){
        global $db;
        $query = "SELECT * FROM User WHERE Username= :user AND Password= :pass";
        $statement = $db ->prepare($query);
        $statement->bindValue(':user', $user);
        $statement->bindValue(':pass', $pass);
        $statement->execute();
        $results = $statement->fetch();
        $statement->closeCursor();
        return $results;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $input_username = $_POST['username'];
        $input_password = $_POST['password'];
        login($input_username, $input_password);
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
                Username:
                <input type="text"  name="username">
            </div>
            <div>
                Password:
                <input type="text"  name="password">
            </div>
            <div>
                <input type="submit">
            </div>
        </form>
    </body>
</html>