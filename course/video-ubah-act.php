<?php
include '../connection.php';
session_start();
$id_video=$_POST['id_video'];
$judul=$_POST['judul'];
$tanggal=$_POST['tanggal'];
$video = $_FILES ['video']['name'];


if(empty($video)){
    mysqli_query($connection, "UPDATE course set judul='$judul', tanggal='$tanggal' WHERE id_video='$id_video'");
    header("Location: course.php");
}else{
    $pilih = mysqli_query($connection, "SELECT * FROM course where id_video='$id_video'");
    $data = mysqli_fetch_array($pilih);
    $video = $data['video'];
    unlink('../assets/arsip/'.$video);

    $ekstensi_file =array('mp4');
    $folder ='../assets/arsip/';
    $source=$_FILES['video']['tmp_name'];
    move_uploaded_file($source, $folder.$video);
    mysqli_query($connection, "UPDATE course set  video='$video', judul='$judul', tanggal='$tanggal' WHERE id_video ='$id_video'");
    header("Location:course.php");
}


?>