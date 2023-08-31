<?php
try{
    include_once('connection.php');
    print_r($_POST);

    //header('Location:createclass.php');


// inserts the class information into the class table
    
    array_map("htmlspecialchars", $_POST);
    $stmt = $conn->prepare("INSERT INTO class(Class,SubjectName,Username)VALUES (null,:SubjectName,:Username)");
    $stmt->bindParam(':SubjectName', $_POST["subjectname"]);
    $stmt->bindParam(':Username', $_POST["username"]);
    $stmt->execute();

	  }
    catch(PDOException $e)
      {
       echo "error".$e->getMessage();
     }
   $conn=null;
?>