<?php 
    $host = mysqli_connect("127.0.0.1", "root", "daff");

    if ($host) {
        echo "Success Connected to Host.<br/>";
    }else{
        echo "Failed Connected.<br/>";
    }

    $db = mysqli_select_db($host,"malasngoding");
    if ($db) {
        echo "Success Connected to databse.<br/>";
    }else {
        echo "Failed Connected.<br/>";
    }
?>