<?php
    require('connect.php');
    function login($user, $pass, $login){
        global $db;
        $query = "SELECT * FROM User WHERE Username= :user AND Password= :pass";
        $statement = $db ->prepare($query);
        $statement->bindValue(':user', $user);
        $statement->bindValue(':pass', sha1($pass));
        $statement->execute();
        $results = $statement->fetch();
        $statement->closeCursor();
        if(count($results) == 1){
            echo "Incorrect Username or Password";
        }
        else if(count($results) > 1){ 
            echo "You have successfully logged in";
             $login = $user;
            header("Location: http://www.people.virginia.edu/~ssr5ja/profile.php?name=lol", true, 301);
            exit();
        }
        return $results;
    }
    $logged_in_user = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $input_username = $_POST['username'];
        $input_password = $_POST['password'];
        login($input_username, $input_password, $logged_in_user);
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
        <button id='create'>Create New Account </button>
        <script>
            var btn = document.getElementById('create');
            btn.addEventListener('click', function(){
                document.location.href = 'http://www.people.virginia.edu/~ssr5ja/create.php';
            });
        </script>
    </body>
</html>