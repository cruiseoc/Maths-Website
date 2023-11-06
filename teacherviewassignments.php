
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


  </ul>
</div>
        <li class="nav-item">
        <a class="nav-link" href="logout.php">Log out</a>
        </li>
</ul>
    </div>
  </div>
</nav>

<h1> Yours assignments...</h1>

<body>


</html>

<?php

session_start();

include_once('connection.php');

$username = $_SESSION["username"];

$stmt = $conn->prepare("SELECT assignments.AssignmentID,assignments.AssignmentName,assignments.Class,assignments.Date,assignments.Time,assignments.Instructions FROM class
INNER JOIN assignments 
ON assignments.Class=class.Class 
WHERE Username=:Username
ORDER BY AssignmentID DESC;");

$stmt->bindParam(':Username', $username);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
  echo("Title: ".$row["AssignmentName"]." <br> Class: " .$row["Class"]." <br> Due Date: ".$row["Date"]." <br> Due Time: " .$row["Time"]." <br> Instructions: " .$row["Instructions"]."<br><br>");

  echo '<a href="delete.php?assignment='.$row["AssignmentID"].'">Delete<br></a>'; 
  echo '<a href="editassignment.php?assignment='.$row["AssignmentID"].'">Edit<br></a>'; 
  echo '<a href="feedback.php?assignment='.$row["AssignmentID"].'">Show student completion<br><br></a>'; 

}



?>
