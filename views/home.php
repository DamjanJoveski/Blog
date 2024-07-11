<?php
session_start(); 

$isLoggedIn  = isset($_SESSION["user_id"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <h1>Home Page</h1>
    <p>Welcome <?php echo $_SESSION["user_username"] ?> to the home page.</p>
    <?php 
    if($isLoggedIn){ ?>
        <form action="includes/logout.php" method="POST" class="logout-form">
            <button type="submit" name="logout-submit">Logout</button>
        </form> <?php

    } else { ?>
        <p><a href="?page=register">Register</a> | <a href="?page=login">Login</a></p> <?php
    }
    ?>
    
</body>
</html>
