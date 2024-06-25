<?php
session_start();
require 'db.php'; // Ensure 'db.php' includes database connection logic

$username = $_POST['username'];
$password = $_POST['password'];

$sql = 'SELECT * FROM users WHERE username = :username';
$stmt = $pdo->prepare($sql);
$stmt->execute(['username' => $username]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['username'] = $username;
    header('Location: index.html');
} else {
    echo 'Invalid username or password';
}
?>
