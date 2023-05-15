<?php
try{
    include_once('connection.php');
    //print_r($_POST);

    header('Location:users.php');

// inserts the users data into the table 
    
    $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);  //hashes the password
    array_map("htmlspecialchars", $_POST);
    $stmt = $conn->prepare("INSERT INTO users(UserID,Username,Password,Role,Class)VALUES (null,:Username,:Password,:Role,:Class)");
    $stmt->bindParam(':Username', $_POST["username"]);
    $stmt->bindParam(':Password', $hashed_password);
    $stmt->bindParam(':Role', $_POST["role"]);
    $stmt->bindParam(':Class', $_POST["class"]);
    $stmt->execute();

	  }
    catch(PDOException $e)
      {
       echo "error".$e->getMessage();
     }
   $conn=null;
?>
