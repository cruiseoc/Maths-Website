<?php
session_start();
try {
    include_once('connection.php');
    array_map("htmlspecialchars", $_POST);
    header('Location:assignmentsforuser.php');

    $formattedTime = date("H:i:s", strtotime($_POST["time"]));

    // Insert the assignment data into the table
    $stmt = $conn->prepare("INSERT INTO assignments(AssignmentName, Class, Date, Time, Instructions) VALUES (:AssignmentName, :Class, :Date, :Time, :Instructions)");
    $stmt->bindParam(':AssignmentName', $_POST["assignmentname"]);
    $stmt->bindParam(':Class', $_POST["class"]);
    $stmt->bindParam(':Date', $_POST["date"]);
    $stmt->bindParam(':Time', $formattedTime);
    $stmt->bindParam(':Instructions', $_POST["instructions"]);
    $stmt->execute();

    $_SESSION["Class"]= $_POST["class"];
    

} catch (PDOException $e) {
    echo "error" . $e->getMessage();
}
$conn = null;
?>