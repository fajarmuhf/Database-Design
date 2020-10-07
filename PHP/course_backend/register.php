<!DOCTYPE html>
<html>
<head>
	<title>Register User</title>
</head>
<body>
	<h2 style="text-align: center;">Daftar User</h2>
	<p style="text-align: center;"><a href="index.php"><button>Login</button></a></p>
	<form action="?submit=1" method="post">
	<table style='text-align: center;margin:auto;'>
		<tr>
			<td>No KTP : </td>
			<td><input type="text" name="ktp"></td>
		</tr>
		<tr>
			<td>Nama Depan : </td>
			<td><input type="text" name="nama_depan"></td>
		</tr>
		<tr>
			<td>Nama Belakang : </td>
			<td><input type="text" name="nama_belakang"></td>
		</tr>
		<tr>
			<td>No HP : </td>
			<td><input type="text" name="no_hp"></td>
		</tr>
		<tr>
			<td>Tempat Lahir : </td>
			<td><input type="text" name="tempat_lahir"></td>
		</tr>
		<tr>
			<td>Tanggal Lahir : </td>
			<td><input type="datetime-local" name="tanggal_lahir"></td>
		</tr>
		<tr>
			<td>Email : </td>
			<td><input type="text" name="email"></td>
		</tr>
		<tr>
			<td>Password : </td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td>Alamat : </td>
			<td><textarea name="alamat"></textarea>></td>
		</tr>
		<tr>
			<td>kode pos : </td>
			<td><input type="text" name="kode_pos"></td>
		</tr>
		<tr>
			<td>kota id : </td>
			<td><?php
				echo '<select name="kota_id">';
				include("database.php"); // sertakan database.php untuk dapat menggunakan class database

				$db = new Database(); // membuat objek baru dari class database agar dapat menggunakan fungsi didalamnya

				$getdata = $db->get("SELECT kota_id,nama_kota,provinsi_id,status FROM kota_tbl WHERE 1");

				while($row = mysqli_fetch_assoc($getdata)) {
					$provinsi_id = $row["provinsi_id"];

					$getdata2 = $db->get("SELECT provinsi_id,nama_provinsi,status FROM provinsi_tbl WHERE provinsi_id = '$provinsi_id'");

					$row2 = mysqli_fetch_assoc($getdata2);
					echo "<option value='".$row['kota_id']."'>".$row['nama_kota']." - ".$row2['nama_provinsi']."</option>";
				}
				echo '</select>';
			?></td>
		</tr>
		<tr>
			<td>status : </td>
			<td><input type="text" name="status"></td>
		</tr>
		<tr style="text-align:center">
			<td colspan="2"><input type="submit" value="daftar"></td>
		</tr>
	</form>
	</table>
	<?php
		if(isset($_GET["submit"])){
			if($_GET["submit"]=="1"){

				$ktp = $_POST["ktp"];
				$nama_depan = $_POST["nama_depan"];
				$nama_belakang = $_POST["nama_belakang"];
				$nama_belakang = $_POST["nama_belakang"];
				$no_hp = $_POST["no_hp"];
				$tempat_lahir = $_POST["tempat_lahir"];
				$tanggal_lahir = $_POST["tanggal_lahir"];
				$email = $_POST["email"];
				$password = md5($_POST["password"]);
				$alamat = $_POST["alamat"];
				$kode_pos = $_POST["kode_pos"];
				$kota_id = $_POST["kota_id"];
				$status = $_POST["status"];

				$kueri = "INSERT INTO user_tbl SELECT '$ktp','$nama_depan','$nama_belakang','$no_hp','$tempat_lahir','$tanggal_lahir','$email','$password','$alamat','$kode_pos','$kota_id','$status' FROM user_tbl WHERE 1 ";

				$db->execute($kueri);

				echo "<p style='text-align:center;'>Daftar sukses</p>";
			}
		}
	?>	
</body>
</html>