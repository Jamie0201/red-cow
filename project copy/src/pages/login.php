<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <div class="form-box active" id="login-form">
        
            <form action="../server/login.php" method="POST">
                <h2>Login</h2>
                <input type="email" name="email" placeholder="email" required>
                <input type="password" name="password" placeholder="password" required>
                <button type="submit" name="login">Login</button>
                <p>Don't have an account? <a href="#" onclick="showForm('register-form')">Register</a></p>
             </form>
        </div>

        <div class="form-box" id="register-form">
            <form action="../server/register.php" method="POST">
                <h2>Register</h2>
                <input type="text" name="name" placeholder="name" required>
                <input type="email" name="email" placeholder="email" required>       
                <input type="password" name="password" placeholder="password" required>
                <select name="role" required>
                    <option value="">--Select Role--</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
                <button type="submit" name="register">Register</button>
                <p>Already have an account? <a href="#" onclick="showForm('login-form')">Login</a>.</p>
            </form>
        </div>
    </div>

    <script src="../JS/script.js"></script>

</body>
</html>