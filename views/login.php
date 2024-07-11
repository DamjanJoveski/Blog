<?php require_once 'includes/login_view.inc.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body class="login-body">
    <div class="container login-container">
        <h1>Login</h1>
        <form action="includes/login.inc.php" method="POST" class="login-form">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="?page=register">Register here</a>.</p>

        <?php check_login_errors(); ?>
    </div>
</body>
</html>
