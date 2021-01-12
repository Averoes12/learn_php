<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        if ($error_message === "empty_field") {
            $alert = "Email or password can't be blank";
        }else {
            $alert = "";
        }
    }
    if(isset($_GET['m'])){
        $message = $_GET['m'];
        if($message === "failed"){
            $alert = "Email or password is wrong";
        }else if($message === "not_login"){
            $alert = "You have to login first";
        }else {
            $alert = "";
        }
    }
    if (isset($_GET['email_value'])) {
        $email_value  =  $_GET['email_value'];
    }else {
        $email_value = "";
    }
    ?>
<div class="container">
        <h3>Login Form</h3>
        <div class="alert alert-warning" role="alert">
            <?= $alert ?>
        </div>
        <form action="process.php?a=login" method="post">
            <input type="email" name="email" class="input-text" placeholder="Email" value="<?= $email_value?>">
            <br>
            <input type="password" name="password" class="input-text" placeholder="Password">
            <br>
            <input class="btn btn-primary" type="submit" value="Login">
            <p>Belum punya akun? </p>
            <a href="form.php"><button type="button" class="btn btn-link">Daftar</button></a>
        </form>
    </div>
</body>
</html>