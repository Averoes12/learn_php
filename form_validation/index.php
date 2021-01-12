<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        global $level;
        session_start();
        if($_SESSION['status'] != 'login'){
            header("location:login.php?m=not_login");
        }
        switch ($_SESSION['level']) {
            case 'admin':
                    $level = "Admin";
                break;
            case 'employee':
                    $level = "Employee";
                break;
            default:
                    $level = "Undefined Level";
                break;
        }
    ?>
<div class="output-container">
        <h3 class="success">Welcome home</h3>
        <table>
            <tr>
                <td>
                    <p class="label">First Name : </p>
                </td>
                <td>
                    <p class="field"><?= $_SESSION['first_name'] ?></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="label">Email : </p>
                </td>
                <td>
                    <p class="field"><?= $_SESSION['email'] ?></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="label">Level : </p>
                </td>
                <td>
                    <p class="field"><?= $level ?></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><a href="process.php?a=logout">Log Out</a></p>
                    <p><a href="process.php?a=delete&id=<?= $_SESSION['id'] ?>">Delete Account</a></p>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>