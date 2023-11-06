<?php
session_start();
include_once('connection.php');

$assignment1 = $_SESSION["assignment1"];
$user1 = $_SESSION["user1"];

$stmt = $conn->prepare("SELECT * FROM users WHERE UserID = :UserID");
$stmt->bindParam(':UserID', $user1);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$coins = $row["Coins"];
$FeedbackGiven = "1";

$stmt1 = $conn->prepare("UPDATE assignmentforuser SET Result = :Result, Feedback = :Feedback, FeedbackGiven =:FeedbackGiven, CoinsGained = :CoinsGained WHERE UserID = :UserID and AssignmentID = :AssignmentID");
$stmt1->bindParam(':Result', $_POST["result"]);
$stmt1->bindParam(':Feedback', $_POST["feedback"]);
$stmt1->bindParam(':FeedbackGiven', $FeedbackGiven);
$stmt1->bindParam(':CoinsGained', $_POST["coins"]);
$stmt1->bindParam(':AssignmentID', $assignment1);
$stmt1->bindParam(':UserID', $user1);
$stmt1->execute();

$coins1 = ($coins + $_POST["coins"]);
echo $coins;
echo $_POST["coins"];
echo $coins1;

$stmt2 = $conn->prepare("UPDATE users SET Coins = :Coins WHERE UserID = :UserID");
$stmt2->bindParam(':Coins', $coins1);
$stmt2->bindParam(':UserID', $user1);
$stmt2->execute();

header("Location:givefeedback.php");

$conn = null;
?>






