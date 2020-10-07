<?php

include("database.php"); // sertakan database.php untuk dapat menggunakan class database

echo "CRUD TESTING<br>";

$test = new Database(); // membuat objek baru dari class database agar dapat menggunakan fungsi didalamnya

 

$getdata = $test->get("SELECT game_id, nama, tipe_leaderboard, status FROM game_tbl WHERE status = 1");

 

while($row = mysqli_fetch_assoc($getdata)) {

   echo "game_ID: " . $row["game_id"]. " - Nama: " . $row["nama"]. " - Tipe_Leaderboard: " . $row["tipe_leaderboard"]. " - ". $row["status"]."<br>";

}

?>