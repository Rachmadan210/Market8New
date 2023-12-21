<?php
session_start();
require_once('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan sanitasi input sesuai kebutuhan

    // Query untuk memeriksa keberadaan username dan password di database
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login berhasil, set session atau tindakan lainnya
        $_SESSION['username'] = $username;
        header("Location: index.html"); // Ganti dengan halaman selamat datang setelah login
    } else {
        // Login gagal
        echo "Invalid username or password";
    }
} else {
    // Jika bukan metode POST, redirect ke halaman login
    header("Location: login.html");
}

$conn->close();
?>
