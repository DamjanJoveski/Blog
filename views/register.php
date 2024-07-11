<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body class="register-body">
    <div class="container register-container">
        <h1>Register</h1>
        <form action="includes/register.inc.php" method="POST" class="register-form">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
        <p>Already registered? <a href="?page=login">Login here</a>.</p>
    </div>
</body>
</html>
