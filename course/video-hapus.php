<?php
include '../connection.php';
session_start();

$id_video=$_GET['id_video'];
$pilih= mysqli_query($connection, "SELECT * FROM course WHERE id_video='$id_video'");
$data = mysqli_fetch_array($pilih);
$video = $data['video'];
$thumbnail = $data['thumbnail'];
unlink('../assets/arsip/'.$video);
unlink('../assets/arsip/upload/'.$thumbnail);
mysqli_query($connection, "DELETE FROM course WHERE id_video='$id_video'");
header("Location: course.php");
?>