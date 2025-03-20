<?php
session_start();
include 'config.php'; // Database connection

$query = "SELECT name, score FROM users ORDER BY score DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/question.css">
    <title>Leaderboard</title>
</head>
<body>
    <img src="../photos/logo.png" class="logo">
    <h2>Leaderboard</h2>
    <table class="leaderboard">
        <thead>
            <tr>
                <th>User</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo $row['score']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="index.php" class="button">Back to Login Page!</a>
</body>
</html>