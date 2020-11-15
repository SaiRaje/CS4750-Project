<?php
    require('connect.php');
    function get_all_users(){
        global $db;
        $query = "SELECT Username FROM User";
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closecursor();
        $formatted_results = array();
        for($i = 0; $i < count($results); $i++){
            array_push($formatted_results, strtolower($results[$i][0]));
        }
        return $formatted_results;
    }
    function create($user, $pass){
        global $db;
        $usernames = get_all_users();
        print_r($usernames);
        if(!in_array(strtolower($user), $usernames)){
            $query = "INSERT INTO User VALUES(:user, :pass)";
            $statement = $db ->prepare($query);
            $statement->bindValue(':user', $user);
            $statement->bindValue(':pass', sha1($pass));
            $statement->execute() or die(print_r($statement->errorInfo(), true));
            $statement->closeCursor();
            echo "Your new account has been created";
        }
        else{
            echo "This Username Has Already Been Taken";
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $input_username = $_POST['username'];
        $input_password = $_POST['password'];
        create($input_username, $input_password);
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
        <button id='login'>Go To Login Page</button>
        <script>
            var btn = document.getElementById('login');
            btn.addEventListener('click', function(){
                document.location.href = 'http://www.people.virginia.edu/~ssr5ja/login.php';
            });
        </script>
    </body>
</html>