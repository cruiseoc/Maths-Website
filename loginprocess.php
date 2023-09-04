<?php

// checks that uersname and password inputted is the same as the data in the table

session_start();
include_once ("connection.php");     //connects to database

array_map("htmlspecialchars", $_POST);
$stmt = $conn->prepare("SELECT * FROM users WHERE Username =:username ;" );

$stmt->bindParam(':username', $_POST['Username']);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{ 
    $hashed = $row['Password'];
    $attempt = $_POST['password'];
    echo($attempt);
    echo($hashed."<br>");
    echo(password_verify($attempt,$hashed));
    if(password_verify($attempt,$hashed)) {  // this checks the hash of the inputted password against the hash of the actual password in the database

        echo('login sucessful');
        $_SESSION["loggedin"]=$row["UserID"];
        $_SESSION["username"]=$row["Username"];
        $role = $row['Role'];
        if($role=="0"){
            header("Location:studentmenu.php");  // if role = 0 (student) branch to student home
        
        }elseif ($role=="1") {
            header("Location:teachermenu.php");    // if role = 1 (teacher) branch to teacher home
        
        }else{
            header("Location:adminmenu.php");   // if role is not 1 or 2, branch to admin home

        }
        

    }else{
        echo('incorrect password');
        header("Location: login.php");
    }
}

$conn=null;   // closes connection to database to prevent errors and ensure security

?>


