<?php
session_start(); 

if (isset($_POST['logout-submit'])) {
    $_SESSION = [];

    session_destroy();

    header("Location: ../index.php?page=login");
    exit();
} else {
    header("Location: ../index.php?page=login");
    exit();
}
?>