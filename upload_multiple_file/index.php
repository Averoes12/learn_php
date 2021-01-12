<html>
<head>
	<title>www.malasngoding.com - Upload multi file menggunakan php mysqli</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h2 style="text-align: center;">UPLOAD MULTI FILE PHP</h2>
		<?php
		if(isset($_GET['alert'])){
			if($_GET['alert']=="max_size"){
				?>
				<div class="alert alert-warning">
					<strong>Warning!</strong> Ukuran File Terlalu Besar
				</div>
				<?php
			}elseif ($_GET['alert']=="error_type") {
				?>
				<div class="alert alert-warning">
					<strong>Warning!</strong> Ekstensi Gambar Tidak Diperbolehkan
				</div>
				<?php
			}elseif ($_GET['alert']=="success") {
				?>
				<div class="alert alert-success">
					<strong>Success!</strong> Gambar Berhasil Disimpan
				</div>
				<?php
			}elseif ($_GET['alert']=="success_delete") {
				?>
				<div class="alert alert-success">
					<strong>Success!</strong> Gambar Berhasil Dihapus
				</div>
				<?php
			}					
		}
		?>
		<form action="upload.php" method="post" enctype="multipart/form-data">			
			<div class="form-group">
				<label>Foto :</label>
				<input type="file" name="foto[]" required="required"  multiple />
				<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif | .svg</p>
			</div>			
			<input type="submit" name="" value="Simpan" class="btn btn-primary">
		</form>
	</div>
    <br>
    <hr>
    <br>

    <table align=center>
        <?php 
            include 'connect.php';
            global $db;
            $db = new database();
            $images = $db->show_all_image();
            if(is_array($images) || is_object($images)){
                foreach ($db->show_all_image() as $item) {
        ?>
        <tr>
            <td>
                <div>
                    <form action="upload.php" method="post">
                        <input type="hidden" name="id" value="<?=$item['id'] ?>">
                        <input type="submit" value="Hapus">
                    </form>
                    <img src="<?= 'image/'. date("d-m-y"). "-" .$item['gambar_nama'] ?>" alt="gambar" width=200 height=200>
                </div>
            </td>
            <td><br></td>
        </tr>
            <?php 
            
                } 
            }
            
            ?>
    </table>
</body>
</html>