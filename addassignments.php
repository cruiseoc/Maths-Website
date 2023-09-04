<?php
try{
    include_once('connection.php');
    //print_r($_POST);

    header('Location:teacherviewassignments.php');


// inserts the assignment data into the table 
    
    array_map("htmlspecialchars", $_POST);
    $stmt = $conn->prepare("INSERT INTO assignments(AssignmentID,AssignmentName,Class,Date,Time,Instructions)VALUES (null,:AssignmentName,:Class,:Date,:Time,:Instructions)");
    $stmt->bindParam(':AssignmentName', $_POST["assignmentname"]);
    $stmt->bindParam(':Class', $_POST["class"]);
    $stmt->bindParam(':Date', $_POST["date"]);
    $stmt->bindParam(':Time', $_POST["time"]);
    $stmt->bindParam(':Instructions', $_POST["instructions"]);
    $stmt->execute();

	  }
    catch(PDOException $e)
      {
       echo "error".$e->getMessage();
     }
   $conn=null;
?>
