<?php
session_start();
include_once('connection.php');

// recieves GET request and stores as variable "assignment"
$assignment = $_GET["assignment"];

$stmt = $conn->prepare("DELETE FROM assignments WHERE AssignmentID = :AssignmentID");

$stmt->bindParam(':AssignmentID', $assignment);
$stmt->execute();  

header("Location:teacherviewassignments.php");

?>