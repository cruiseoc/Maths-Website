<?php
session_start();
include_once('connection.php');

// recieves GET request and stores as variable "assignment"
$assignment = $_GET["assignment"];
echo $assignment;

$user = $_SESSION["loggedin"];
echo $user;

// updates complete to "1"

$stmt = $conn->prepare("UPDATE assignmentforuser SET complete = 1 WHERE UserID =:UserID and AssignmentID =:AssignmentID ");
$stmt->bindParam(':AssignmentID', $assignment);
$stmt->bindParam(':UserID', $user);
$stmt->execute();

$conn=null;
?>