<?php
include('connection.php');
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM user WHERE username='$username'";
    $query = mysqli_query($connection,$sql);
    
    if(mysqli_num_rows($query) > 0){
        echo "Username sudah terdaftar. Silakan gunakan username lain.";
        exit;
    }

    if($user = mysqli_fetch_assoc($query)){
        // Jika Remember Me dicentang
        if(isset($_POST['remember'])) {
            $cookie_name = "remember_user";
            $cookie_value = $user['id_user'];
            // Cookie berlaku selama 30 hari
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
        }

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
    }
    
    // Hash password sebelum disimpan ke database
    $password = password_hash($password, PASSWORD_BCRYPT);
    
    // Simpan data pengguna ke dalam tabel "users"
    $query = "INSERT INTO user (username, password) VALUES ( '$username', '$password' )";
    if (mysqli_query($connection, $query)) {
        echo "<script>alert('Pendaftaran Berhasil, mohon untuk login ulang');window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
    
    mysqli_close($connect);
}
?>