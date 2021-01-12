<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD dengan PDO</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="title">		
		<h1>Membuat CRUD Dengan PHP Dan MySQL</h1>
		<h2>Menampilkan data dari database</h2>
		<h3>www.averoes.com</h3>
	</div>
	<br/>    

    <a class="tombol" href="input.php">+ Tambah Data Baru</a>
 
    <?php 
        global $message;
        if(isset($_GET['message'])){
            if($_GET['message'] === "input"){
                $message = "Data berhasil di input";
            }else if($_GET['message'] === "edit"){
                $message = "Data berhasil di ubah";
            }else if($_GET['message'] === "delete"){
                $message = "Data berhasil di hapus";
            }
        }
    ?>
    <h3>Data user</h3>
    <h4 class="success-text"><?= $message; ?></h4>
	<table border="1" class="table">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Pekerjaan</th>
            <th>Usia</th>
			<th>Opsi</th>

        </tr>
        
        <?php
            include 'connection.php' ;

            $select_query = "SELECT * FROM user";
            $result = $host->query($select_query);
            while($data = $result->fetch(PDO::FETCH_ASSOC)){
                ?>
                <tr>
                    <td><?= $data['id']?></td>
                    <td><?= $data['name']?></td>
                    <td><?= $data['address']?></td>
                    <td><?= $data['job']?></td>
                    <td><?= $data['age'] ?></td>
                    <td>
                        <a class="edit" href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> |
		                <a class="hapus" href="delete.php?id=<?php echo $data['id']; ?>">Hapus</a>
                    </td>
                </tr>

            <?php }?>
</body>
</html>