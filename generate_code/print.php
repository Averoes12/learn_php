<!DOCTYPE html>
<html>
<head>
	<title>Print data barang</title>
</head>
<body>

	<center>
		<h2>Print Data Barang</h2>
		<h4>Laporan Barang Masuk pada 27 November 2020</h4>
    </center>
    
    <div style="margin:auto auto">
        <table border="1">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Product Name</th>
                    <th>Total</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include 'connection.php';
                    
                    $result = $host->query("select * from barang");
                    while($data = $result->fetch(PDO::FETCH_ASSOC)){
                        ?>
                <tr>
                    <td><?= $data['code'];  ?></td>
                    <td><?= $data['nama_barang'];  ?></td>
                    <td><?= $data['total'];  ?></td>
                    <td><?= "Rp. ".number_format($data['price'])." ,-"; ?></td>

                </tr>

                <?php }?>
            </tbody>
        </table>
    </div>

	<script>
		window.print();
	</script>
	
</body>
</html>