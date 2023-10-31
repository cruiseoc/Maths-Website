<?php
try{

    include_once('connection.php');
    session_start();   //starts session variable
    header('Location:viewclasses.php');

    $username = $_SESSION["username"];    // sets the variable "username" to the session variable "username"
    $user = $_SESSION["loggedin"];      // sets the variable "user" to the session variable "loggedin", which holds the userID



// inserts the class information into the class table
    
    array_map("htmlspecialchars", $_POST);
    $stmt = $conn->prepare("INSERT INTO class(Class,SubjectName,Username)VALUES (null,:SubjectName,:Username)");
    $stmt->bindParam(':SubjectName', $_POST["subjectname"]);
    $stmt->bindParam(':Username', $username);
    $stmt->execute();


	  }
    catch(PDOException $e)
      {
       echo "error".$e->getMessage();
     }
   $conn=null;
?>