<?php
session_start();

// Database connection code (modify it according to your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "toko8";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// User Authentication
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform your authentication here (e.g., query the database)
    // Example query (modify according to your user table structure)
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: index.html"); // Redirect to a dashboard or home page
        exit();
    } else {
        $_SESSION['message'] = "Invalid username or password";
        header("Location: login.html");
        exit();
    }
}

$conn->close();
?>
