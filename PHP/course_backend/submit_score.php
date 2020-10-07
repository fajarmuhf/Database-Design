<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Submit Score User</title>
</head>
<body>
	<h2 style="text-align: center;">Submit Score User</h2>
	<p style="text-align: center;"><a href="logout.php"><button>Logout</button></a></p>
	<p style="text-align: center;"><a href="leaderboard.php"><button>Leaderboard</button></a></p>
	<form action="?submit=1" method="post">
	<table style='text-align: center;margin:auto;'>
		<tr>
			<td>Game : </td>
			<td><?php
				echo '<select name="game_id">';
				include("database.php"); // sertakan database.php untuk dapat menggunakan class database

				$db = new Database(); // membuat objek baru dari class database agar dapat menggunakan fungsi didalamnya

				$getdata = $db->get("SELECT game_id,nama,tipe_leaderboard,status FROM game_tbl WHERE 1");

				while($row = mysqli_fetch_assoc($getdata)) {
					echo "<option value='".$row['game_id']."'>".$row['nama']."</option>";
				}
				echo '</select>';
			?>
			</td>
		</tr>
		<tr>
			<td>Level : </td>
			<td><input type="text" name="level"></td>
		</tr>
		<tr>
			<td>Score : </td>
			<td><input type="number" name="score"></td>
		</tr>
		<tr>
			<td>Status : </td>
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

				$ktp = $_SESSION["ktp"];
				$game_id = $_POST["game_id"];
				$level = $_POST["level"];
				$score = $_POST["score"];
				$status = $_POST["status"];

				$kueri = "SELECT period_id,game_id,level,period_start,period_end FROM period_tbl WHERE game_id = '$game_id' AND level = '$level'";

				$getdata = $db->get($kueri);

				$row = mysqli_fetch_assoc($getdata);
				
				$peroid_start = $row["period_start"];					
				$peroid_end = $row["period_end"];

				date_default_timezone_set('Asia/Jakarta');
				$today = date("d-m-Y", strtotime('today'));
				
				if(strtotime($today) >= strtotime($peroid_start) && strtotime($today) <= strtotime($peroid_end) ){
					$kueri = "INSERT INTO `user_game_data_tbl` SELECT COUNT(*)+1,'$ktp','$game_id','$level','$score','$status' FROM user_game_data_tbl WHERE 1 ";
					$db->execute($kueri);

					echo "<p style='text-align:center;'>Submit Score sukses</p>";
				}
				else{
					echo "<p style='text-align:center;'>Peroide tidak valid</p>";	
				}
			}
		}
	?>	
</body>
</html>