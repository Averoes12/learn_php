<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data User</title>
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
    <h3>Edit data</h3>

    <?php 
        include 'connection.php';

        global $message;
        $user_id = $_GET['id'];
        $query = "SELECT * FROM user WHERE id=:id";
        $stmt = $host->prepare($query);
        $stmt->execute(array(
            ':id' => $user_id,
        ));

        if(isset($_GET['error'])){
            if($_GET['error'] === 'empty_field'){
                $message = "Data harus diisi";
            }
        }
        while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
        <h4 class="error-text"><?= $message; ?></h4>
        <form action="update.php" method="post">
            <table>
            <tr>
                <td>Nama</td>
                <td>
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <input type="text" name="name" value="<?= $data['name'] ?>">
                </td>
            </tr>
            <tr>
                <td>Address</td>
                <td>
                    <input type="text" name="address" value="<?= $data['address'] ?>">
                </td>
            </tr>
            <tr>
                <td>Job</td>
                <td>
                    <input type="text" name="job" value="<?= $data['job'] ?>">
                </td>
            </tr>
            <tr>
                <td>Age</td>
                <td>
                    <input type="text" name="age" value="<?= $data['age'] ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Save">
                </td>
            </tr>
            </table>
        </form>    
    <?php } ?>
</body>
</html>