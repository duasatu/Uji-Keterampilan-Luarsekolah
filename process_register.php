<?php
require 'db.php'; // Ensure 'db.php' includes database connection logic

$username = $_POST['username'];
$password = $_POST['password'];

// Hash the password before saving it to the database
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = 'INSERT INTO users (username, password) VALUES (:username, :password)';
$stmt = $pdo->prepare($sql);

try {
    $stmt->execute(['username' => $username, 'password' => $hashed_password]);
    echo 'Registration successful. <a href="login.html">Login here</a>';
} catch (PDOException $e) {
    if ($e->getCode() == 23000) { // Integrity constraint violation: 1062 Duplicate entry
        echo 'Username already exists. <a href="register.html">Try again</a>';
    } else {
        throw $e; // Throw other PDO exceptions for debugging purposes
    }
}
?>
