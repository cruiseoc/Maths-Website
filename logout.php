
<?php

// ends session variables


session_start();
if(isset($_SESSION['loggedin']))
{
    unset($_SESSION['loggedin']);
}

if(isset($_SESSION['username']))
{
    unset($_SESSION['userame']);
}

header('Location:menu1.php');  // branches back to home page, original home page


?>  
