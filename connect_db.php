<?php 
    $host = '127.0.0.1:3306';
    $db_name = 'oop';
    $username = 'root';
    $password = '';

    // var_dump(PDO::getAvailableDrivers());
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db_name;", $username, $password);
    } catch (PDOException $exception) {
        echo 'Error' . $exception->getMessage();
    }
?>