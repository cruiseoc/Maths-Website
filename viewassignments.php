
<html>
<head>
    <title> Menu </title>

    <!-- Latest compiled and minified CSS --> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<head>

<body>



<nav class="navbar navbar-expand-sm navbar-primary bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="teachermenu.php"><img src="https://www.mtsac.edu/asac/images/templogo_math.png" alt="Girl in a jacket"  width="70" height="55"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Assignments</a>
        <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#"></a></li>
        <li><a class="dropdown-item" href="viewassignments.php">View assignments</a></li>
  </ul>
</li>
        
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Classes</a>
    <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="joinclasses.php">Join class</a></li>
    <li><a class="dropdown-item" href="viewclasses.php">View classes</a></li>
  </ul>
</li>

  </ul>
</div>
        <li class="nav-item">
        <a class="nav-link" href="logout.php">Log out</a>
        </li>
</ul>
    </div>
  </div>
</nav>

<h1>Your assignments:</h1>

<body>


</html>


<?php

session_start();

include_once('connection.php');

$user = $_SESSION["loggedin"];

$stmt = $conn->prepare("SELECT * FROM userinclass WHERE UserID = :UserID");

$stmt->bindParam(':UserID', $user);
$stmt->execute();  

$row = $stmt->fetch(PDO::FETCH_ASSOC);
$class = $row["Class"];


$stmt = $conn->prepare("SELECT * FROM assignments WHERE Class = :Class");

$stmt->bindParam(':Class', $row['Class']);
$stmt->execute();

// prints each assignment


while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
$assignment = $row["AssignmentID"];

$stmt = $conn->prepare("SELECT * FROM assignments WHERE AssignmentID = :AssignmentID");

$stmt->bindParam(':AssignmentID', $assignment);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
$complete = $row["Complete"];
echo $complete;


if($complete=="0"){
    echo("Title: ".$row["AssignmentName"]." <br> Class: " .$row["Class"]." <br> Due Date: ".$row["Date"]." <br> Due Time: " .$row["Time"]." <br> Instructions: " .$row["Instructions"]."<br><br>");

    // uses a GET request to send the assignmentID to the handin.php page
    echo '<a href="handin.php? assignment='.$row["AssignmentID"].'">Hand In<br><br></a>'; 
}
}

?>
