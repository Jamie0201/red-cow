<?php
session_start();
include 'config.php'; // Database connection
if(!isset($_SESSION['name'])) {
    header("location: login_register.php");
    exit();
}   

// If the user is starting a new quiz, reset session data
if (!isset($_SESSION['question_index'])) {
    $_SESSION['question_index'] = 0;
    $_SESSION['score'] = 0;
}

// Fetch all questions
$query = "SELECT * FROM questions";
$result = mysqli_query($conn, $query);
$questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
$total_questions = count($questions);

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['answer'])) {
        $current_question = $questions[$_SESSION['question_index']];
        
        // Check if the answer is correct
        if ($_POST['answer'] == $current_question['correct_option']) {
            $_SESSION['score']++;
        }
        
        $_SESSION['question_index']++;
    }
}

// If quiz is completed, save results to database
if ($_SESSION['question_index'] >= $total_questions) {
    $score = $_SESSION['score'];

    // Debugging: Check session variables
    if (!isset($_SESSION['user_id'])) {
        die("Error: User ID is not set in the session.");
    }
    
    // Update the user's score in the database
    $stmt = $conn->prepare("UPDATE users SET score = score + ? WHERE id = ?");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
    
    $bind = $stmt->bind_param("ii", $score, $_SESSION['user_id']);
    if ($bind === false) {
        die('Bind failed: ' . htmlspecialchars($stmt->error));
    }
    
    $exec = $stmt->execute();
    if ($exec === false) {
        die('Execute failed: ' . htmlspecialchars($stmt->error));
    }
    
    $stmt->close();
    
    session_destroy(); // Reset quiz session
      // Redirect to results page
      header("Location: results.php?score=$score&total=$total_questions");
      exit();
}

// Display the current question
$current_question = $questions[$_SESSION['question_index']];
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/question.css">
    <title>Quiz</title>
</head>

<body>
    <img src="../photos/logo.png" class="logo">
<h2>Question: <?php echo $current_question['question']; ?> <?php echo $_SESSION['question_index'] + 1; ?> / <?php echo $total_questions; ?></h2>
    <form method="POST">
        <div class="radio-group">
            <div>
                <input type="radio" id="answerA" name="answer" value="a" required>
                <label for="answerA"><?php echo $current_question['option_a']; ?></label>
            </div>
            <div>
                <input type="radio" id="answerB" name="answer" value="b" required>
                <label for="answerB"><?php echo $current_question['option_b']; ?></label>
            </div>
        </div>
        <div class="radio-group">
            <div>
                <input type="radio" id="answerC" name="answer" value="c" required>
                <label for="answerC"><?php echo $current_question['option_c']; ?></label>
            </div>
            <div>
                <input type="radio" id="answerD" name="answer" value="d" required>
                <label for="answerD"><?php echo $current_question['option_d']; ?></label>
            </div>
        </div>
        <button type="submit">Next</button>
    </form>

    <script src="../JS/script.js"></script>


</body>
</html>
