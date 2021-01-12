<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Register</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <?php 

        include 'connect.php';
        global $db;
        global $error;
        global $email_error;
        global $input_text_style;
        global $alert;

        $db = new Database();
        if (isset($_GET['error'])) {
            $error_message = $_GET['error'];
            if ($error_message === "nama_harus_huruf") {
                $alert = "Harus berupa huruf";
            }
            if ($error_message === "email_kosong") {
                $alert = "Email harus diisi";
            }
        }
        if(isset($_GET['m'])){
            $message = $_GET['m'];
            if($message === "success"){
                $alert = "You have registered successfully";
                header("location:login.php");
            }else if($message === "email_used"){
                $alert = "Email has been used, Please try another email or you can Login";
            }else {
                $alert = "";
            }
        }
        if (isset($_GET['email_value']) && isset($_GET['first_name']) && isset($_GET['last_name'])) {
            $first_name = $_GET['first_name'];
            $last_name =  $_GET['last_name'];
            $email_value  =  $_GET['email_value'];
        }else {
            $first_name = "";
            $last_name = "";
            $email_value = "";
        }
    ?>
    <div class="container">
        <h3>Register Form</h3>
        <div class="alert alert-warning" role="alert">
            <?= $alert ?>
        </div>
        <form action="process.php?a=register" method="post">
            <input type="text" name="first_name" class="input-text" placeholder="First Name" value="<?= $first_name ?>">
            <br>
            <input type="text" name="last_name" class="input-text" placeholder="Last Name" value="<?= $last_name ?>">
            <br>
            <input type="email" name="email" class="input-text" placeholder="Email" value="<?= $email_value ?>">
            <br>
            <input type="password" name="password" class="input-text" placeholder="Password">
            <br>
            <p>Pilih Level</p>
            <select class="custom-select" name="level">
                <option selected>Choose...</option>
                <option value="admin">Admin</option>
                <option value="employee">Employee</option>
            </select>
            <br>
            <?php 
                if ($error) {
                    echo "<br>";
                    echo "<p class='error-text'>Nama harus berupa huruf!</p>";
                }else {
                    echo "";
                }
                if ($email_error) {
                    echo "<br>";
                    echo "<p class='error-text'>Email harus diisi!</p>";
                }else {
                    echo "";
                }
            ?>
            <div>
                <p>Sudah punya akun, Silahkan <a href="login.php"><button type="button" class="btn btn-link">Login</button></a></p>
            </div>
            <input class="btn btn-primary" type="submit" value="Register">
        </form>
    </div>
</body>
</html>