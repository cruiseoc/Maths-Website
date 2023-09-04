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

<h1> View Classes</h1>

<body>


</html>

<?php

// starts session variable
session_start();

include_once('connection.php');

// creates a variable called username that is set to the session variable "username"

$username = $_SESSION["username"];

// selects the rows from the table "class" where the usernames are the same

$stmt = $conn->prepare("SELECT * FROM class WHERE Username = :Username");

$stmt->bindParam(':Username', $username);
$stmt->execute();  

// prints out the entire row for any of the selected rows

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
echo("Class Code: ".$row["Class"]." <br> Username: " .$row["Username"]." <br> Subject: ".$row["SubjectName"]."<br><br>");

// creates a link that sends the Class field to viewmembers.php via a GET request
echo '<a href="viewmembers.php? class='.$row["Class"].'">View Members<br><br></a>'; 

}

?>




