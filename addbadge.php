
<?php
try{
    include_once('connection.php');
    print_r($_POST);

    //header('Location:badges.php');

    
    // inserts the users data into the table 
    
    array_map("htmlspecialchars", $_POST);
    $stmt = $conn->prepare("INSERT INTO shop(BadgeID,BadgeName,Price,Picture,Rarity)VALUES (null,:BadgeName,:Price,:Picture,:Rarity)");
    $stmt->bindParam(':BadgeName', $_POST["badgename"]);
    $stmt->bindParam(':Price', $_POST["price"]);
    $stmt->bindParam(':Picture', $_POST["picture"]);
    $stmt->bindParam(':Rarity', $_POST["rarity"]);
    $stmt->execute();

    // closes connection to the database
	  }
    catch(PDOException $e)
      {
       echo "error".$e->getMessage();
     }
   $conn=null;
?>
