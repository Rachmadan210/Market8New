<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi dan sanitasi input sesuai kebutuhan

    // Koneksi ke database (gantilah dengan informasi koneksi database Anda)
    $conn = new mysqli("localhost", "root", "", "toko8");

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query ke database untuk memeriksa keberadaan pengguna
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Pengguna berhasil login
        $_SESSION['username'] = $username;
        header("Location: dashboard.php"); // Ganti dengan halaman setelah login
    } else {
        // Login gagal
        echo "Invalid username or password";
    }

    $conn->close();
}
?>
