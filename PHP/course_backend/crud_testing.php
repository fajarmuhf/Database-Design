<?php

include("database.php"); // sertakan database.php untuk dapat menggunakan class database

echo "CRUD TESTING<br>";

$test = new Database(); // membuat objek baru dari class database agar dapat menggunakan fungsi didalamnya

 

$test->execute("INSERT INTO game_tbl(nama, tipe_leaderboard, status) VALUES('Game-001',1,true)");

$test->execute("INSERT INTO game_tbl(nama, tipe_leaderboard, status) VALUES('Game-002',1,true)");

$test->execute("INSERT INTO game_tbl(nama, tipe_leaderboard, status) VALUES('Game-003',1,true)");

$test->execute("INSERT INTO game_tbl(nama, tipe_leaderboard, status) VALUES('Game-004',1,true)");

$test->execute("INSERT INTO game_tbl(nama, tipe_leaderboard, status) VALUES('Game-005',1,true)");

?>