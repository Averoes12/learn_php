<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate code automatic</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php 
        include 'connection.php';

        global $productCode;
        global $sort;
        //mengambil data barang dengan kode paling besar
        // $query = mysqli_query($host, "SELECT MAX(code) AS biggerCode FROM barang;") or die(mysqli_error($host));
        // while($data = mysqli_fetch_array($query)){
        //     $productCode = $data['biggerCode'];
        // }
        $result = $host->query("SELECT MAX(code) AS biggerCode FROM barang;"); 
        while($data = $result->fetch(PDO::FETCH_ASSOC)){
            $productCode = $data['biggerCode'];
        }


        // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
        // dan diubah ke integer dengan (int)

        $sorting = (int) substr($productCode, 4, 4);

        // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
        $sorting++;

        $code = "PROD";
        $productCode = $code. sprintf("%03s", $sorting);
        $deleteId = $code. sprintf("%03s", $sorting-1);

        if(isset($_POST['cancel'])){
            // mysqli_query($host, "DELETE FROM `malasngoding`.`barang`  WHERE `code`='$deleteId'");
            $delete_query = "DELETE FROM `malasngoding`.`barang`  WHERE `code`= :id ";
            $stmt = $host->prepare($delete_query);
            $stmt->execute(array(":id" => $deleteId));
            $productCode = $deleteId;
        }

        $total_query = "SELECT * FROM barang";
        $stmt = $host->prepare($total_query);
        $stmt->execute();

        $total_data = $stmt->rowCount();

    ?>
    <h1>Membuat generate code otomatis</h1>
    <form action="save.php" method="post">
        <label>Product Code</label>
        <br>
        <input type="text" name="code" required="required" value="<?= $productCode; ?>" readonly>
        <br>
        <label>Enter Date</label>
        <br>
        <input type="date" name="date">
        <br>
        <label>Product Name</label>
        <br>
        <input type="text" name="product_name" required="required">
        <br>
        <label>Total</label>
        <br>
        <input type="text" name="total" required="required">
        <br>
        <label>Price</label>
        <br>
        <input type="text" name="price" required="required">
        <br>
        <input type="submit" value="Save">
    </form>

    <br>
    <hr>
    <br>
    
    <form method="post">
        <input type="submit" value="Cancel" name="cancel">
    </form>
    <p style="text-align:start"><a href="print.php" target="_blank">Print</a></p>
    <form method="get">
			<label>Urutkan sesuai tanngal</label>
			<input type="date" name="date">
            <input type="submit" value="Filter">
            <form action="post"><input type="submit" value="Reset" name="reset"></form>
		</form>
    <div style="display:flex; flex-direction:row;">
        <table border="1">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Enter Date</th>
                    <th>Product Name</th>
                    <th>Total</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    
                    if(isset($_GET['date'])){
                        if(!empty($_GET['date'])){
                            $date = $_GET['date'];
                            $result = $host->query("SELECT * FROM barang WHERE date='$date'");
                        }else {
                            $date = "";
                            $result = $host->query("SELECT * FROM barang");
                        }
                    }else {
                        $date = "";
                        $result = $host->query("SELECT * FROM barang");
                    }
                    if(isset($_POST['reset'])){
                        $date = "";
                        $result = $host->query("SELECT * FROM barang");
                    }
                    
                    while($data = $result->fetch(PDO::FETCH_ASSOC)){
                        ?>
                <tr>
                    <td><?= $data['code'];  ?></td>
                    <td><?= $data['date']; ?></td>
                    <td><?= $data['nama_barang'];  ?></td>
                    <td><?= $data['total'];  ?></td>
                    <td><?= "Rp. ".number_format($data['price'])." ,-"; ?></td>

                </tr>

                <?php }?>
            </tbody>
        </table>
        <div style="margin-left:16px;">
            <p>Total Produk</p>
            <p><?= $total_data ?></p>
        </div>
    </div>
</body>

</html>