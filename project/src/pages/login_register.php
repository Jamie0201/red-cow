<?php 
session_start();
include 'config.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $checkEmail = $conn->query("SELECT email FROM users WHERE email = '$email'");
    if ($checkEmail === false) {
        die("Error: " . $conn->error);
    }

    if ($checkEmail->num_rows > 0) {
        // Set register error
        $_SESSION['register error'] = 'Email is already registered';
        $_SESSION['active_form'] = 'register';
    } else {    
        $insertUser = $conn->query("INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')");
        if ($insertUser === false) {
            die("Error: " . $conn->error);
        }
    }

    header('location: index.php');
    exit();
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
    if ($result === false) {
        die("Error: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Set the user ID in the session
            $_SESSION['user_id'] = $user['id'];
           
            // Redirect to quiz.php
            header("Location: quiz.php");
            exit(); 
        } else {
            // Set login error for incorrect password
            $_SESSION['login error'] = "Invalid email or password.";
            $_SESSION['active_form'] = 'login';
            header("Location: index.php");
            exit();    
        }
    } else {
        // Set login error for email not found
        $_SESSION['login error'] = "No user found with that email.";
        $_SESSION['active_form'] = 'login';
        header("Location: index.php");
        exit();
    }
}
?>