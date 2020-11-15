<?php
    $username = 'ssr5ja';
    $password = 'sample';
    $host = 'usersrv01.cs.virginia.edu';
    $dbname = 'ssr5ja';

    $dsn = "mysql:host=$host;dbname=$dbname";
    $db = "";

    try 
    {
        $db = new PDO($dsn, $username, $password);
    }   
    catch (PDOException $e)
    {
        $error_message = $e->getMessage();        
        echo "<p>An error occurred while connecting to the database: $error_message </p>";
    }
    catch (Exception $e)
    {
        $error_message = $e->getMessage();
        echo "<p>Error message: $error_message </p>";
    }
?>