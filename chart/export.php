<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Data</title>
</head>
<body>
    <style type="text/css">
        body{
            font-family: sans-serif;
        }
        table{
            margin: 20px auto;
            border-collapse: collapse;
        }
        table th,
        table td{
            border: 1px solid #3c3c3c;
            padding: 3px 8px;
    
        }
        </style>

        <?php 
            header("Content-type: application/vnd-ms-excel");
            header("Content-Disposition: attachment; filename=Data Mahasiswa.xlsx");
        ?>
    <table border=1>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Gender</th>
                <th>Fakultas</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                include 'connect.php';

                global $db;
                $db = new Database();

                foreach ($db->show_all_student() as $item) {
                    ?>
                <tr>
					<td><?php echo $item['id'] ?></td>
					<td><?php echo $item['name']; ?></td>
                    <td><?php echo $item['nim']; ?></td>
					<td><?php echo $item['gender']; ?></td>
					<td><?php echo $item['faculty']; ?></td>
                </tr>
                
            <?php }?>             
        </tbody>
    </table>
</body>
</html>