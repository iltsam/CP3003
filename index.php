<?php include("dbconnect.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="res/mainstyles.css">
    <title>ABCorD - Home</title>
</head>
<body>
    <div class="container" id="container">
        <header id="banner">
            <h1 class="title">Operation Fun Learning</h1>
        </header>
        <nav id="navBar">
            <a class="navButton" href="index.php">Home</a>
            <a class="navButton" href="results.php">Results</a>
            <?php
            if (!isset($_SESSION['account_type'])){
                echo "<a class='navButton' href='sign_up.php'>Sign Up</a>";
                echo "<a class='navButton' href='login.php'>Login</a>";
            } else {
                echo "<a class='navButton' href='game.php'>Play Now!</a>";
                echo "<a class='navButton' href='logout.php'>Logout</a>";
            }
            ?>
        </nav>
        <div class="contentContainer">
            <h1>
                About Us
            </h1>
            <p>The project title is Operation Fun Learning.
                The project is a ‘Who wants to be a Millionaire’ type game, where the user is posed a multiple choice question and has to choose from answers A, B, C or D.
                The objective of this project is to create a small game that can be played for 15 minutes by high school students with some spare time or as a fun learning tool provided by teachers to students to assist learning.</p>
            <p>This project has been selected as small learning tool for teenagers, in a game type format. Teachers can use this game as a type of quiz for the students when learning new content and refreshing old content. This also gives the teacher the opportunity to offer rewards for the best performing students, which would make the students try harder. </p>
            <p>This project will be an important tool for teachers to help provide fun learning content for the students. This will in turn allow the students to learn new content in a fun environment. This game type learning format also allows the teacher to offer prizes for the student who gets the most answers correct. This type of incentive encourages the students to try harder and learn the content quicker. “Student learning will occur in proportion to the effort that a student puts into learning.” (ACS). Teachers will be able to create small competitions using the game that will incentivise learning. The game will also allow teachers to see where a student is up to, and how they are coming along with the course.</p>
        </div>
        <footer>
            <div class="footer">
                <h3>Contact Us</h3>
                <ul>
                    <li>Email: Email@Email.com</li>
                    <li>Ph. 0400 000 000</li>
                </ul>
            </div>
        </footer>
    </div>
</body>
</html>