<?php
// Memulai Session
session_start();

// Menghapus Session
session_destroy();

// Mengarahkan ke halaman Index
header("Location: index.php");
exit;

// Hapus cookie jika ada
if(isset($_COOKIE['remember_user'])) {
    $cookie_name = "remember_usaer";
    setcookie($cookie_name, "", time() - 7000000, "/"); // Set expired time to the past
}
?>