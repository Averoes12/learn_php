<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat Base 64</title>
</head>
<body>
    <?php 
        $text_to_encode = "PHP";
        $encoded_text = base64_encode($text_to_encode);
        echo "<h1>Contoh Base 64 dari {$text_to_encode}</h1>" ;
        echo "<p>{$encoded_text}</p>";
        try{
            $link = new PDO("mysql:host=127.0.0.1;dbname=malasngoding", "root", "daff");

            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $link = null;
        
        }catch(PDOExecption $e){
            echo "Koneksi atau query bermasalah " . $e->getMessage() . "<br>";
            die();
        }
    ?>
</body>
</html>