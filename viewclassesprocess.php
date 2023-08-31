<?php


//print_r($_POST);

include_once('connection.php');
session_start();

array_map("htmlspecialchars", $_POST);
$stmt = $conn->prepare("SELECT * FROM class WHERE Username =:username");


$stmt->bindParam(':username', $_POST['Username']);
$stmt->execute();  

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
echo($row["Class"]." " .$row["Username"]." ".$row["SubjectName"]."<br>");

}

?>

