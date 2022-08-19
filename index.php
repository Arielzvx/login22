<?php 

require 'functions.php';

session_start();

if (isset($_SESSION["inilogin"])) {
    header("Location:welcome.php");
}



if (isset($_POST["login"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");
	if (mysqli_num_rows($result) === 1 ) {

		$row = mysqli_fetch_assoc($result);

		if (password_verify($password, $row["password"])){
			
			$_SESSION["inilogin"] = true;
			echo "<script>
			alert('Anda berhasil login');
			window.location.href='welcome.php';
			</script>";
		// header("Location:welcome.php");
		}else{
			echo "<script>
			alert('Username atau password tidak tersedia');
			</script>";
		}
	} 
	$error=true;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>TKJ-PURBA</title>
	<link rel="icon" type="image/png" href="anime.png">
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username">
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password">
			</div>
			<div class="input-group">
				<button name="login" class="btn">Login</button>
			</div>
		</form>
	</div>

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
</body>
</html>