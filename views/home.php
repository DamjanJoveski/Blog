<?php
session_start(); 

$isLoggedIn  = isset($_SESSION["user_id"]);

require_once "includes/dbh.inc.php";

function get_posts() {
    global $pdo; 

    $query = "SELECT * FROM posts";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

$myPosts = get_posts();

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
        </form>
        <form class="myblogs-form">
            <a href="?page=myBlogs" type="submit" name="myBlogs">My Blogs</a>
        </form>
        <div class="blogs"> <?php
        if(!empty($myPosts)){
            foreach ($myPosts as $post) { ?>
                <div class="blog-post">
                    <?php
                echo "<h2>{$post['title']}</h2>";
                echo "<p>{$post['content']}</p>";
                echo "<p>Author: {$post['author']}</p>";
                 ?>
                </div>
                <?php
            }
        } else {
            echo "<h2>No posts found</h2>";
        } ?>
        </div>
        <?php
    } else { ?>
        <p>Please login or register to view and write blogs</p>
        <p><a href="?page=register">Register</a> | <a href="?page=login">Login</a></p> <?php
    }
    ?>
</body>
</html>
