<!DOCTYPE html>
<html>

<head>

<title> View class </title>
</head>

<body>
            <h1>View class</h1><br>
            <p>Please enter your username to view your classes</p>

        <!-- takes in user's username -->
       
        <form action="viewclassesprocess.php" method="POST">
            <input type="text" placeholder="enter username"  name="username"><br>
            <input type="submit" value="Find Classes">



        </form>

</body>

<?php

include_once('connection.php');
$stmt = $conn->prepare("SELECT * FROM class");
$stmt->execute();


?>   
</body>
</html>