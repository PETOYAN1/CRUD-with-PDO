<?php 
    require_once 'connect_db.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM register WHERE id = $id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    header('location: home.php');
?>