<?php
session_start();
require_once "dbh.inc.php"; 

if (isset($_POST['delete-submit'])) {
    $post_id = $_POST['post_id'];
    $query = "DELETE FROM posts WHERE id = :post_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":post_id", $post_id);
    $stmt->execute();

    header("Location: ../index.php?page=myBlogs");

    exit();
} else {
    header("Location: ../index.php");
    exit();
}
?>
