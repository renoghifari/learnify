<?php
include ('../connection.php');

$id_video = $_POST['id_video'];
$id_user = $_POST['id_user'];
$judul = $_POST['judul'];
$tanggal = $_POST['tanggal'];
$thumbnail = md5($_FILES['thumbnail']['name'] . time()) . '.' . pathinfo($_FILES['thumbnail']['name'], PATHINFO_EXTENSION);
$target = "../assets/arsip/upload/".basename($thumbnail);

$video = $_FILES['video']['name'];
$ekstensi_video = array('mp4');
$folder = '../assets/arsip/';
$source = $_FILES['video']['tmp_name'];
$ekstensi = strtolower(end(explode('.', $_FILES['video']['name'])));
$ekstensi_ok = in_array($ekstensi, $ekstensi_video, $folder.$video);

if(!($ekstensi_ok)){
    header("Location:tambahcourse.php?pesan-gagal");
}else{
    move_uploaded_file($source, $folder.$video);
    move_uploaded_file($_FILES['thumbnail']['tmp_name'], $target);

    mysqli_query($connection,"INSERT INTO course(id_video, id_user, judul, tanggal,thumbnail, video) values('$id_video','$id_user','$judul','$tanggal','$thumbnail','$video')");
    header("Location: course.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>