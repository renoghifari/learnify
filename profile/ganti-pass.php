<?php

include "../connection.php";
session_start();

$password_lama = md5($_POST['pass_lama']);

$username = $_POST['username'];

$tampil = mysqli_query($connection, "SELECT * FROM user WHERE 
                                username = '$username' and password = '$password_lama'");
$data = mysqli_fetch_array($tampil);
if ($data) {
    $password_baru = $_POST['pass_baru'];
    $konfirmasi_password = $_POST['konfirmasi_pass'];

    if ($password_baru == $konfirmasi_password) {
        $pass_ok = md5($konfirmasi_password);
        $ubah = mysqli_query($connection, "UPDATE user set password = '$pass_ok'  
                                        WHERE id_user = '$data[id_user]' ");
        if ($ubah) {
            echo "<script>alert('Password anda berhasil diubah, silahkan logout untuk menguji password baru anda.!');document.location='profile.php'</script>";
        }
    } else {
        echo "<script>alert('Maaf, Password Baru & Konfirmasi password yang anda inputkan tidak sama!');document.location='profile.php'</script>";
    }
} else {
    echo "<script>alert('Maaf, Password lama anda tidak sesuai/tidak terdaftar!');document.location='profile.php'</script>";
}
