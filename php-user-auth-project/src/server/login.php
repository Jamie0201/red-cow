<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        echo "Username and password are required.";
        exit;
    }

    $db = connectToDatabase();
    $stmt = $db->prepare("SELECT password FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: ../pages/welcome.html");
            exit;
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that username.";
    }
}
?>