<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once 'dbh.inc.php'; 

    $title = htmlspecialchars($_POST["blog-title"]);
    $content = htmlspecialchars($_POST["blog-content"]);
    $author = $_SESSION["user_username"];
    $user_id = $_SESSION["user_id"];

    $query = "INSERT INTO posts (title, content, author, users_id) VALUES (:title, :content, :author, :users_id)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':users_id', $user_id);

    $stmt->execute();
    
    header("Location: ../index.php");
    exit();
} else {
    header("Location: ../index.php");
    exit();
}
