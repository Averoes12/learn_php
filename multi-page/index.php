<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat Multi page dengan PHP | Daff</title>
    <script src="jquery.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content">
        <header>
            <h1 class="judul">WWW.AVEROES.COM</h1>
            <h3 class="deskripsi">Membuat multi page dengan php dan jquery</h3>
        </header>
        <div class="menu">
            <ul>            
                <li><a href="index.php?page=home">Home</a></li>
                <li><a href="index.php?page=about">About</a></li>
                <li><a href="index.php?page=tutorial">Tuorial</a></li>
            </ul>
        </div>
        <div class="badan">
            <?php 
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];

                    switch ($page) {
                        case 'home':
                            include "halaman/home.php";
                            break;
                        case 'about':
                            include "halaman/about.php";
                            break;
                        case 'tutorial':
                            include "halaman/tutorial.php";
                            break;
                        default:
                            echo "<center><h3>Page not Found</h3></center>";
                            break;
                    }
                }else{
                    include "halaman/home.php";
                }        
            ?>
        </div>
    </div>
</body>
</html>