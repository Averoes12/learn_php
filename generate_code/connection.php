<?php
    // $host = mysqli_connect("127.0.0.1", "root", "daff", 'malasngoding') or die(mysqli_error($host));
    try{
        $host = new PDO('mysql:host=127.0.0.1;dbname=malasngoding', 'root', 'daff');
        $host->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        print("Koneksi atau query bermsalah " . $e->getMessage() . "<br>");
        die();
    }
?>