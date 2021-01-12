<html>
<head>
	<title>Membuat Login Dengan PHP dan MySQL | MalasNgoding.com</title>	
</head>
<body>
	<h1>Membuat Login Dengan PHP dan MySQL | MalasNgoding.com</h1>
	<h3>Halaman Login Sederhana</h3>
	<form action="login.php" method="post">		
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="login" value="Log In"></td>
			</tr>
		</table>
    </form>
    <?php 
        include 'koneksi.php';

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysqli_query($host, "select * from admin where username='$username' and password='$password'");
        $cek = mysqli_num_rows($query);
        echo $cek;
    ?>
</body>
</html>