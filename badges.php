<!DOCTYPE html>
<html>

<head>

<title> Add badges </title>
</head>

<body>
            <h1>Add badges</h1><br>
            <p>Enter badge information:</p>

        <!-- takes in user's sign up details and POSTs to addusers.php -->
       
            <form action="addbadge.php" method="POST">
            <input type="text" placeholder="enter badge name..."  name="badgename"><br>
            <label for="color">Choose a rarity:</label>
            <select name="rarity">
            <option value="Special">Special</option>
            <option value="Very Rare">Very Rare</option>
            <option value="Rare">Rare</option>
            <option value="Good">Good</option>
            <option value="Common">Common</option>
            </select>
            <br><input type="text" placeholder="enter badge price..." name="price"><br>
            <input type="text" placeholder="enter badge picture..." name="picture"><br>
            <input type="submit" value="Add badge">



        </form>

</body>

<?php

include_once('connection.php');
$stmt = $conn->prepare("SELECT * FROM shop");
$stmt->execute();


?>   
</body>
</html>