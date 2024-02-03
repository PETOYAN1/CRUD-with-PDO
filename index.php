<?php 

    //Creating Database

    $createDb = file_get_contents('Db_mysql/database.sql', FILE_USE_INCLUDE_PATH);

    $host = '127.0.0.1:3306';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host", $username, $password);
        $pdo->exec($createDb);
        header('location: home.php');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
?>