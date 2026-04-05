<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="script.css">
</head>
<body>
    <div class="container">
        <div class="form-box">
            <form action="register.php" method="POST">
                <h2>Register</h2>

                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>

                <button type="submit">Register</button>

                <p>Already have an account? <a href="index.php">Login</a></p>
            </form>
        </div>
    </div>
</body>
</html>