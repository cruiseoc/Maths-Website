<html>
<head>
    <title> View classes </title>

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
    <li><a class="dropdown-item" href="studentviewclasses.php">View classes</a></li>
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

<h1>View your classes</h1>

<body>


</html>

<?php

session_start();

include_once('connection.php');

// sets the variable username 1 to the session variable "username"

$username1 = $_SESSION["username"];

// selects all from userinclass where the username 1 variable is the same as the username in the table.

$stmt = $conn->prepare("SELECT * FROM userinclass WHERE Username= :Username");

$stmt->bindParam(':Username', $username1);
$stmt->execute();  

$row = $stmt->fetch(PDO::FETCH_ASSOC);
$class = $row["Class"];

// selects from class where the class from the userinclass table is the same as the class in the class table.


$stmt = $conn->prepare("SELECT * FROM class WHERE Class = :Class");

$stmt->bindParam(':Class', $row['Class']);
$stmt->execute();  

// prints the selected row

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
echo("Class: ".$row["Class"]." <br> Username: " .$row["Username"]." <br> SubjectName: ".$row["SubjectName"]."<br>");
echo '<a href="viewmembers.php? class='.$row["Class"].'">View Members<br><br></a>'; 

}


?>