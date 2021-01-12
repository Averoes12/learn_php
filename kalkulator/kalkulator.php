<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <?php if (isset($_POST['hitung'])) {
       $bil1 = $_POST['bil1'] ;
       $bil2 = $_POST['bil2'];
       $operasi = $_POST['operation'];
       $hasil = 0;
       switch ($operasi) {
           case 'concat':
               $hasil = $bil1 + $bil2;
            break;
            case 'substract' :
                $hasil = $bil1 - $bil2;
            break;
            case 'multiple' :
                $hasil = $bil1 * $bil2;
            break;
            case 'divide' :
                $hasil = $bil1 / $bil2;
           default:
               $hasil = 0;
               break;
       } 
    }?>
    <div class="kalkulator">
        <h2 class="head">Kalkulator</h2>
        <form action="kalkulator.php" method="post">
            <input type="text" name="bil1" class="bil" placeholder="Enter number" />
            <input type="text" name="bil2" class="bil" placeholder="Enter number" />
            <select name="operation" class="opt">
                <option value="concat">+</option>
                <option value="substract">-</option>
                <option value="multiple">*</option>
                <option value="divide">/</option>
            </select>
            <input type="submit" name="hitung" value="Hitung" class="tombol">
        </form>
        <?php if ($hasil != 0) {?>
            <input type="text" value="<?php echo $hasil; ?>" class="bil" disable="true">
        <?php } else { ?>
            <input type="text" value="0" class="bil">
        <?php } ?>
    </div>
</body>
</html>