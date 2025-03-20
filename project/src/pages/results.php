<?php
// Start session to access user data if needed
session_start();

// Get the score and total questions from the query parameters
$score = isset($_GET['score']) ? intval($_GET['score']) : 0;
$total = isset($_GET['total']) ? intval($_GET['total']) : 0;
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/question.css">
    <title>Quiz Results</title>
</head>
<bod>
    <img src="../photos/logo.png" class="logo">
    <h2>Quiz Completed!</h2> <br>
    <h2> Your Score: <strong><?php echo $score; ?></strong> / <?php echo $total; ?></h2><br>
    <a href="leaderboard.php" class="button">View Leaderboard</a>
</body>
</html>