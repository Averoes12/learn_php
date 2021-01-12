<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload file with PHP</title>
</head>
<body>
    <h1>Membuat upload file dengan php dan MySql</h1>
    <form action="action.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" name="upload" value="Upload">
    </form>
</body>
</html>