<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Game</title>
</head>
<body>
<body>
	<h2 style="text-align: center;">Login</h2>
	<p style="text-align: center;"><a href="register.php"><button>Register</button></a></p>
	<form action="?submit=1" method="post">
	<table style='text-align: center;margin:auto;'>
		<tr>
			<td>Email : </td>
			<td><input type="text" name="email"></td>
		</tr>
		<tr>
			<td>Password : </td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Login"></td>
		</tr>
	</table>
	</form>
	<?php
		include("database.php"); // sertakan database.php untuk dapat menggunakan class database

		$db = new Database(); // membuat objek baru dari class database agar dapat menggunakan fungsi didalamnya

		if(isset($_GET["submit"])){
			if($_GET["submit"]=="1"){
				$email = $_POST['email'];
				$password = md5($_POST['password']);

				$getdata = $db->get("SELECT COUNT(*),ktp FROM user_tbl WHERE email = '$email' AND password = '$password'");

				while($row = mysqli_fetch_assoc($getdata)) {
					if($row["COUNT(*)"] > 0){
						$_SESSION["ktp"] = $row["ktp"];
						echo "<script>window.location = 'submit_score.php';</script>";
						echo "<p style='text-align:center'>login sukses</p>";
					}
					else{
						echo "<p style='text-align:center'>login fail</p>";	
					}
				}
			}
		}
	?>
</body>
</html>