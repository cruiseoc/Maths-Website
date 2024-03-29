<?php
session_start();
include_once('connection.php');
header("Location:assignments.php");

$class = $_SESSION["Class"];

$stmt = $conn->prepare("SELECT * FROM assignments ORDER BY AssignmentID DESC LIMIT 1;");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$assignment = $result["AssignmentID"];
echo $assignment;


$stmt1 = $conn->prepare("SELECT * FROM userinclass  WHERE Class = :Class");
$stmt1->bindParam(':Class', $class);
$stmt1->execute();

while ($row = $stmt1->fetch(PDO::FETCH_ASSOC))
{
    $user = $row["UserID"];
    $feedback = "n/a";
    $FeedbackGiven = "0";
    echo $user;
    $stmt2 = $conn->prepare("INSERT INTO assignmentforuser(AssignmentUser,AssignmentID,UserID,Feedback,FeedbackGiven) VALUES (null,:AssignmentID,:UserID,:Feedback,:FeedbackGiven)");
    $stmt2->bindParam(':AssignmentID', $assignment);
    $stmt2->bindParam(':UserID', $user);
    $stmt2->bindParam(':Feedback', $feedback);
    $stmt2->bindParam(':FeedbackGiven', $FeedbackGiven);
    $stmt2->execute();
    

}

