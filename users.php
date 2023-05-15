<!DOCTYPE html>
<html>

<head>

<title> Sign Up </title>
</head>
<body>
            <h1>Sign up</h1><br>
            <p>Please enter your credentials to sign up</p>

        <!-- takes in user's sign up details -->
       
        <form action="addusers.php" method="POST">
            <input type="text" placeholder="create a username"  name="username">
            <input type="password" placeholder="create a password" name="password"><br>
            <input type="radio" name="role" value="0" checked> Pupil<br>
            <input type="radio" name="role" value="1" checked> Teacher<br>
            <input type="radio" name="role" value="2" checked> Admin<br>
            <input type="text" placeholder="enter class code" name="class"><br>
            <input type="submit" value="Sign Up">


        </form>

        <a href="login.php">Already have an account? Login</a>
</body>

<?php

include_once('connection.php');
$stmt = $conn->prepare("SELECT * FROM users");
$stmt->execute();


?>   
</body>
</html>