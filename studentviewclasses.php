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
    <a class="navbar-brand" href="studentmenu.php"><img src="https://www.mtsac.edu/asac/images/templogo_math.png" alt="Girl in a jacket"  width="70" height="55"></a>
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
        <li><a class="dropdown-item" href="pastassignments.php">View past assignments</a></li>
  </ul>
</li>
        
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Classes</a>
    <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="joinclasses.php">Join class</a></li>
    <li><a class="dropdown-item" href="studentviewclasses.php">View classes</a></li>
  </ul>
</li>
</li>
        
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Shop</a>
    <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="viewshop.php">View Shop</a></li>
  </ul>
</li>
</ul>
Coins: 

<?php 
session_start();
include_once('connection.php');
$user = $_SESSION["loggedin"];

$stmt1 = $conn->prepare("SELECT * FROM users  WHERE UserID = :UserID");
$stmt1->bindParam(':UserID', $user);
$stmt1->execute();
$row = $stmt1->fetch(PDO::FETCH_ASSOC);
$coins = $row["Coins"];
echo $coins;

?>

</div>
        <li class="nav-item">
        <a  <?php echo $coins ?>>
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


include_once('connection.php');

$user = $_SESSION["loggedin"];


$stmt = $conn->prepare("SELECT class.SubjectName,class.Username,class.Class FROM userinclass
INNER JOIN class 
ON class.Class=userinclass.Class 
WHERE UserID=:UserID");

$stmt->bindParam(':UserID', $user);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
        echo("Subject: ".$row["SubjectName"]."<br> Class Code: ".$row["Class"]."<br> Teacher: ".$row["Username"]."<br><br>");
        echo '<a href="viewmembers.php? class='.$row["Class"].'">View Members<br><br></a>'; 


}






  
  







?>