<?php
session_start();
$user = $_SESSION["loggedin"];
$username1 = $_SESSION["username"];
include_once('connection.php');
header('Location:joinclasses.php');

try {
    
    
    // Inserts the class code and UserID into the table class 
    $stmt = $conn->prepare("INSERT INTO userinclass(UserID, Class, Username) VALUES (:UserID,:Class,:Username)");
    $stmt->bindParam(':UserID', $user); 
    $stmt->bindParam(':Class', $_POST["class"]);
    $stmt->bindParam(':Username', $username1); 
    $stmt->execute();
    
    $conn = null;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
