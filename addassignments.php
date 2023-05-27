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
        <li><a class="dropdown-item" href="addassignments.php">Add assignments</a></li>
  </ul>
</li>
        
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Manage class</a>
    <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="viewclass.php">View class</a></li>
    <li><a class="dropdown-item" href="removestudentS">Remove student</a></li>
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
<h1>Add assignments:</h1>

<body>

<form action="addusers.php" method="POST">
            <input type="text" placeholder="Enter assignments"  name="assignmenttitle"><br>
            <input type="text" placeholder="enter class code" name="class"><br>
            Time:<select name="gender">
		    <option value="M">00:00</option>
		    <option value="F">00:30</option>
            <option value="F">01:00</option>
            <option value="F">01:30</option>
            <option value="F">02:00</option>
            <option value="F">02:30</option>
            <option value="F">03:00</option>
            <option value="F">03:30</option>
            <option value="F">04:00</option>
            <option value="F">04:30</option>
            <option value="F">05:00</option>
            <option value="F">05:30</option>
            <option value="F">06:00</option>
            <option value="F">06:30</option>
            <option value="F">07:00</option>
            <option value="F">07:30</option>
            <option value="F">08:00</option>
            <option value="F">08:30</option>
            <option value="F">09:00</option>
            <option value="F">09:30</option>
            <option value="F">10:00</option>
            <option value="F">10:30</option>
            <option value="F">11:00</option>
            <option value="F">12:00</option>
            <option value="F">12:30</option>
            <option value="M">01:00</option>
		    <option value="F">01:30</option>
            <option value="F">02:00</option>
            <option value="F">02:30</option>
            <option value="F">03:00</option>
            <option value="F">03:30</option>
            <option value="F">04:00</option>
            <option value="F">04:30</option>
            <option value="F">05:00</option>
            <option value="F">05:30</option>
            <option value="F">06:00</option>
            <option value="F">06:30</option>
            <option value="F">07:00</option>
            <option value="F">07:30</option>
            <option value="F">08:00</option>
            <option value="F">08:30</option>
            <option value="F">09:00</option>
            <option value="F">09:30</option>
            <option value="F">10:00</option>
            <option value="F">10:30</option>
            <option value="F">11:00</option>
            <option value="F">11:30</option>
	        </select>
            <br>

            <input type="submit" value="Sign Up">


</html>
