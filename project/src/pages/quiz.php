<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions</title>
    <link rel="stylesheet" href="../css/question.css">
</head>
<body>

<?php
        $answers = [
            "question1" => "a",
            "question2" => "c",
            "question3" => "c",
            "question4" => "b",
            "question5" => "a",
            
        ];

        $score = 0;

        foreach ($answers as $question => $correctAnswer) {
            if (isset($_POST[$question]) && $_POST[$question] === $correctAnswer) {
                $score++;
            }
        }

        echo "<p>Your score: $score / 10</p>";

        foreach ($answers as $question => $correctAnswer) {
            echo "<p>Question: " . substr($question, 1) . " - Correct Answer: $correctAnswer</p>";
        }
    ?>
        




    <header class="header-background">
        <form action="quiz.php" method="post">

        <p>what is the capital of Mexico?</p>
        <input type="radio" name="question1" value="a">a) Mexico City<br>
        <input type="radio" name="question1" value="b">b) New York<br>
        <input type="radio" name="question1" value="c">c) Cancun<br>
        <input type="radio" name="question1" value="d">d) Miami<br>

        <p>what is the capital of France?</p>
        <input type="radio" name="question2" value="a">a) Berlin<br>
        <input type="radio" name="question2" value="b">b) London<br>
        <input type="radio" name="question2" value="c">c) Paris<br>
        <input type="radio" name="question2" value="d">d) Madrid<br>

        <p>what is the largest organ in your body?</p>
        <input type="radio" name="question3" value="a">a) Heart<br>
        <input type="radio" name="question3" value="b">b) Liver<br>
        <input type="radio" name="question3" value="c">c) Skin<br>
        <input type="radio" name="question3" value="d">d) Kidney<br>

        <p>who won the 2018 world cup?</p>
        <input type="radio" name="question4" value="a">a) Brazil<br>
        <input type="radio" name="question4" value="b">b) France<br>
        <input type="radio" name="question4" value="c">c) Germany<br>
        <input type="radio" name="question4" value="d">d) Argentina<br>

        <p>how many bones are in the human body?</p>
        <input type="radio" name="question5" value="a">a) 206<br>
        <input type="radio" name="question5" value="b">b) 309<br>
        <input type="radio" name="question5" value="c">c) 167<br>
        <input type="radio" name="question5" value="d">d) 237<br>

            <button type="submit" name="submit">Submit</button>
           
        </form>

    
    </header>
    <main>
    
    </main>
</body>
</html>