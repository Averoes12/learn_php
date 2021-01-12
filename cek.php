<!DOCTYPE html>
<html>
    <head>
        <title>
            Membuat dan mengahapus folder
        </title>
    </head>
    <body>
        <h1>
            Cara membuat dan mengapus folder
        </h1>
        <?php 
            function created(){
                echo "<p>folder berhasil di buat</p>";
            }

            mkdir("/home/runsystem/New Folder", 0777 ,created());
        ?>
    </body>
</html>