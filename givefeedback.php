<?php
session_start();
$_SESSION["assignment1"] = $_GET["assignment"];
$_SESSION["user1"] = $_GET["user"];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Give feedback</title>
</head>

<body>
    <h1>Give feedback</h1><br>

    <!-- takes in user's sign up details and POSTs to addusers.php -->
    <form action="addfeedback.php" method="POST">
        Result: <input type="text" placeholder="result..." name="result"><br>
        Feedback: <br>
        <textarea rows="5" cols="60" name="feedback"></textarea><br>
        <label for="numberInput">Coins Gained (max 99): </label>
        <input type="number" id="numberInput" name="coins" min="0" max="99" step="1" required><br>
        <input type="submit" value="Give feedback">
    </form>
</body>

<?php
include_once('connection.php');
$stmt = $conn->prepare("SELECT * FROM assignmentforuser");
$stmt->execute();
?>
</html>


