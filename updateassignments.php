<?php
session_start();
$assignment = $_SESSION["assignment"];

try {
    include_once('connection.php');
    array_map("htmlspecialchars", $_POST);
    //header('Location:editassignment.php');

    

    $formattedTime = date("H:i:s", strtotime($_POST["time"]));

    // Insert the assignment data into the table
    $stmt = $conn->prepare("UPDATE assignments SET AssignmentName =:AssignmentName, Class =:Class, Date =:Date, Time =:Time, Instructions =:Instructions WHERE AssignmentID =:AssignmentID");
    $stmt->bindValue(':AssignmentName', $_POST["assignmentname"]);
    $stmt->bindValue(':Class', $_POST["class"]);
    $stmt->bindValue(':Date', $_POST["date"]);
    $stmt->bindValue(':Time', $formattedTime);
    $stmt->bindValue(':Instructions', $_POST["instructions"]);
    $stmt->bindValue(':AssignmentID', $assignment);
    
    $stmt->execute();
    

} catch (PDOException $e) {
    echo "error" . $e->getMessage();
}
$conn = null;
?>