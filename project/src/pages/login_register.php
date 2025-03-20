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
        $_SESSION['register error'] = 'Email is already registered';
        $_SESSION['active form'] = 'register';
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
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            
           // Debugging output
           echo "<script>console.log('Redirecting to quiz.php');</script>";
            
           // Redirect to quiz.php
           header("Location: quiz.php");
           exit(); 
         }
        }
    }
   
    $_SESSION['login error'] = 'Email or password is incorrect';
    $_SESSION['active form'] = 'login';
    header('location: ../index.php');
    exit();

