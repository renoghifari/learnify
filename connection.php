<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_learnify";

$connection = mysqli_connect($host,$user,$pass,$db);
if(!$connection){
  die("Gagal Terkoneksi");
}


?>