<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD dengan PDO</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <?php 
        include 'connect.php';

        $db = new database();
    ?>
    
	<br/>    

    <a class="btn btn-primary" href="input.php">+ Tambah Data Baru</a>
    <a class="btn btn-primary" href="import.php">Input Data Dummy</a>
 
    <?php 
       global $message;
       if(isset($_GET['message'])){
           if($_GET['message'] === "added"){
               $message = "Data berhasil di input";
           }else if($_GET['message'] === "edited"){
               $message = "Data berhasil di ubah";
           }else if($_GET['message'] === "deleted"){
               $message = "Data berhasil di hapus";
           }
       }
    ?>
    <?php 
        if(!empty($message)){
            ?>
        <div class="alert alert-success" role="alert">
            <?= $message ?>
        </div>
     <?php   }?>
    <h4>Data user</h3>
	<table border="1" class="table table-bordered">
		<thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Pekerjaan</th>
                <th>Usia</th>
                <th>Opsi</th>

            </tr>
        </thead>        
        <?php
        
            $limit = 10;
            $page = isset($_GET['page'])?(int)$_GET['page'] : 1;
            $first_page = ($page > 1) ? ($page * $limit) - $limit : 0;

            $previous = $page -1;
            $next = $page +1;
            

            
            $total_page = ceil($db->show_all_data() / $limit);
        
            foreach ($db->show_limit_data($first_page, $limit) as $data) {
        ?>
            <tr>
                <td><?= $data['id']?></td>
                <td><?= $data['name']?></td>
                <td><?= $data['address']?></td>
                <td><?= $data['job']?></td>
                <td><?= $data['age'] ?></td>
                <td>
                    <a class="edit" href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> |
                    <a class="hapus" href="process.php?a=delete&id=<?php echo $data['id']; ?>">Hapus</a>
                </td>
            </tr>

        <?php
            }
        ?>
    </table>
    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" <?php if($page > 1){ echo "href='?page=$previous'"; } ?>>Previous</a>
            </li>
            <?php 
				for($x=1;$x<=$total_page;$x++){
					?> 
					<li class="page-item"><a class="page-link" href="?page=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>	
            <li class="page-item">
				<a  class="page-link" <?php if($page < $total_page) { echo "href='?page=$next'"; } ?>>Next</a>
			</li>
        </ul>
    </nav>
</body>
</html>