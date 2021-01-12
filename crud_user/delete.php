<?php 
    include 'connection.php';

    $user_id = $_GET['id'];
    $delete_query = "DELETE FROM user WHERE id=$user_id";
    $stmt = $host->prepare($delete_query);
    $stmt->execute();

    header('location:index.php?message=delete');
?>