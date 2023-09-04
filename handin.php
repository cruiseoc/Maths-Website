<?php
session_start();
include_once('connection.php');

// recieves GET request and stores as variable "assignment"
$assignment = $_GET["assignment"];
echo $assignment;

// updates complete to "1"

$stmt = $conn->prepare("UPDATE assignments SET Complete='1' WHERE AssignmentID=:AssignmentID");
$stmt->bindParam(':AssignmentID', $assignment);
$stmt->execute();
$stmt->closeCursor(); 

$conn=null;
header('Location:viewassignments.php');
?>