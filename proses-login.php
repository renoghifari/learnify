<?php
include('connection.php');
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username='$username'";
    $query = mysqli_query($connection,$sql);

    if (mysqli_num_rows($query) > 0) {
        $user = mysqli_fetch_assoc($query);
        // Verifikasi Password
        if(password_verify($password, $user['password'])) {
            // Jika Remember Me dicentang
            if(isset($_POST['remember'])) {
                $cookie_name = "remember_user";
                $cookie_value = $user['id_user'];
                // Cookie berlaku selama 30 hari
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            }

            // Jika password sesuai, login berhasil
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['username'] = $username;
            if($user['level'] == 'admin') {
            $_SESSION['level'] = 'admin';
            header("Location: index.php");
            } elseif($user['level'] == 'user') {
            $_SESSION['level'] = 'user';
            header("Location: index.php");
            } else {
            echo "<script>alert('Maaf, Anda tidak memiliki akses ke halaman ini.');</script>";
            }
            exit();
        } else {
        // login gagal
        echo "<script>alert('Username atau password salah! Silakan coba lagi.');window.location.href='index.php';</script>";
        }
    } else {
        // login gagal
        echo "<script>alert('Username atau password salah! Silakan coba lagi.');window.location.href='index.php';</script>";
    }

    mysqli_close($connection);
}
?>