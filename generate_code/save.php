<?php 
    include 'connection.php';

    $product_code = $_POST['code'];
    $date = $_POST['date'];
    $product_name = $_POST['product_name'];
    $total_product = $_POST['total'];
    $price_product = $_POST['price'];

    // $save_data = mysqli_query($host, 
    //     "insert into barang values('?', '?', '?', '?')")or die(mysqli_error($host));
    $save_query = "insert into barang values(?,?,?,?,?)";
    $stmt = $host->prepare($save_query);
    $stmt->bindParam(1, $product_code);
    $stmt->bindParam(2, $product_name);
    $stmt->bindParam(3, $total_product);
    $stmt->bindParam(4, $price_product);
    $stmt->bindParam(5, $date);

    $stmt->execute();

    header("location:index.php");
?>