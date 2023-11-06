<?php
session_start();
include_once('connection.php');

$stmt = $conn->prepare("SELECT * FROM assignments");
$stmt->execute();

$_SESSION["assignment"] = $_GET["assignment"];
echo $_SESSION["assignment"];

$stmt1 = $conn->prepare("SELECT * FROM assignments WHERE AssignmentID = :AssignmentID");
$stmt1->bindParam(':AssignmentID', $_GET["assignment"]);
$stmt1->execute();  

$row = $stmt1->fetch(PDO::FETCH_ASSOC);

$assignmentName = $row['AssignmentName'];
$class = $row['Class'];
$date = $row['Date'];
$time1 = $row['Time'];
$instructions = $row['Instructions'];

$time = date("H:i", strtotime($time1));


?>


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
        <li><a class="dropdown-item" href="addassignments.php">Add assignments</a></li>
  </ul>
</li>
        
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Classes</a>
    <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="createclass.php">Create class</a></li>
    <li><a class="dropdown-item" href="viewclasses.php">View class</a></li>
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
<br>

<!-- Takes in assignment information (e.g. time, date, instructions etc) -->

<h1>Edit assignments:</h1>

<body>

<form action="updateassignments.php" method="POST">
            <input type="text" placeholder="Enter assignment title" name="assignmentname" value="<?php echo $assignmentName; ?>"><br>
            <input type="text" placeholder="Enter class code" name="class" value="<?php echo $class; ?>"><br>
            Time:<select name="time">
		    <option value="00:00" <?php if ($time === "00:00") echo 'selected'; ?>>00:00</option>
		    <option value="00:30" <?php if ($time === "00:30") echo 'selected'; ?>>00:30</option>
            <option value="01:00" <?php if ($time === "01:00") echo 'selected'; ?>>01:00</option>
            <option value="01:30" <?php if ($time === "01:30") echo 'selected'; ?>>01:30</option>
            <option value="02:00" <?php if ($time === "02:00") echo 'selected'; ?>>02:00</option>
            <option value="02:30" <?php if ($time === "02:30") echo 'selected'; ?>>02:30</option>
            <option value="03:00" <?php if ($time === "03:00") echo 'selected'; ?>>03:00</option>
            <option value="03:30" <?php if ($time === "03:30") echo 'selected'; ?>>03:30</option>
            <option value="04:00" <?php if ($time === "04:00") echo 'selected'; ?>>04:00</option>
            <option value="04:30" <?php if ($time === "04:30") echo 'selected'; ?>>04:30</option>
            <option value="05:00" <?php if ($time === "05:00") echo 'selected'; ?>>05:00</option>
            <option value="05:30" <?php if ($time === "05:30") echo 'selected'; ?>>05:30</option>
            <option value="06:00" <?php if ($time === "06:00") echo 'selected'; ?>>06:00</option>
            <option value="06:30" <?php if ($time === "06:30") echo 'selected'; ?>>06:30</option>
            <option value="07:00" <?php if ($time === "07:00") echo 'selected'; ?>>07:00</option>
            <option value="07:30" <?php if ($time === "07:30") echo 'selected'; ?>>07:30</option>
            <option value="08:00" <?php if ($time === "08:00") echo 'selected'; ?>>08:00</option>
            <option value="08:30" <?php if ($time === "08:30") echo 'selected'; ?>>08:30</option>
            <option value="09:00" <?php if ($time === "09:00") echo 'selected'; ?>>09:00</option>
            <option value="09:30" <?php if ($time === "09:30") echo 'selected'; ?>>09:30</option>
            <option value="10:00" <?php if ($time === "10:00") echo 'selected'; ?>>10:00</option>
            <option value="10:30" <?php if ($time === "10:30") echo 'selected'; ?>>10:30</option>
            <option value="11:00" <?php if ($time === "11:00") echo 'selected'; ?>>11:00</option>
            <option value="11:30" <?php if ($time === "11:30") echo 'selected'; ?>>11:30</option>
            <option value="12:00" <?php if ($time === "12:00") echo 'selected'; ?>>12:00</option>
            <option value="12:30" <?php if ($time === "12:30") echo 'selected'; ?>>12:30</option>
            <option value="13:00" <?php if ($time === "13:00") echo 'selected'; ?>>13:00</option>
		    <option value="13:30" <?php if ($time === "13:30") echo 'selected'; ?>>13:30</option>
            <option value="14:00" <?php if ($time === "14:00") echo 'selected'; ?>>14:00</option>
            <option value="14:30" <?php if ($time === "14:30") echo 'selected'; ?>>14:30</option>
            <option value="15:00" <?php if ($time === "15:00") echo 'selected'; ?>>15:00</option>
            <option value="15:30" <?php if ($time === "15:30") echo 'selected'; ?>>15:30</option>
            <option value="16:00" <?php if ($time === "16:00") echo 'selected'; ?>>16:00</option>
            <option value="16:30" <?php if ($time === "16:30") echo 'selected'; ?>>16:30</option>
            <option value="17:00" <?php if ($time === "17:00") echo 'selected'; ?>>17:00</option>
            <option value="17:30" <?php if ($time === "17:30") echo 'selected'; ?>>17:30</option>
            <option value="18:00" <?php if ($time === "18:00") echo 'selected'; ?>>18:00</option>
            <option value="18:30" <?php if ($time === "18:30") echo 'selected'; ?>>18:30</option>
            <option value="19:00" <?php if ($time === "19:00") echo 'selected'; ?>>19:00</option>
            <option value="19:30" <?php if ($time === "19:30") echo 'selected'; ?>>19:30</option>
            <option value="20:00" <?php if ($time === "20:00") echo 'selected'; ?>>20:00</option>
            <option value="20:30" <?php if ($time === "20:30") echo 'selected'; ?>>20:30</option>
            <option value="21:00" <?php if ($time === "21:00") echo 'selected'; ?>>21:00</option>
            <option value="21:30" <?php if ($time === "21:30") echo 'selected'; ?>>21:30</option>
            <option value="22:00" <?php if ($time === "22:00") echo 'selected'; ?>>22:00</option>
            <option value="22:30" <?php if ($time === "22:30") echo 'selected'; ?>>22:30</option>
            <option value="23:00" <?php if ($time === "23:00") echo 'selected'; ?>>23:00</option>
            <option value="23:30" <?php if ($time === "23:30") echo 'selected'; ?>>23:30</option>
	        </select>
            <br>
            <label for="start">Due date:</label>
            <input type="date" id="start" name="date" value="<?php echo $date; ?>" min="2018-01-01" max="2028-12-31">
            <br>
            Instructions <br>
            <textarea rows="5" cols="60" name="instructions"><?php echo $instructions; ?></textarea>
            <br>
            </textarea><br>

            <input type="submit" value="Update">



</html>