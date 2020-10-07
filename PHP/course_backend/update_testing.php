<?php

include("database.php"); // sertakan database.php untuk dapat menggunakan class database

echo "CRUD TESTING<br>";

$test = new Database(); // membuat objek baru dari class database agar dapat menggunakan fungsi didalamnya

 

$test->execute("UPDATE game_tbl SET status=0, nama = 'DELETE THIS' WHERE game_id != 1");

?>