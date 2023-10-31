

<!DOCTYPE html>
<html>

<head>

<!-- Takes in login information -->

<title> Login </title>
</head>
<body>
            <h1>Log in</h1><br>
            <p>Please enter your credentials to login</p>
       
            <!-- posts the values of "username" and "password" to loginprocess.php to be processed -->
            <form action="loginprocess.php" method= "POST">
            <input type="text" placeholder="Enter username" name="Username"><br>
            <input type="password" placeholder="Enter password" name="password"><br>
            <input type="submit" value="Login"> <br>

            <a href="users.php">Don't have an account? Sign Up</a>
    
            </form>