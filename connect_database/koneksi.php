<?php 
    $host = "127.0.0.1";
    $username = "root";
    $password = "daff";
    $database = "malasngoding";
    $host = mysqli_connect($host, $username, $password);

    if ($host) {
        echo "Success Connected to Host.<br/>";
    }else{
        echo "Failed Connected.<br/>";
    }

    $db = mysqli_select_db($host, $database);
    if ($db) {
        echo "Success Connected to databse.<br/>";
    }else {
        echo "Failed Connected.<br/>";
    }
?>
