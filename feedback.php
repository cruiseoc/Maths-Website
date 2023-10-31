<!DOCTYPE html>
<html>

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
        <li><a class="dropdown-item" href="teacherviewassignments.php">View assignments</a></li>
        <li><a class="dropdown-item" href="assignments.php">Add assignments</a></li>
  </ul>
</li>
        
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Classes</a>
    <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="createclass.php">Create class</a></li>
    <li><a class="dropdown-item" href="viewclasses.php">View classes</a></li>
  </ul>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Feedback</a>
    <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="feedback.php">Give feedback</a></li>

  </ul>
</div>
        <li class="nav-item">
        <a class="nav-link" href="logout.php">Log out</a>
        </li>
</ul>
    </div>
  </div>
</nav>

<?php

session_start();

include_once('connection.php');
$_SESSION["assignment"] = $_GET["assignment"];

$stmt = $conn->prepare("SELECT * FROM assignmentforuser WHERE AssignmentID = :AssignmentID");
$stmt->bindParam(':AssignmentID', $_SESSION["assignment"]);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{

    $complete = $row["Complete"];

    if($complete=="1"){
        $complete1="Complete";
    }else{
        $complete1="Not Complete";
    }

    $user = $row["UserID"];

    $stmt1 = $conn->prepare("SELECT * FROM users WHERE UserID = :UserID");
    $stmt1->bindParam(':UserID', $user);
    $stmt1->execute();
    $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);


    echo("Username: ".$row1["Username"]." <br> Complete: " .$complete1." <br><br>");
    echo '<a href="givefeedback.php?assignment='.$row["AssignmentID"].'">Show student completion<br><br></a>'; 

}

