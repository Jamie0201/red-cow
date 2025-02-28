<?php       

session_start();
require_once 'config.php';

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $checkEmail = $conn->query("SELECT email FROM users WHERE email = '$email'");
    if ($checkEmail->num_rows > 0) {
        $_SESSION['register error'] = 'Email is already registered';
        $_SESSION['active form'] = 'register';

    } else {    
        $conn->query("INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')");
    }

    header('location: ../index.php');
    exit();


}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];

            if ($user['role'] === 'admin') {
                header('location: ../leaderboard.php');

            } else {
                header('location: ../quiz.php');
           
            }
            exit();
        }
    }
   
    $_SESSION['login error'] = 'Email or password is incorrect';
    $_SESSION['active form'] = 'login';
    header('location: ../index.php');
    exit();
    
}

?>