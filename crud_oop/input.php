<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="judul">		
            <h1>Membuat CRUD Dengan PHP Dan MySQL</h1>
            <h2>Menampilkan data dari database</h2>
            <h3>www.malasngoding.com</h3>
        </div>
        
        <br/>
    
        <a href="index.php">Lihat Semua Data</a>
    
        <br/>
        <h3>Input data baru</h3>
        <?php 
            global $message;
            if(isset($_GET['name']) && isset($_GET['address']) && isset($_GET['job'])&& isset($_GET['age'])){
                $name = $_GET['name'];
                $address = $_GET['address'];
                $job = $_GET['job'];
                $age = $_GET['age'];
            }else {
                $name = "";
                $address = "";
                $job = "";
                $age = "";
            }
            if(isset($_GET['error'])){
                if($_GET['error'] === 'empty_field'){
                    $message = "Data harus diisi";
                }else {
                    $message ="";
                }
            }
        ?>
        <h4 class="error-text"><?= $message; ?></h4>
        <form action="process.php?a=input" method="post">
            <table>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="name" value="<?= $name ?>"></td>					
                </tr>	
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="address" value="<?= $address ?>"></td>					
                </tr>	
                <tr>
                    <td>Pekerjaan</td>
                    <td><input type="text" name="job" value="<?= $job ?>"></td>					
                </tr>
                <tr>
                    <td>Usia</td>
                    <td><input type="text" name="age" value="<?= $age ?>"></td>					
                </tr>	
                <tr>
                    <td></td>
                    <td><input type="submit" value="Save"></td>					
                </tr>
            </table>
        </form>
</body>
</html>