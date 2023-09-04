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

<h1>View Members</h1>

<body>


</html>


<?php
session_start();

$class = $_GET["class"];

echo "Class ", $class,"<br><br>" ;

include_once('connection.php');

// selects all from userinclass where the class variable is the same as the class field in the table

$stmt = $conn->prepare("SELECT * FROM userinclass WHERE Class = :Class");

$stmt->bindParam(':Class', $class);
$stmt->execute();  

// prints the members

echo "Members:";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{

echo("<br>".$row["Username"]."");

}


?>

