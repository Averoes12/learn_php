<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload file with PHP</title>
</head>
<body>
    <h1>Membuat upload file dengan PHP dan MySql</h1>
    <?php 
        include "connection.php";
        if ($_POST['upload']) {
            $allowed_extention = ['png', 'jpg'];
            $file_name = $_FILES['file']['name'];
            $x = explode(".", $file_name);
            $extention = strtolower(end($x));
            $file_size = $_FILES['file']['size'];
            $file_tmp = $_FILES['file']['tmp_name'];
            $file_destination = 'file/'. $file_name;
        
            if (in_array($extention, $allowed_extention) === TRUE) {
                if ($file_size < 1044070) {
                    move_uploaded_file($file_tmp, $file_destination);
                    $query = mysqli_query($host, "insert into upload values(NULL, '$file_name')");
                    if ($query) {
                        echo "File uploaded succesfully";
                    }else {
                        echo "Failed to upload file";
                    }
                }else {
                    echo "Size is too large";
                }
            }else {
                echo "Not supported extention";
            }
        }

    ?>
        <br/>
		<br/>
		<a href="index.php">Upload Lagi</a>
		<br/>
		<br/>
 
        <table>
            <?php 
                $data = mysqli_query($host, "select * from upload");
                while ($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td>
                        <img src="<?php echo 'file/'.$d['nama_file']; ?>" alt="gambar">
                    </td>
                </tr>

                <?php } ?>
        
        </table>
</body>
</html>