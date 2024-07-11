<?php
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: ?page=login"); 
        exit(); 
    }

    require_once "includes/dbh.inc.php";

    function get_posts() {
        global $pdo; 

        $query = "SELECT * FROM posts WHERE users_id = :u_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":u_id", $_SESSION['user_id']);
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
    <title>My Blogs</title>
    <link rel="stylesheet" href="myBlogs.css">
</head>
<body>
    <div class="container">
        <section class="blogs">
            <h2>My Blogs</h2>
            <form action="includes/logout.php" method="POST" class="logout-form">
            <button type="submit" name="logout-submit">Logout</button>
            </form>
             <?php 
                if(!empty($myPosts)){
                    foreach ($myPosts as $post) { ?>
                        <div class="blog-post">
                            <?php
                        echo "<h2>{$post['title']}</h2>";
                        echo "<p>{$post['content']}</p>";
                        echo "<p>{$post['author']}</p>";
                         ?>
                        </div>
                        <?php
                    }
                } else {
                    echo "<h2>You haven't posted anything yet</h2>";
                }
             ?>
        </section>
        <section class="create-blog">
            <h2>Create New Blog</h2>
            <form action="includes/create_new_blog.php" method="POST">
                <label for="blog-title">Title:</label>
                <input type="text" id="blog-title" name="blog-title" required>

                <label for="blog-content">Content:</label>
                <textarea id="blog-content" name="blog-content" rows="4" required></textarea>

                <input type="submit" value="Create Blog">
            </form>
        </section>
    </div>

</body>
</html>


